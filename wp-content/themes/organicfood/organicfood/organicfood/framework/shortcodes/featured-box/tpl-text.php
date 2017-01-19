<div class="<?php echo esc_attr(implode(' ', $class)); ?>">
    <?php if (!empty($box_text)){ ?>
    <div class="box-text">
        <div class="box-text-inner">
            <span><?php echo $box_text; ?></span>
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
