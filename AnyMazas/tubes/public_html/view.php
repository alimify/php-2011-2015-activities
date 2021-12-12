<?php
ob_start();

$id=$_GET['id'];
include 'css.php';
include'func.php';

function clean($string) {
   $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
   return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
}
function formatBytes($bytes, $precision = 2) { 
    $units = array('B', 'kB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB'); 
    $bytes = max($bytes, 0); 
    $pow = floor(($bytes ? log($bytes) : 0) / log(1024)); 
    $pow = min($pow, count($units) - 1); 
    $bytes /= pow(1024, $pow);
    return round($bytes, $precision) . '' . $units[$pow]; 
}

if(isset($_REQUEST['id'])) {
	$my_id = $_REQUEST['id'];
	if(strlen($my_id)>11){
		$url   = parse_url($my_id);
		$my_id = NULL;
		if( is_array($url) && count($url)>0 && isset($url['query']) && !empty($url['query']) ){
			$parts = explode('&',$url['query']);
			if( is_array($parts) && count($parts) > 0 ){
				foreach( $parts as $p ){
					$pattern = '/^v\=/';
					if( preg_match($pattern, $p) ){
						$my_id = preg_replace($pattern,'',$p);
						break;
					}
				}
			}
			if( !$my_id ){
				echo '<p>No video id passed in</p>';
				exit;
			}
		}else{
			echo '<p>Invalid url</p>';
			exit;
		}
	}
} else {
	echo '<p>No video id passed in</p>';
	exit;
}


$grab=ngegrab('https://www.googleapis.com/youtube/v3/videos?id='.$id.'&part=topicDetails,status,snippet,player,contentDetails,id,liveStreamingDetails,localizations,recordingDetails,statistics&key=AIzaSyBbrMBEshNcBQg9TtegHSE4Vifl8krYbqo');
$json = json_decode($grab);
foreach($json->items as $data){
$title = $data->snippet->title;
$channelid = $data->snippet->channelId;
$channeltitle = $data->snippet->channelTitle;
$time = $data->contentDetails->duration;
$duration = new DateInterval($time);
$time= $duration->format('%H:%I:%S');
$tags = $data->snippet->tags;
$player = $data->player->embedHtml;
$thumb = $data->snippet->thumbnails->medium->url;
$thumb=str_replace('https://i.ytimg.com/vi/','/vi/',$thumb);
include 'config.php';
print '<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd"><html><head>'.$css.'<title>'.$title.' | AnyMaza.Com</title>';
print '<meta name="keywords" content="'.$title.',';
foreach ($tags as $keyid => $tagsid ){print ''.$tags[$keyid].',';}
print '"/><meta name="description" content="'.$title.',';
foreach ($tags as $keyid => $tagsid ) {print ''.$tags[$keyid].',';}
print '"/><meta name="revisit-after" content="1 days" />
<meta content="1,2,3,10,11,12,13,ATF" name="serps" />
<meta content="5" name="seoconsultantsdirectory" />
<meta content="Abdul Alim Jewel" name="author" />
<meta content="General" name="Rating" />
<meta content="never" name="Expires" />
<meta content="all" name="audience" />
<meta content="english" name="Language" />
<meta name="format-detection" content="telephone=no" />
<meta name="HandheldFriendly" content="true" />
<meta name="robots" content="index,follow" />
<meta name="distribution" content="global" />
<meta name="Identifier-URL" content="http://tube.anymaza.com" /><meta content="chrome=1" http-equiv="X-UA-Compatible" /><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><meta name=viewport content="width=device-width, initial-scale=1"><meta http-equiv="Cache-Control" content="max-age=0" /></head><body><div class="Logo c1"><img src="http://anymaza.com/logo.png" alt="logo" /></div>';
print '<h1>'.$title.'</h1>';
print '<div class="rlfile"><a href="/">Yotube Videos</a>&#187;<a href="/channel/'.$channelid.'/order/date">'.$channeltitle.'</a>&#187;'.$title.'';
include 'ads/top.php';
print '<center><img src="'.$thumb.'" alt "'.$title.'"/>';
print '<br/><br/>Original Source :<a href="https://www.youtube.com/watch?v='.$id.'">Youtube</a><br/>Duration : '.$time.'<br/>Uploaded By : <a href="/channel/'.$channelid.'/order/date">'.$channeltitle.'</a><div><font color="red">Copyright: Those Free Files or Videos are not HOSTED by our server. All of them are Hosted By Youtube.com (Free Content) and all videos direct download link generated by users (NOT by Admin). Its a simple online service to help people to Watch Youtube videos who are using SLOW Internet Connection such as 2G, cause Live streaming doesnt Support on slow an Internet Connection.</font></div></center>';
$description = $data->snippet->description;
}
include 'ads/middle.php';
///Download Link
$urls='http://www.youtube.com/get_video_info?video_id='.$id.'&asv=3&el=detailpage&hl=en_US';
$files=curlGet($urls);
parse_str($files);
$streams = explode(',',$url_encoded_fmt_stream_map);
$avail_formats[] = '';
$i = 0;
$ipbits = $ip = $itag = $sig = $quality = '';
$expire = time();
$ctitle=clean($title);
$dtitle='AnyMaza_Com_'.$ctitle.'';
foreach($streams as $format) {
	parse_str($format);
	$avail_formats[$i]['itag'] = $itag;
	$avail_formats[$i]['quality'] = $quality;
	$type = explode(';',$type);
	$avail_formats[$i]['type'] = $type[0];
	$avail_formats[$i]['url'] = urldecode($url) . '&signature=' . $sig;
	parse_str(urldecode($url));
	$avail_formats[$i]['expires'] = date("G:i:s T", $expire);
	$avail_formats[$i]['ipbits'] = $ipbits;
	$avail_formats[$i]['ip'] = $ip;
	$i++;
}
for ($i = 0; $i < count($avail_formats); $i++) {
	$avail_formats[$i]['type']=str_replace('video/','Download ',$avail_formats[$i]['type']);
		  echo '<div class="rlfile"><a href="'.$avail_formats[$i]['url'].'&title='.$dtitle.'">'.$avail_formats[$i]['type'].' ('.formatBytes(get_size($avail_formats[$i]['url'])).')</a> </div>';
	}
	include 'ads/bottom.php';
	print 'free download '.$title.','.$tile.' video';
	foreach ($tags as $keyid => $tagsid ) {print 'free download '.$tags[$keyid].',';}
print $foot;
?>