<?php
function lab_users(){

$profile_id = um_profile_id();
$lab_team_list = get_user_meta( int $profile_id, string $key = 'lab_team', bool $single = false );
$lab_team_array = explode(',', $lab_team_list);
foreach($lab_team_array as $lab_team_member){
    echo $lab_team_member.'<br>';  
}

?>