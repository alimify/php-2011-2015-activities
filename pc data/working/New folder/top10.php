<html xmlns="http://www.w3.org/1999/xhtml"> 
<head>

<!-- This Script By Jewel -->

<title>Latest Uploaded Music | AnyMaza.Com</title><link rel="icon" href="icon.ico" />
<meta name="description" content="Latest Uploaded Hindi,Bangla,English,Kalkata,Bangla Rap Mp3 Songs Download"/>
<meta name="keyword" content="hindi music,bangla music,latest mp3,bangla mp3 download,free mp3 songs,bangla rap songs,bangla mp3,hindi mp3,english mp3,english songs,bangla songs"/> 
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<META NAME="ROBOTS" CONTENT="INDEX,FOLLOW">
<meta http-equiv="Cache-Control" content="no-cache"/>
<link rel="stylesheet" href="css/style.css" type="text/css" />
</head>
<body>

<?php

///This Script By Jewel

include("header.php");
include("conf.php");
include("core.php");
Connect($dbserver,$dbname,$dbuser,$dbpass);
$bd = mysql_query("SELECT folderid,folderurl FROM folder ORDER BY folderid DESC") 
  or die(mysql_error());  


//////////////////////////////////// Jewel's Pagination Logic ////////////////////////////////////////////////////////////////////////
$nr = mysql_num_rows($bd); // Get total of Num rows from the database query
if (isset($_GET['pn'])) { // Get pn from URL vars if it is present
    $pn = preg_replace('#[^0-9]#i', '', $_GET['pn']); // filter everything but numbers for security(new)
    //$pn = ereg_replace("[^0-9]", "", $_GET['pn']); // filter everything but numbers for security(deprecated)
} else { // If the pn URL variable is not present force it to be value of page number 1
    $pn = 1;
}
//This is where we set how many database items to show on each page
$itemsPerPage = 30;
// Get the value of the last page in the pagination result set
$lastPage = ceil($nr / $itemsPerPage);
// Be sure URL variable $pn(page number) is no lower than page 1 and no higher than $lastpage
if ($pn < 1) { // If it is less than 1
    $pn = 1; // force if to be 1
} else if ($pn > $lastPage) { // if it is greater than $lastpage
    $pn = $lastPage; // force it to be $lastpage's value
}
// This creates the numbers to click in between the next and back buttons
// This section is explained well in the video that accompanies this script
$centerPages = "";
$sub1 = $pn - 1;
$sub2 = $pn - 2;
$add1 = $pn + 1;
$add2 = $pn + 2;
if ($pn == 1) {
    $centerPages .= '&nbsp; <span class="pagNumActive">' . $pn . '</span> &nbsp;';
    $centerPages .= '&nbsp; <a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $add1 . '">' . $add1 . '</a> &nbsp;';
} else if ($pn == $lastPage) {
    $centerPages .= '&nbsp; <a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $sub1 . '">' . $sub1 . '</a> &nbsp;';
    $centerPages .= '&nbsp; <span class="pagNumActive">' . $pn . '</span> &nbsp;';
} else if ($pn > 2 && $pn < ($lastPage - 1)) {
    $centerPages .= '&nbsp; <a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $sub2 . '">' . $sub2 . '</a> &nbsp;';
    $centerPages .= '&nbsp; <a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $sub1 . '">' . $sub1 . '</a> &nbsp;';
    $centerPages .= '&nbsp; <span class="pagNumActive">' . $pn . '</span> &nbsp;';
    $centerPages .= '&nbsp; <a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $add1 . '">' . $add1 . '</a> &nbsp;';
    $centerPages .= '&nbsp; <a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $add2 . '">' . $add2 . '</a> &nbsp;';
} else if ($pn > 1 && $pn < $lastPage) {
    $centerPages .= '&nbsp; <a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $sub1 . '">' . $sub1 . '</a> &nbsp;';
    $centerPages .= '&nbsp; <span class="pagNumActive">' . $pn . '</span> &nbsp;';
    $centerPages .= '&nbsp; <a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $add1 . '">' . $add1 . '</a> &nbsp;';
}
// This line sets the "LIMIT" range... the 2 values we place to choose a range of rows from database in our query
$limit = 'LIMIT ' .($pn - 1) * $itemsPerPage .',' .$itemsPerPage;
// Now we are going to run the same query as above but this time add $limit onto the end of the SQL syntax

$paginationDisplay = ""; // Initialize the pagination output variable
// This code runs only if the last page variable is ot equal to 1, if it is only 1 page we require no paginated links to display
if ($lastPage != "1"){
    // This shows the user what page they are on, and the total number of pages
    $paginationDisplay .= 'Page <strong>' . $pn . '</strong> of ' . $lastPage. '&nbsp;  &nbsp;  &nbsp; ';
    // If we are not on page 1 we can place the Back button
    if ($pn != 1) {
        $previous = $pn - 1;
        $paginationDisplay .=  '&nbsp;  <a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $previous . '"> Back</a> ';
    }
    // Lay in the clickable numbers display here between the Back and Next links
    $paginationDisplay .= '<span class="paginationNumbers">' . $centerPages . '</span>';
    // If we are not on the very last page we can place the Next button
    if ($pn != $lastPage) {
        $nextPage = $pn + 1;
        $paginationDisplay .=  '&nbsp;  <a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $nextPage . '"> Next</a> ';
    }
}
///////////////////////////////////// END Adam's Pagination Display Setup ///////////////////////////////////////////////////////////////////////////

// keeps getting the next row until there are no more to get
print '<div class="title" align="center">Latest Uploaded</div>';
 $getdata = mysql_query("SELECT folderid,folderurl FROM folder ORDER BY folderid DESC $limit") 
  or die(mysql_error());
 while($row = mysql_fetch_array( $getdata )) {

	// Print out the contents of each row into a table
 $link = $row['folderurl'];
 $id = $row['folderid'];

$foldername = transdir($link_exp[count($link_exp)-1]);

///End Filesize
  {
  $post_bg=($bg++%2== 0) ? "" : "item1";
 print '<div class="file"><a href="/view/'.$id.'/'.$foldername.'.html">'.$foldername.'<br/><font color="black"><small>File Size : '.$size.'</small></font></a></div>';
} 
}
 print '<div class="tags"><b>Tags : </b> Latest Bangla Mp3 Songs,Latest English Mp3 Songs,Latest Hindi Mp3 Songs,Latest Kalkata Mp3 Songs,Free Bangla Mp3 Songs,Free English Mp3 Songs,Free Hindi Mp3 Songs,Latest Kalkata Mp3 Songs</div><div class="pgn" align="center">'.$paginationDisplay.'</div>';
  echo"<div class='path'><a href='index.php'>Home</a></div>";
        

include("footer.php");
?>