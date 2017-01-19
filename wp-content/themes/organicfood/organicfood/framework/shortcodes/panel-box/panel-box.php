<?php
function panel_box_func($atts, $content = null) {
    $icon = $icon_pos = $tooltip_title = $tooltip_pos = $animation = $el_class = '';
    extract(shortcode_atts(array(
        'title' => '',
        'icon' => 'fa fa-plus-circle',
        'icon_pos' => 'icon-pos-left',
        'tooltip_title' => '',
        'tooltip_pos' => 'top',
        'animation' => '',
        'el_class' => ''
    ), $atts));


    $class = array();
    $class[] = 'uk-panel uk-panel-box';
    $class[] = $icon_pos;
    $class[] = getCSSAnimation($animation);
    $class[] = $el_class;
    ob_start();
    ?>
    <div class="pad-spa <?php echo $el_class;?>">
        <div class="<?php echo esc_attr(implode(' ', $class)); ?>">
            <h3 class="uk-panel-title"><?php echo $title; ?><i class="<?php echo $icon;?>" title="<?php echo $tooltip_title;?>" data-uk-tooltip="{pos:'<?php echo esc_attr($tooltip_pos); ?>'}"></i></h3>
        </div>
    </div>
    <?php
    return ob_get_clean();
}

if(function_exists('insert_shortcode')) { insert_shortcode('panel-box', 'panel_box_func'); }
