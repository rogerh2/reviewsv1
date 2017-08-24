<?php

	 /*

Plugin Name: Lab Team

Plugin URI: http://www.yoursite.com/pure-awesomeness

Description: A Plugin that registers your lab teams!

Version: 1.0

Author: @roger

Author URI: http://www.yoursite.com

License: GPLv3

*/

function print_lab_team(){
	$profile_id = um_profile_id();
	$single = false;
	$key = 'lab_team';
	$lab_team_list = get_user_meta( $profile_id, $key, $single);
	$profile_lab_name = get_user_meta( $profile_id, 'lab_name', $single);
	$lab_team_array = explode(',', $lab_team_list[0]);
	if (!empty($lab_team_array[0])) {
		echo '<div class="um-field-label">';
		echo '<label>Lab Members</label>';
		echo '<div class="um-clear"></div>';
		echo '</div>';
	}
	foreach($lab_team_array as $lab_team_member){
		$user = get_user_by('login',$lab_team_member);
		if($user){
			$user_id = $user->get('id');
			$user_first_name = $user->get('first_name');
			$user_last_name = $user->get('last_name');
			$user_lab_name = get_user_meta( $user_id, 'lab_name', $single);
			if($user_last_name){
				if($user_lab_name == $profile_lab_name){
					echo '<a href="../../user/'.$user_id.'">'.$user_first_name.' '.$user_last_name.'</a><br>';
				}
			}
		} 
	}
	echo '</br>';
}
?>