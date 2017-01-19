<div class="<?php echo esc_attr(implode(' ', $class)); ?>">
    <div class="figure">
        <?php echo wp_get_attachment_image( $image, 'full' ); ?>
    </div>
    <div class="center figcaption">
        <br>
        <h3><?php echo $title; ?></h3>
        <p><i class="<?php echo esc_attr($icon); ?>"></i> <?php echo $content; ?></p>
    </div>
</div>