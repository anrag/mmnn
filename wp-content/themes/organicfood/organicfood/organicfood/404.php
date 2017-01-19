<?php

/*
Template Name: 404 Page
*/
get_header(); ?>
<div class="container" id="error-page">
    <div>
        <h1 class="error-code"><?php _e('404','organicfood');?></h1>
        <p class="error-message">
                <?php _e('Article not found','organicfood');?><br>
                <?php _e('Go Back','organicfood');?><a title="<?php _e('Home','organicfood');?>" href="<?php echo esc_url( home_url( '/'  ) );?>"><i class="fa fa-home"></i><?php _e('Home','organicfood');?></a>
        </p>
    </div>
</div>
<?php get_footer(); ?>