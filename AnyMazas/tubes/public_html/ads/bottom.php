<script type="text/javascript">
    (function(){
    /**
     ver 1.3 JavaScript(Fast) Adcode
     */
    var uri = encodeURIComponent((window.location.href==''?document.URL:window.location.href));
    var adId="Adacts-slot-";
    adId += parseInt(Math.random()*100000);
    document.write('<div id="'+adId+'"></div>');

    var tag="http://show.adacts.com/site/js2?siteid=2041&size=320x50&format=0&domid="+adId+"&v=1.3&uri="+uri;
    var xtag='<scr'+'ipt type="text/javascript" src="'+tag+'" async>' + '</scr'+'ipt>';
    document.write(xtag);

    })();
</script>