<?php
global $smof_data, $post;
$c_pageID = null;
if ($post) {
    $c_pageID = $post->ID;
}
?>
<div class="header header-v2">
    <?php
    $header_top_widgets = $smof_data["header_top_widgets"];
    if($post){
        $cs_display_widget_top = get_post_meta($post->ID, 'cs_display_widget_top', true);
        $header_top_widgets = $cs_display_widget_top=='global'?$header_top_widgets:!$cs_display_widget_top?$header_top_widgets:$cs_display_widget_top;
    }if($header_top_widgets):?>
    <header id="header-top">
        <div class="container">
            <div class="row">
                <div class="header-top clearfix">
                    <div class='header-top-1 col-xs-12 col-sm-12 col-md-4 col-lg-4 aligncenter-sm'>
                        <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar("Header 2 Top Widget 1")):
                        endif;
                        ?>
                    </div><!--
                    --><div class='logo text-center col-xs-12 col-sm-12 col-md-4 col-lg-4'>
                        <button class="btn-menubar">Menu</button>
                        <a class="menubar-brand" href="<?php echo esc_url(home_url()); ?>">
                            <img src="<?php echo esc_url($smof_data['logo']); ?>" alt="<?php esc_attr(bloginfo('name')); ?>"
                                 style="max-height: <?php echo esc_attr($smof_data["logo_width"]); ?>" class="normal-logo logo-v1"/>
                        </a>
                    </div><!--
                    --><div class='header-top-2 col-xs-12 col-sm-12 col-md-4 col-lg-4 aligncenter-sm'>
                        <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar("Header 2 Top Widget 2")):
                        endif;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <?php endif;?>
    <header id="cshero-header">
        <?php $toggle_class = $smof_data['header_sticky']?'menu-toggle-class menubar-fixed-top':'';?>
        <div class="menubar menu-toggle-class text-center" data-scroll-toggle-class="<?php echo $toggle_class;?>">
            <div class="menubar-inner">
                <div class="container">
                    <?php
                    $arr = array(
                        'theme_location' => 'main_navigation',
                        'menu_id' => 'nav',
                        'menu' => get_post_meta($c_pageID, 'cs_main_menu', true),
                        'container_class' => 'menu-list',
                        'echo'            => true,
                        'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                        'depth'           => 0,
                    );
                    if (has_nav_menu('main_navigation')) {
                        wp_nav_menu( $arr );
                    }else{ ?>
                    <div class="menu-list">
                        <?php wp_nav_menu( $arr );?>
                    </div>    
                    <?php }
                    ?>
                </div>
            </div>
        </div>
    </header>
</div>