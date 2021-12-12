<?php

function r($f,$t=0)
{
//$r=explode('.',$f);
//return strtolower($r[count($r)-1-$t]);

return strtolower(substr(strrchr($f,'.'),1));
}

function translit($dir)
{
$dir=basename($dir);
$j=explode('.', $dir);
$r=$j[count($j)-1];
unset($j[count($j)-1]);
$dir=join('.',$j);
if(substr($dir,0, 1)=='!')
{
$trans2= array('JO','ZH','SCH','SH','CH','JE','JY','JA','jo','zh','sch','sh','ch','je','jy',
'ja','A','B','V','G','D','E','Z','I','J','K','L','M','N','O','P','R','S','T',
'U','F','H','C',"'",'Y','a','b','v','g','d','e','z','i','j','k','l','m','n',
'o','p','r','s','t','u','f','h','c',"''","'",'y');
$trans1=array('Ё','Ж','Щ','Ш','Ч','Э','Ю','Я','ё','ж','щ','ш','ч','э','ю',
'я','А','Б','В','Г','Д','Е','З','И','Й','К','Л','М','Н','О','П','Р','С','Т',
'У','Ф','Х','Ц','Ь','Ы','а','б','в','г','д','е','з','и','й','к','л','м','н',
'о','п','р','с','т','у','ф','х','ц','Ъ','ь','ы');
$dir=str_replace($trans1,$trans2,$dir);
$dir=substr($dir,1,strlen($dir));
}
$dir=str_replace('_', ' ', $dir);
return $dir.'.'.$r;
}

function transdir($dir)
{
$dir=str_replace('lib/', '', $dir);
$j=explode('/',$dir);
$countj=count($j);
for($i=0; $i<$countj; $i++)
{
if(substr($j[$i],0, 1)=='!')
{
$trans2=array('JO','ZH','SCH','SH','CH','JE','JY','JA','jo','zh','sch','sh','ch','je','jy',
'ja','A','B','V','G','D','E','Z','I','J','K','L','M','N','O','P','R','S','T',
'U','F','H','C',"'",'Y','a','b','v','g','d','e','z','i','j','k','l','m','n',
'o','p','r','s','t','u','f','h','c',"''","'",'y');
$trans1=array('Ё','Ж','Щ','Ш','Ч','Э','Ю','Я','ё','ж','щ','ш','ч','э','ю',
'я','А','Б','В','Г','Д','Е','З','И','Й','К','Л','М','Н','О','П','Р','С','Т',
'У','Ф','Х','Ц','Ь','Ы','а','б','в','г','д','е','з','и','й','к','л','м','н',
'о','п','р','с','т','у','ф','х','ц','Ъ','ь','ы');
$j[$i]=str_replace($trans1,$trans2,$j[$i]);
$j[$i]=substr($j[$i],1,strlen($j[$i]));
}

}

$dir=str_replace('_', ' ', join('/',$j));
return $dir;
}

function countf($f)
{
$f2 = str_replace('/', 'D',$f);

if(file_exists('count/'.$f2.'.dat'))
{
$j=explode('|',file_get_contents('count/'.$f2.'.dat'));
if($j[0]>time()-3600)
{return $j[1];}
}

$d[] = 'files/'.$f;
$sz = 0;
do
{
$dir = array_shift($d);
$h = opendir($dir);
while($f = readdir($h))
{
if($f != '.' && $f != '..' && $f[0]!='.' && is_readable($dir.'/'.$f))
{
if(is_dir($dir.'/'.$f))
{$d[] = $dir.'/'.$f;}
else
{++$all;}
$sz += filesize($dir.'/'.$f);
}
}
closedir($h);
}
while(sizeof($d) > 0);

if($sz >= 1048576)
{$c = (int)$all.' / '.round($sz/1048576,1).' mb';}
else
{$c = (int)$all.' / '.round($sz/1024,1).' kb';}

file_put_contents('count/'.$f2.'.dat',time().'|'.$c);

return $c;
}

function nav_page($countstr,$page,$dir,$p,$sort,$main)
{
$list='Page '.($page+1).' of '.$countstr.'<br />';
for($i=0; $i<3; $i++)
{
if($i>$countstr-1)
break;
if($page!=$i)
$list.='<a href="http://anymaza.com/'.$dir.'/'.$p.'/'.$sort.'/'.$i.'.html">'.($i+1).'</a> ';
else
$list.=($i+1).'|';
}
if($countstr>3)
{
$list.='...';

for($n=$page-3; $n<$page+3; $n++)
{
if($n>$countstr-1)
break;
if($n<3)
continue;
if($page!=$n)
$list.='<a href="http://anymaza.com/'.$dir.'/'.$p.'/'.$sort.'/'.$n.'.html">'.($n+1).'</a> ';
else
$list.=($n+1).'|';
}
$next=$n;
}
if(@$n<$countstr and isset($n))
{
$list.='..';
for($n=$countstr-3; $n<$countstr; $n++)
{
if($n<@$next)
continue;
if($page!=$n)
$list.='<a href="http://anymaza.com/'.$dir.'/'.$p.'/'.$sort.'/'.$n.'.html">'.($n+1).'</a> ';
else
$list.=($n+1).'|';
}
}
return $list.'<br />';
}

function nav_pagetxt($countstr,$page,$dir,$p,$sort,$main)
{
$list='Page '.($page+1).' of '.$countstr.'<br />';
for($i=0; $i<3; $i++)
{
if($i>$countstr-1)
break;
if($page!=$i)
$list.='<a href="http://anymaza.com/'.$dir.'/'.$p.'/'.($i+1).'/'.$sort.'.html">'.($i+1).'</a> ';
else
$list.=($i+1).'|';
}
if($countstr>3)
{
$list.='...';

for($n=$page-3; $n<$page+3; $n++)
{
if($n>$countstr-1)
break;
if($n<3)
continue;
if($page!=$n)
$list.='<a href="http://anymaza.com/'.$dir.'/'.$p.'/'.$sort.'/'.($n+1).'.html">'.($n+1).'</a> ';
else
$list.=($n+1).'|';
}
$next=$n;
}
if(@$n<$countstr and isset($n))
{
$list.='..';
for($n=$countstr-3; $n<$countstr; $n++)
{
if($n<@$next)
continue;
if($page!=$n)
$list.='<a href="http://anymaza.com/'.$dir.'/'.$p.'/'.$sort.'/'.($n+1).'.html">'.($n+1).'</a> ';
else
$list.=($n+1).'|';
}
}
return $list.'<br />';
}

function tsince($t,$arr){
$tt=time() - $t;
$tp=$arr[0];
if ($tt>=60 && $tt<3600) {
$tt=floor($tt / 60); $tp=$arr[1]; }
if ($tt>=3600 && $tt<86400) {
$tt=floor($tt / 3600); 
$tp=$arr[2]; }
if ($tt>= 86400 && $tt < 2592000) {
$tt=floor($tt / 86400); 
if($tt=='1') {$tp=$arr[3];}else{$tp=$arr[4];} }
if ($tt >= 2592000) {
$tt=floor($tt / 2592000); 
if($tt=='1') {$tp=$arr[5];}else{$tp=$arr[6];} }

return "$tt $tp ";
}


function sortnew($file1,$file2)
{
$time1=filectime($file1);
$time2=filectime($file2);
if($time1==$time2)
return 0;
elseif($time1>$time2)
return -1;
else
return 1;
}
?>