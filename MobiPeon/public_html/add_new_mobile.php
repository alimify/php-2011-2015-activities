<?php
$page_title='Add New Mobile';
include 'db.php';
include 'config.php';
include 'func.php';
admin_check('1',$admin,$password);
print $top;
$add_mobile_brand='<center><a href="/add_mobile_brand.php"><b>Add Mobile Brand</b></a></center>';
print '<div class="smslist"><h1 class="center">Add New Mobile</h1><div class="admin_content">'.$add_mobile_brand.'';
$brand_id=intval($_POST['brand_id']);
$mobile_name=urlencode($_POST['mobile_name']);
$mobile_name=urlencode($_POST['mobile_name']);
$mobile_price=urlencode($_POST['mobile_price']);
$mobile_camera=urlencode($_POST['mobile_camera']);
$mobile_internet=urlencode($_POST['mobile_internet']);
$mobile_radio=urlencode($_POST['mobile_radio']);
$mobile_audio_player=urlencode($_POST['mobile_audio_player']);
$mobile_video_player=urlencode($_POST['mobile_video_player']);
$mobile_release_date=urlencode($_POST['mobile_release_date']);
$mobile_memory=urlencode($_POST['mobile_memory']);
$mobile_memory_slot=urlencode($_POST['mobile_memory_slot']);
$mobile_bluetooth=urlencode($_POST['mobile_bluetooth']);
$mobile_usb=urlencode($_POST['mobile_usb']);
$mobile_infrared=urlencode($_POST['mobile_infrared']);
$mobile_weight=urlencode($_POST['mobile_weight']);
$mobile_status=urlencode($_POST['mobile_status']);
$mobile_display=urlencode($_POST['mobile_display']);
$mobile_talk_time=urlencode($_POST['mobile_talk_time']);
$mobile_stand_by=urlencode($_POST['mobile_stand_by']);
$mobile_browser=urlencode($_POST['mobile_browser']);
$mobile_java=urlencode($_POST['mobile_java']);
$mobile_other_feat=urlencode($_POST['mobile_other_feat']);
$mobile_tags=urlencode($_POST['mobile_tags']);
$mobile_publish=intval($_POST['mobile_publish']);
if(htmlspecialchars($_POST['new_mobile_submit'])){print add_new_mobile($brand_id,$mobile_name,$mobile_price,$mobile_camera,$mobile_internet,$mobile_radio,$mobile_audio_player,$mobile_video_player,$mobile_usb,$mobile_infrared,$mobile_weight,$mobile_status,$mobile_display,$mobile_talk_time,$mobile_stand_by,$mobile_browser,$mobile_java,$mobile_release_date,$mobile_memory,$mobile_memory_slot,$mobile_bluetooth,$mobile_other_feat,$mobile_publish,$mobile_tags);}
print add_action_form('','post');
print 'Mobile Brand :<br/><select name="brand_id">';
$sql="SELECT * FROM brand;";
$sites=MySQL_Query($sql);
while($site=MySQL_Fetch_Array($sites))
	{
		$id = $site['id'];
		$brand=urldecode($site['name']);
  print '<option value="'.$id.'">'.$brand.'</option>';
}
print '</select><br/>';
print add_input_form('Mobile Name','mobile_name','');
print add_input_form('Mobile Price','mobile_price','');
print add_input_form('Mobile Camera','mobile_camera','');
print add_input_form('Mobile Internet','mobile_internet','');
print add_input_form('Mobile Radio','mobile_radio','');
print add_input_form('Mobile Audio Player','mobile_audio_player','');
print add_input_form('Mobile Video Player','mobile_video_player','');
print add_input_form('Mobile USB','mobile_usb','');
print add_input_form('Mobile Infrared','mobile_infrared','');
print add_input_form('Mobile Weight','mobile_weight','');
print add_input_form('Mobile Status','mobile_status','');
print add_input_form('Mobile Display','mobile_display','');
print add_input_form('Mobile Talk Time','mobile_talk_time','');
print add_input_form('Mobile Stand By','mobile_stand_by','');
print add_input_form('Mobile Browser','mobile_browser','');
print add_input_form('Mobile Java','mobile_java','');
print add_input_form('Mobile Release Date','mobile_release_date','');
print add_input_form('Mobile Memory','mobile_memory','');
print add_input_form('Mobile Memory Slot','mobile_memory_slot','');
print add_input_form('Mobile Bluetooth','mobile_bluetooth','');
print add_input_form('Mobile other','mobile_other_feat','');
print add_textarea_form('Mobile Tags','mobile_tags','');
print add_checkbox_form('Publish','mobile_publish','1');
print add_submit_form('new_mobile_submit','Add New Mobile');
print '</div></div>';
print $foot;
?>