<?php
/**
 * SMOF Admin
 *
 * @package     WordPress
 * @subpackage  SMOF
 * @since       1.4.0
 * @author      Syamil MJ
 */
 

/**
 * Head Hook
 *
 * @since 1.0.0
 */
function of_head() { do_action( 'of_head' ); }

/**
 * Add default options upon activation else DB does not exist
 *
 * @since 1.0.0
 */
function of_option_setup()	
{
	global $of_options, $options_machine;
	$options_machine = new Options_Machine($of_options);
		
	if (!of_get_options())
	{
		of_save_options($options_machine->Defaults);
	}
}

/**
 * Get header classes
 *
 * @since 1.0.0
 */
function of_get_header_classes_array() 
{
	global $of_options;
	
	foreach ($of_options as $value) 
	{
		if ($value['type'] == 'heading')
			$hooks[] = str_replace(' ','',strtolower($value['name']));	
	}
	
	return $hooks;
}

/**
 * Get options from the database and process them with the load filter hook.
 *
 * @author Jonah Dahlquist
 * @since 1.4.0
 * @return array
 */
function of_get_options($key = null, $data = null) {

	do_action('of_get_options_before', array(
		'key'=>$key, 'data'=>$data
	));
	if ($key != null) { // Get one specific value

		$data = get_theme_mod($key, $data);
	} else { // Get all values
		$data = get_theme_mods();		
	}
	$data = apply_filters('of_options_after_load', $data);
	do_action('of_option_setup_before', array(
		'key'=>$key, 'data'=>$data
	));
	return $data;

}

add_action( 'wp_ajax_sample', 'prefix_ajax_sample' );

function prefix_ajax_sample(){
    locate_template(array('admin/sample/cs_importer.php'), true, true);
    installSample();
}
/**
 * Save options to the database after processing them
 *
 * @param $data Options array to save
 * @author Jonah Dahlquist
 * @since 1.4.0
 * @uses update_option()
 * @return void
 */

function of_save_options($data, $key = null) {
	global $smof_data;
    if (empty($data))
        return;	
    do_action('of_save_options_before', array(
		'key'=>$key, 'data'=>$data
	));
	$data = apply_filters('of_options_before_save', $data);
	if ($key != null) { // Update one specific value
		if ($key == BACKUPS) {
			unset($data['smof_init']); // Don't want to change this.
		}
		set_theme_mod($key, $data);
	} else { // Update all values in $data
		foreach ( $data as $k=>$v ) {
			if (!isset($smof_data[$k]) || $smof_data[$k] != $v) { // Only write to the DB when we need to
				set_theme_mod($k, $v);
			}
	  	}
	}
    do_action('of_save_options_after', array(
		'key'=>$key, 'data'=>$data
	));

}

add_action('wp_ajax_nopriv_them_option_change_preset', 'ww_them_option_change_preset');
add_action('wp_ajax_them_option_change_preset', 'ww_them_option_change_preset');

function ww_them_option_change_preset() {
    $colorscheme = $_POST['colorscheme'];
    $preset = get_option($colorscheme);
    if ($preset)
        echo json_encode($preset);
    else
        echo "";
    die;
}
/**
 * For use in themes
 *
 * @since forever
 */

$data = of_get_options();
$smof_data = of_get_options();
$data = $smof_data;