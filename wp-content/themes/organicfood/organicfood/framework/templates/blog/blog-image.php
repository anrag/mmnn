<?php
/**
 * @package Organicfood
 */
?>

<?php global $smof_data; ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php echo cshero_title_render(); ?>
    <?php echo cshero_info_bar_render(); ?>
    <?php if(!is_single()) the_content(); ?>
    <?php echo cshero_content_render(); ?>
</article><!-- #post-## -->
