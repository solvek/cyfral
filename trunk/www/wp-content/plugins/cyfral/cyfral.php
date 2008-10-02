<?php
/*
Plugin Name: Solvek Cyfral
Plugin URI: http://code.google.com/p/cyfral/
Description: Online collaborative tool
Version: 0.1
Author: Sergi Adamchuk
Author URI: http://www.solvek.com
*/

$cyfral_db_version = "0.1";

function cyfral_install () {
   global $wpdb;
   global $jal_db_version;

   $table_name = $wpdb->prefix . "projects";
   if($wpdb->get_var("show tables like '$table_name'") != $table_name) {
      
      $sql = "CREATE TABLE " . $table_name . " (
	  ID bigint(20) NOT NULL,
	  volume int(11) NOT NULL,
	  PRIMARY KEY  (ID)
	);";

      require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
      dbDelta($sql);

      add_option("cyfral_db_version", $cyfral_db_version);

   }
}

register_activation_hook(__FILE__,'cyfral_install');

function cyfral_project_editor()
{
	global $wpdb, $post;
	
	$project = $wpdb->get_row("SELECT * FROM {$wpdb->prefix}projects WHERE ID = {$post->ID}");
	
	if ($project)
		$vol_str = $project->volume;
	else
		$vol_str = '';
		
	echo '<div class="postbox">' . "\n";
	echo "<h3><a class='togbox'>+</a>".__("Work Volume", "cyfral")."</h3>\n";
	echo '<div class="inside">' . "\n";
	echo '<label for="volumework">'.__("Work Volume", "cyfral").': </label><input type="text" name="volumework" style="width: 60px" id="volumework" value="'.$vol_str.'" /><span>'.__(" quantums", "cyfral").'</span>'. "\n";	
	echo '<p>'.__("Quantums of work. Enter a number from 2 to 100000.", "cyfral").'</p>';
	echo "</div>\n";
	echo "</div>\n";
}

add_action('edit_form_advanced', 'cyfral_project_editor');
add_action('simple_edit_form', 'cyfral_project_editor');

function cyfral_save_project_info($post_id, $post)
{
	global $wpdb;
	
	$val = intval(stripslashes($_POST["volumework"]));
	
	//print("REPLACE {$wpdb->prefix}projects (ID, Volume) VALUES ($post_id, $val)");
	$wpdb->query("REPLACE {$wpdb->prefix}projects (ID, Volume) VALUES ($post_id, $val)");
	
	return $post;
}

add_action('save_post', 'cyfral_save_project_info', 11, 2);
add_action('publish_post', 'cyfral_save_project_info', 11, 2);

?>
