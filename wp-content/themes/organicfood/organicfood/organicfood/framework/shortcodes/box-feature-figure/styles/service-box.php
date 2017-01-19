<div class="services-box services-box-animated">
    <div class="inner">
        <div class="front">
            <?php echo $image?wp_get_attachment_image( $image, 'full' ):''; ?>
            <?php if($icon):?>
            <i class="<?php echo esc_attr($icon); ?>"></i>
            <?php endif;?><br>
            <h3><?php echo $title; ?></h3>
        </div>
        <div class="back">
        <h3><?php echo $title; ?></h3>
        <p><?php echo $content; ?></p>
        </div>
    </div>
</div>