<div class="block block-block box-white <?php echo esc_attr(implode(' ', $class)); ?>">
    <?php if(!empty($title)) { ?>
        <h3 class="block-title">
            <?php echo $title; ?>
        </h3>
    <?php } ?>
    <div class="content">
        <?php
            if(!empty($image)) {
                echo wp_get_attachment_image( $image, 'full' );
            }
            if(!empty($content)) {
                echo $content;
            }
        ?>
    </div>
</div>