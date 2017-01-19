<article id="post_<?php the_ID() ?>" <?php post_class(); ?>>
    <div class="content">              
        <div class="team">
            <div class="team-top">
                <div class="team-item-image text-center">
                    <?php
                    $attachment_full_image = '';
                    $attachment_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full', false);
                    $attachment_full_image = $attachment_image[0];
                    if ($crop_image == 1) {
                        $image_resize = matthewruddy_image_resize($attachment_image[0], $width_image, $height_image, true, false);
                        echo '<img class="cropped" src="' . esc_attr($image_resize['url']) . '" alt="">';
                    } else {
                        the_post_thumbnail('full');
                    }
                    ?>
                </div>
                <div class="team-item-info">
                    <?php
                        $facebook_link = get_post_meta(get_the_ID(), 'team_facebook_link', true );
                        $twiter_link = get_post_meta(get_the_ID(), 'team_twiter_link', true );
                        $google_plus_link = get_post_meta(get_the_ID(), 'team_google_plus_link', true );
                        $linkedin_link = get_post_meta(get_the_ID(), 'team_linkedin_link', true );
                    ?>
                    <?php if(!empty($facebook_link) || !empty($twiter_link) || !empty($google_plus_link) || !empty($linkedin_link)) { ?>
                    <div class="social-icons-wrap">
                        <ul class="social-icons overlay-content">
                            <?php if (!empty($facebook_link)): ?>
                                <li><a class="facebook-social" href="<?php echo $facebook_link; ?>"><i class="fa fa-facebook"></i></a></li>
                            <?php endif; ?>
                            <?php if (!empty($twiter_link)): ?>
                                <li><a class="twitter-social" href="<?php echo $twiter_link; ?>"><i class="fa fa-twitter"></i></a></li>
                            <?php endif; ?>
                            <?php if (!empty($google_plus_link)): ?>
                                <li><a class="gplus-social" href="<?php echo $google_plus_link; ?>"><i class="fa fa-google-plus"></i></a></li>
                            <?php endif; ?>
                            <?php if (!empty($linkedin_link)): ?>
                                <li><a class="linkedin-social" href="<?php echo $linkedin_link; ?>"><i class="fa fa-linkedin"></i></a></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <div class="team-name text-center">
                <h3><?php the_title(); ?></h3>
                <span>(<?php echo get_post_meta(get_the_ID(), 'team_position', true ); ?>)</span>
            </div>
            <div class="team-skills">
                <?php
                    $team_skill = get_post_meta(get_the_ID(), 'team_skill', true );
                    if($team_skill)
                        echo do_shortcode('[vc_progress_bar values="'.$team_skill.'" style="style1" size="small" units="%"]');
                ?>
            </div>
        </div>
    </div>
</article>
