<div class="row <?php print $atts['grid_class'];?>">
    <?php
    $posts = $atts['posts'];
    while ($posts->have_posts()):$posts->the_post();
        ?>
        <div class="<?php print $atts['item_class'];?>">
        <?php get_template_part( 'framework/templates/blog/blog',get_post_format()); ?>
        </div>
<?php endwhile; ?>
</div>