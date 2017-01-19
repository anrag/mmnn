<?php
/**
 * Abstract Widget Class
 */
abstract class Exp_Widget extends WP_Widget {

	public $widget_cssclass;
	public $widget_description;
	public $widget_id;
	public $widget_name;
	public $settings;

	/**
	 * Constructor
	 */
	public function __construct() {
		$widget_ops = array(
			'classname'   => $this->widget_cssclass,
			'description' => $this->widget_description
		);

		parent::__construct( $this->widget_id, $this->widget_name, $widget_ops );

		add_action( 'save_post', array( $this, 'flush_widget_cache' ) );
		add_action( 'deleted_post', array( $this, 'flush_widget_cache' ) );
		add_action( 'switch_theme', array( $this, 'flush_widget_cache' ) );
	}

	/**
	 * get_cached_widget function.
	 */
	function get_cached_widget( $args ) {
		$cache = wp_cache_get( $this->widget_id, 'widget' );

		if ( ! is_array( $cache ) )
			$cache = array();

		if ( isset( $cache[ $args['widget_id'] ] ) ) {
			echo $cache[ $args['widget_id'] ];
			return true;
		}

		return false;
	}

	/**
	 * Cache the widget
	 */
	public function cache_widget( $args, $content ) {
		$cache[ $args['widget_id'] ] = $content;

		wp_cache_set( $this->widget_id, $cache, 'widget' );
	}

	/**
	 * Flush the cache
	 * @return [type]
	 */
	public function flush_widget_cache() {
		wp_cache_delete( $this->widget_id, 'widget' );
	}

	/**
	 * update function.
	 *
	 * @see WP_Widget->update
	 * @access public
	 * @param array $new_instance
	 * @param array $old_instance
	 * @return array
	 */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		if ( ! $this->settings )
			return $instance;

		foreach ( $this->settings as $key => $setting ) {
			if ( isset( $new_instance[ $key ] ) ) {
				$instance[ $key ] = sanitize_text_field( $new_instance[ $key ] );
			} elseif ( 'checkbox' === $setting['type'] ) {
				$instance[ $key ] = 0;
			}
		}

		$this->flush_widget_cache();

		return $instance;
	}

	/**
	 * form function.
	 *
	 * @see WP_Widget->form
	 * @access public
	 * @param array $instance
	 * @return void
	 */
	function form( $instance ) {

		if ( ! $this->settings )
			return;

		foreach ( $this->settings as $key => $setting ) {

			$value   = isset( $instance[ $key ] ) ? $instance[ $key ] : $setting['std'];

			switch ( $setting['type'] ) {
				case "text" :
                                         $attr_hidden ='';
                                        if(isset($setting['hidden'])){
                                            $attr_hidden = 'data-element="'. esc_attr($setting['hidden']['element']).'" data-value="'.esc_attr($setting['hidden']['value']).'"';
                                        }
					?>
					<p class="<?php echo esc_attr( $key ); ?>" <?php echo $attr_hidden; ?>>
						<label for="<?php echo $this->get_field_id( $key ); ?>"><?php echo $setting['label']; ?></label>
						<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( $key ) ); ?>" name="<?php echo $this->get_field_name( $key ); ?>" type="text" value="<?php echo esc_attr( $value ); ?>" />
					</p>
					<?php
				break;
				case "number" :
                                        $attr_hidden ='';
                                        if(isset($setting['hidden'])){
                                            $attr_hidden = 'data-element="'. esc_attr($setting['hidden']['element']).'" data-value="'.esc_attr($setting['hidden']['value']).'"';
                                        }
					?>
					<p class="<?php echo esc_attr( $key ); ?>" <?php echo $attr_hidden; ?>>
						<label for="<?php echo $this->get_field_id( $key ); ?>"><?php echo $setting['label']; ?></label>
						<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( $key ) ); ?>" name="<?php echo $this->get_field_name( $key ); ?>" type="number" step="<?php echo esc_attr( $setting['step'] ); ?>" min="<?php echo esc_attr( $setting['min'] ); ?>" max="<?php echo esc_attr( $setting['max'] ); ?>" value="<?php echo esc_attr( $value ); ?>" />
					</p>
					<?php
				break;
				case "select" :
                                        $date_sl = time() . '_' . uniqid(true);
                                        $attr_hidden ='';
                                        if(isset($setting['hidden'])){
                                            $attr_hidden = 'data-element="'. esc_attr($setting['hidden']['element']).'" data-value="'.esc_attr($setting['hidden']['value']).'"';
                                        }
					?>
					<p class="<?php echo esc_attr( $key.$date_sl ); ?>" <?php echo $attr_hidden; ?>>
						<label for="<?php echo $this->get_field_id( $key ); ?>"><?php echo $setting['label']; ?></label>
						<select class="widefat" id="<?php echo esc_attr( $this->get_field_id( $key ) ); ?>" name="<?php echo $this->get_field_name( $key ); ?>">
							<?php foreach ( $setting['options'] as $option_key => $option_value ) : ?>
								<option value="<?php echo esc_attr( $option_key ); ?>" <?php selected( $option_key, $value ); ?>><?php echo esc_html( $option_value ); ?></option>
							<?php endforeach; ?>
						</select>
					</p>
                                        <?php echo "<sc";?>ript>
                                            (function($) {
                                                "use strict";
                                                $(document).ready(function($) {
                                                    $( ".<?php echo $key.$date_sl; ?> select" ).change(function() {
                                                        var val_op, val_el;
                                                        var $_this = jQuery(this);
                                                        val_op = $_this.val();
                                                        $( '[data-element="<?php echo $key; ?>"]' ).each(function() {
                                                            val_el = $(this).attr("data-value").split(',');
                                                            for(var i=0;i<val_el.length;i++){
                                                                if(val_op == val_el[i]){
                                                                    $(this).show();
                                                                    break;
                                                                }else{
                                                                    $(this).hide();
                                                                }
                                                            }
                                                        });
                                                    }).trigger( "change" );
                                                });
                                            })(jQuery);
                                        </script>
					<?php
				break;
				case "checkbox" :
                                        $date_cb = time() . '_' . uniqid(true);
                                        $attr_hidden ='';
                                        if(isset($setting['hidden'])){
                                            $attr_hidden = 'data-element="'. esc_attr($setting['hidden']['element']).'" data-value="'.esc_attr($setting['hidden']['value']).'"';
                                        }
					?>
					<p class="<?php echo esc_attr( $key.$date_cb ); ?>" <?php echo $attr_hidden; ?>>
						<input id="<?php echo esc_attr( $this->get_field_id( $key ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( $key ) ); ?>" type="checkbox" value="1" <?php checked( $value, 1 ); ?> />
						<label for="<?php echo $this->get_field_id( $key ); ?>"><?php echo $setting['label']; ?></label>
					</p>
                                        <?php echo "<sc";?>ript>
                                            (function($) {
                                                "use strict";
                                                $(document).ready(function($) {
                                                    $( ".<?php echo $key.$date_cb; ?> input" ).change(function() {
                                                        var val_op, val_el;
                                                        val_op = $( ".<?php echo $key.$date_cb; ?> input:checked" ).val();                                                        
                                                        $( '[data-element="<?php echo $key; ?>"]' ).each(function() {
                                                            val_el = $(this).attr("data-value").split(',');
                                                            for(var i=0;i<val_el.length;i++){
                                                                if(val_op == val_el[i]){
                                                                    $(this).show();
                                                                    break;
                                                                }else{
                                                                    $(this).hide();
                                                                }
                                                            }
                                                        });
                                                    }).trigger( "change" );
                                                });
                                            })(jQuery);
                                        </script>
					<?php
				break;
                                case "pro_taxonomy" :
                                        $attr_hidden ='';
                                        if(isset($setting['hidden'])){
                                            $attr_hidden = 'data-element="'. esc_attr($setting['hidden']['element']).'" data-value="'.esc_attr($setting['hidden']['value']).'"';
                                        }
					?>
                                        <div class="pro_taxonomy <?php echo esc_attr( $key ); ?>" <?php echo $attr_hidden; ?>>
                                            <label for="<?php echo $this->get_field_id( $key ); ?>"><?php echo $setting['label']; ?></label>
                                            <input class="widefat" id="<?php echo esc_attr($this->get_field_id($key)); ?>" name="<?php echo esc_attr($this->get_field_name($key)); ?>" type="hidden" value="<?php echo esc_attr($value); ?>" />
                                        <p>
                                            <?php
                                                $terms = $product_cats = array();
                                                $terms = get_terms( $key, 'orderby=count&hide_empty=0' );
                                                $arr_product_cat = explode(',',$value);
                                                if ($terms && !is_wp_error($terms)) {
                                                    foreach ($terms as $term) {
                                                        $product_cats[] = sprintf(
                                                            '<label><input onclick="changeCategory(this);" id="%s" class="ww-check-taxonomy %s" type="checkbox" name="%s" value="%s" %s/>%s</label>', 'product_cat' . '-' . $term->slug, 'product_cat', 'product_cat', $term->term_id, checked(in_array($term->term_id, $arr_product_cat), true, false), $term->name
                                                        );
                                                    }
                                                    echo implode($product_cats);
                                                }else{
                                                    echo 'No Category';
                                                }
                                            ?>
                                        </p>     
                                        </div>
					<?php
				break;                            
			}
		}
	}
}
