<?php
/*
 * Title
 */
function cshero_title_render(){
	global $smof_data, $post;
        
        ob_start();
        ?>
        <?php if(is_single()){ ?>
            <?php if($smof_data['show_title_post']){ ?>
                <h2 class="blog-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <?php } ?>
        <?php }else{ ?>
            <h2 class="blog-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <?php } ?>
        <?php
        return  ob_get_clean();
}
/*
 * Info Bar
 */
function cshero_info_bar_render() {
	global $smof_data, $post;
        
        $show_info = 1;
        if(is_single()){
            $show_info = $smof_data['show_info_post']? $show_info: 0;
        }else{
           $show_info = $smof_data['show_info_blog']? $show_info: 0;
        }
	ob_start();
        
        ?>
        <?php if($show_info){ ?>
        <div class="blog-info">
            <time class="publish-date" datetime="<?php echo get_the_date('Y-m-j') . ' ' . get_the_time('H:i:s'); ?>" pubdate="pubdate">
                <?php _e('Published on', 'organicfood'); ?> <?php echo get_the_date('l, j F Y') . ' ' . get_the_time('H:i'); ?>
            </time>
            <span class="category-name"><?php the_terms(get_the_ID(), 'category', __('Category: ', 'organicfood') , ', ' ); ?></span>
        </div>
        <?php } ?>
        <?php
        return  ob_get_clean();
}
/*
 * Media for blog
 */
/* Post gallery */
if (!function_exists('cshero_grab_ids_from_gallery')) {

    function cshero_grab_ids_from_gallery() {
        global $post;
        $gallery = cshero_get_shortcode_from_content('gallery');
        $object = new stdClass();
        $object->columns = '3';
        $object->link = 'post';
        $object->ids = array();
        if ($gallery) {
            $object = cshero_extra_shortcode('gallery', $gallery, $object);
        }
        return $object;
    }

}
/* Extra shortcode */
if (!function_exists('cshero_extra_shortcode')) {

    function cshero_extra_shortcode($name, $shortcode, $object) {
        if ($shortcode && is_object($object)) {
            $attrs = str_replace(array('[', ']', '"', $name), null, $shortcode);
            $attrs = explode(' ', $attrs);
            if (is_array($attrs)) {
                foreach ($attrs as $attr) {
                    $_attr = explode('=', $attr);
                    if (count($_attr) == 2) {
                        if ($_attr[0] == 'ids') {
                            $object->$_attr[0] = explode(',', $_attr[1]);
                        } else {
                            $object->$_attr[0] = $_attr[1];
                        }
                    }
                }
            }
        }
        return $object;
    }

}
/* Get Shortcode From Content */
if (!function_exists('cshero_get_shortcode_from_content')) {

    function cshero_get_shortcode_from_content($param) {
        global $post;
        $pattern = get_shortcode_regex();
        $content = $post->post_content;
        if (preg_match_all('/' . $pattern . '/s', $content, $matches) && array_key_exists(2, $matches) && in_array($param, $matches[2])) {
            $key = array_search($param, $matches[2]);
            return $matches[0][$key];
        }
    }

}
/*
 * Content for blog
 */
 function cshero_content_render(){
 	global $smof_data;
	ob_start();
	?>
	<?php if (is_single()) { ?>
            <div class="blog-description">
                <?php
                the_content();
                wp_link_pages(array(
                    'before' => '<div class="page-links">' . __('Pages:', 'organicfood'),
                    'after' => '</div>',
                ));
                ?>
            </div>
        <?php } else { ?>
            <div class="blog-description">
                <?php echo custom_excerpt($smof_data['blog_excerpt_length_blog'], $smof_data['blog_excerpt_more_blog']); ?>
            </div>
            <a href="<?php echo esc_url(get_permalink()); ?>" class="readmore"><?php _e('Read More: ', 'organicfood');
            the_title(); ?></a>
        <?php } ?>
	<?php
	return  ob_get_clean();
}