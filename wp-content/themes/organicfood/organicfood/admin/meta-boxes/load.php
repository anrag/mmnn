<?php
#------------------------------------------------------------------------#
# Add style and script
#------------------------------------------------------------------------#
function iz_enqueue_script_admin() {
    wp_enqueue_style( 'meta-boxes', get_template_directory_uri() . '/admin/assets/css/meta-boxes.css' );
    wp_enqueue_script( 'meta-boxes', get_template_directory_uri() . '/admin/assets/js/meta-boxes.js', array('jquery') );
}
add_action( 'admin_enqueue_scripts', 'iz_enqueue_script_admin' );

#-----------------------------------------------------------------#
# Add meta boxes
#-----------------------------------------------------------------#
include 'meta-config.php';
include 'post-meta.php';
?>
