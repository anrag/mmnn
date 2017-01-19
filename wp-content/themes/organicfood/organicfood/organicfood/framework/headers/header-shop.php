<?php
global $smof_data, $post;
$c_pageID = null;
if ($post) {
    $c_pageID = $post->ID;
}
?>
<div class="header header-shop">
    
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
                    <div class='header-top-1 col-xs-12 col-sm-6 col-md-4 col-lg-4 aligncenter-sm'>
                        <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar("Header Shop Top Widget 1")):
                        endif;
                        ?>
                    </div><!--
                    --><div class='header-top-2 col-xs-12 col-sm-6 col-md-8 col-lg-8 aligncenter-sm'>
                        <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar("Header Shop Top Widget 2")):
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
        <div class="menubar menu-toggle-class" data-scroll-toggle-class="<?php echo $toggle_class;?>">
            <div class="menubar-inner">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <button class="btn-menubar">Menu</button>
                            <a class="menubar-brand" href="<?php echo esc_url(home_url()); ?>" style="margin:<?php echo esc_attr($smof_data['margin_logo']); ?>;">
                                <img src="<?php echo esc_url($smof_data['logo']); ?>" alt="<?php esc_attr(bloginfo('name')); ?>"
                                     style="max-height: <?php echo esc_attr($smof_data["logo_width"]); ?>" class="normal-logo logo-v1"/>
                            </a>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                            <?php
                            $arr = array(
                                'theme_location' => 'main_navigation',
                                'menu_id' => 'nav',
                                'menu' => get_post_meta($c_pageID, 'cs_main_menu', true),
                                'container_class' => 'menu-list',
                                'menu_class'      => 'menu-list-right',
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
                            <?php }                        ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
</div>