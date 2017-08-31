<?php

	 /*

Plugin Name: Profile Button

Plugin URI: http://www.yoursite.com/pure-awesomeness

Description: This plugin gives users buttons to add to their website

Version: 1.0

Author: @roger

Author URI: http://www.yoursite.com

License: GPLv3

*/

function lab_share_button(){
	$text_array = array();
	$profile_id = um_profile_id();
	//Share link
	array_push($text_array, '<div class="um-field-label">');
	array_push($text_array, '<label>Profile Link</label>');
	array_push($text_array, '<span class="um-tip um-tip-w" original-title="add the link below to your personal or lab website to bring visitors to your profile."><i class="um-icon-help-circled"></i></span>');
	array_push($text_array,  '</i>');
	array_push($text_array,  '</span>');
	array_push($text_array, '<div class="um-clear"></div>');
	array_push($text_array, $_SERVER['HTTP_REFERER']);
	//Share Button
	array_push($text_array, '<p></n></p>');
	array_push($text_array, '<div class="um-field-label">');
	array_push($text_array, '<label>Share Button</label>');
	array_push($text_array, '<span class="um-tip um-tip-w" original-title="Add the text below to your personal or lab website&#39s html to display the learn more button pictured here. When visititors click the button they will be brought to your profile."><i class="um-icon-help-circled"></i></span>');
	array_push($text_array,  '</i>');
	array_push($text_array,  '</span>');
	array_push($text_array, '<div class="um-clear"></div>');
	array_push($text_array,  '<table style="width:100%">');
	array_push($text_array,  '<tr>');
	array_push($text_array, '<a href="'.$_SERVER['HTTP_REFERER'].'" target="_blank"'.'><button style="width: 15%; background-color: #008CBA; font-size: 1.5vmin;  border-radius: 10px; border: 1px solid #999; color: white" type="button">Learn More</button></a></tr>');
	array_push($text_array, '<tr><textarea rows="4" cols="50">');
	array_push($text_array, '<a href="'.$_SERVER['HTTP_REFERER'].'" target="_blank"'.'><button style="width: 15%; background-color: #008CBA; font-size: 1.5vmin;  border-radius: 10px; border: 1px solid #999; color: white" type="button">Learn More</button></a>');
	array_push($text_array, '</textarea></tr>');
	array_push($text_array, '</table>');
	$final_html_list = implode("\n", $text_array);
	return $final_html_list; //Do not echo information because it will go to the top of the page
}
?>