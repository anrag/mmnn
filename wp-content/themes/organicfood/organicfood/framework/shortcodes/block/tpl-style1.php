<div class="feature-delivery <?php echo esc_attr(implode(' ', $class)); ?>">
    <?php if(!empty($image)) { ?>
        <div class="feature-delivery-image">
        <a href="<?php echo esc_url($link); ?>">
            <?php echo wp_get_attachment_image( $image, 'full' ); ?>
            <?php if($mosaic_hover) { ?>
                <span class="mosaic-hover"></span>
            <?php } ?>
        </a>
        </div>
    <?php } ?>
    <?php if(!empty($title)) { ?>
        <h3 class="feature-delivery-title">
            <a href="<?php echo esc_url($link); ?>"><?php echo $title; ?></a>
        </h3>
    <?php } ?>
    <?php if(!empty($content)) { ?>
        <div class="feature-delivery-description"><?php echo $content; ?></div>
    <?php } ?>
</div>

