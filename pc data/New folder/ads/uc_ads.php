<?php
if (stristr($_SERVER['HTTP_USER_AGENT'],'windows') || stristr($_SERVER['HTTP_USER_AGENT'],'linux') ||
 stristr($_SERVER['HTTP_USER_AGENT'],'macintosh') || stristr($_SERVER['HTTP_USER_AGENT'],'unix') ||
  stristr($_SERVER['HTTP_USER_AGENT'],'macos') || stristr($_SERVER['HTTP_USER_AGENT'],'bsd')){

}
else {
print '<script src="http://admaster.union.ucweb.com/js/union_html5_sdk.js"></script>
<script>
     try{ 
        Umobi.AdView({
            pub:"admin@anymaza01",
            format_type:Umobi.AdFormatType.BANNER
        });
     }catch(e){}
</script>
<noscript>';
$tm= uniqid();
print '<a href="http://click.union.ucweb.com/?pub=admin@anymaza01&tm='.$tm.'"><img src="http://slot.union.ucweb.com/?pub=admin@anymaza01&format_type=img&tm='.$tm.'"/></a></noscript>';
}
?>