<div class="<?php echo esc_attr(implode(' ', $class)); ?>">
    <?php if (!empty($box_image)){ ?>
    <div class="box-image">
        <div class="box-image-inner">
            <span><?php echo wp_get_attachment_image( $box_image, 'thumbnail' ); ?></span>
        </div>
    </div>
    <?php } ?>
    <?php if (!empty($box_title)){ ?>
        <h3 class="box-title"><?php echo $box_title; ?></h3>
    <?php } ?>
    <?php if (!empty($content)){ ?>
        <div class="box-content"><?php echo $content; ?></div>
    <?php } ?>
</div>
