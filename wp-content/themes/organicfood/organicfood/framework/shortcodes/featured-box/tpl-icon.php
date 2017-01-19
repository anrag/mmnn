<div class="<?php echo esc_attr(implode(' ', $class)); ?>">
    <?php if (!empty($box_icon)){ ?>
    <div class="box-icon">
        <div class="box-icon-inner">
            <span>
                <i class="<?php echo esc_attr($box_icon); ?>"></i>
                <br/>
                <i class="<?php echo esc_attr($box_icon); ?>"></i>
            </span>
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
