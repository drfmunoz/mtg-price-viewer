<?php
/*
google tracking javascript... should be present everywhere
*/
?>
<script type="text/javascript">
    var _gaq = _gaq || [];
	_gaq.push(['_setAccount', 'UA-39144059-1']);
	_gaq.push(['_setDomainName', 'lestack.fr']);
	_gaq.push(['_setAllowLinker', true]);
	_gaq.push(['_trackPageview']);

    (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();
</script>