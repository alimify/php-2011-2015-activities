<? include("mylogin.php"); ?><?php
/////// Mp3 Tag Setting
////// Script By jewel
///// Powerd By Mp3Gator.Net
///// Release : 2014
include 'admin_file_header.php';

print '<h2> Tag Setting </h2>';

$fldid = $_GET['fileid'];
/////// Setup Function

$dfile = file("lyrics/$fldid.txt");
/// Get Data
foreach($dfile as $getdata) {
$description = $getdata;
}




////////// Start My Program


if($_POST['Submit']){
$fldid = $_POST['fileid'];
///Artist Writing
$d_open = fopen("lyrics/$fldid.txt","w+");
$d_text = $_POST['data'];
fwrite($d_open, $d_text);
fclose($d_open);

$now = file("lyrics/$fldid.txt");
/// Get Data
foreach(now as $nowdata) {
$ok = $nowdata;
}

print '<title>Succesfully Changed</title><font color="green">Succesfully Changed</font><br/>Details : '.$okdata.'';

}else{
print '<title>Tag Setting</title><form action="" method="post"><br/><textarea name="data">'; echo $description; print '</textarea><input type="hidden" name="fileid" value="'.$fldid.'"><input type="submit" name="Submit" value="submit"/></form>';

}
print '<br/><a href="admin_file_list.php?fileid='.$fldid.'">Back To Upload</a>';

include 'admin_file_footer.php';
?>