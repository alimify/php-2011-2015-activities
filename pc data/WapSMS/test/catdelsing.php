<?php
///////////////////////sms sharing with mysql and admin panel beta 
/*

shared and made by wapadmin.info from mobtop

miss you rey :)
report bugs at bugs[at]wapadmin.info

/*/
include("func.php");
include("conf.php");
connect($dbserver,$dbname,$dbuser,$dbpass);
$uid=$_GET["uid"];
$pwd=$_GET["pwd"];
$cid=$_GET["cid"];
//HEADERS
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
echo "<!DOCTYPE html PUBLIC \"-//WAPFORUM//DTD XHTML Mobile 1.0//EN\" 
\"http://www.wapforum.org/DTD/xhtml-mobile10.dtd\">\n";
echo "<html xmlns=\"http://www.w3.org/1999/xhtml\">\n";
echo "<head>\n";
echo "<meta http-equiv=\"content-type\" content=\"text/html; charset=utf-8\" />\n";
echo "<meta http-equiv=\"Cache-Control\" content=\"no-cache\" />\n";
echo"<title>$site_name - Delete Category</title>";
echo"<link rel=\"stylesheet\" type=\"text/css\" href=\"themes/$site_theme.css\"/>";
echo"</head>";
//HEADERS END
echo"<body>";
echo"<div align=\"center\">";
if(isadmin($uid,$pwd))
{
	$delsx=mysql_query("DELETE FROM cats where id='".$cid."'");
    if($delsx){echo"<img src=\"images/accept.png\"/>Category Deleted Successfully!<br/><br/>";}
	else{echo"<img src=\"images/delete.png\"/>Category was Not Deleted!<br/><br/>";}
}
else{echo"<img src=\"images/delete.png\"/>You don't have the Privileges to do this.<br/><br/>";}
echo"</div>";
include"foot.php";
echo"</body></html>";
?>