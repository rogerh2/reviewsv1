<?php

	 /*

Plugin Name: Lab Team

Plugin URI: http://www.yoursite.com/pure-awesomeness

Description: This plugin makes a list of links to your lab team member's accounts

Version: 1.0

Author: @roger

Author URI: http://www.yoursite.com

License: GPLv3

*/

function print_lab_team(){
	$profile_id = um_profile_id(); //This gets the ultimate members profile ID of the lab you're viewing
	$single = false;
	$key = 'lab_team';
	$lab_team_list = get_user_meta( $profile_id, $key, $single); //This is a Wordpress function to get their data
	$profile_lab_name = get_user_meta( $profile_id, 'lab_name', $single);
	$lab_team_array = explode(',', $lab_team_list[0]);
	$text_array = array();
	if (!empty($lab_team_array[0])) {
		array_push($text_array, '<div class="um-field-label">');
		array_push($text_array, '<label>Lab Members</label>');
		array_push($text_array, '<div class="um-clear"></div>');
		array_push($text_array,  '</div>');
	}
	foreach($lab_team_array as $lab_team_member){
		$user = get_user_by('login',$lab_team_member);
		if($user){
			$user_id = $user->get('id');
			$user_first_name = $user->get('first_name');
			$user_last_name = $user->get('last_name');
			$user_lab_name = get_user_meta( $user_id, 'lab_name', $single);
			$user_lab_role = get_user_meta( $user_id, 'lab_role', $single);
			if($user_last_name){
				if($user_lab_name == $profile_lab_name){
					array_push($text_array, '<a href="../../user/'.$user_id.'">'.$user_first_name.' '.$user_last_name.'</a>'.' • '.$user_lab_role[0].'<br>');
				}
			}
		} 
	}
	//array_push($text_array, '</br>');
	$final_html_list = implode("\n", $text_array);
	return $final_html_list; //Do not echo information because it will go to the top of the page
}
?>