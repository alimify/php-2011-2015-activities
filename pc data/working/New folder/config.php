<?php
//Enable compression? (1 or 0)
$zip = 1;


//Number of files on the page:
$filestr = 15;
//The number of folders on the page:
$dirstr = 20;


//Filelist
$allfile = 'mp3,zip,mp4,3gp,apk';
//The length and height of the image for preview
$neww = 100;
$newh = 130;
//Number of comments per page:
$kommstr = 3;

// PCLZIP
$pclzip = 'pclzip.lib.php';
// ID
$mp3 = 'id.php'; // ibid should be pear.php
$vdo = 'getid3/getid3.php'; 
$site = 'anymaza.com';

// Top
$top = '<?xml version="1.0" encoding="UTF-8" ?><!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head>';

// Bottom

$foot = '</body></html>';
?>