<?php
function cshero_newsletter($atts) {
    extract(shortcode_atts(array(
                'el_class' => ''
                    ), $atts));

    $options_profile = get_option('newsletter_profile');
    $output='';
    if(class_exists('NewsletterSubscription')){
        $output .= '<form action="' . plugins_url('newsletter/do/subscribe.php') . '" onsubmit="return newsletter_check(this)" method="post" class="newsletter '.esc_attr($el_class).'">
                    <input type="hidden" name="nr" value="widget"/>
                    <p><input class="newsletter-email" type="email" required name="ne" value="' . esc_attr($options_profile['email']) . '" onclick="if (this.defaultValue==this.value) this.value=\'\'" onblur="if (this.value==\'\') this.value=this.defaultValue"/></p>
                    <p><input class="newsletter-submit sing-up wpb_button wpb_wpb_button wpb_regularsize" type="submit" value="' . esc_attr($options_profile['subscribe']) . '"/></p>
                  </form>
                ';
   }
    return $output;
}

if(function_exists('insert_shortcode')) { insert_shortcode('newsletter', 'cshero_newsletter'); }