<?php
/* Add Piwik Analytics code to footer
	Piwik installation at: http://analytics.securihost.com
	Modify "setSiteID" value on line 16
*/

function tervo_add_piwik_code() {
	echo '<script type="text/javascript">
	var _paq = _paq || [];
	_paq.push(["trackPageView"]);
	_paq.push(["enableLinkTracking"]);

  (function() {
    var u=(("https:" == document.location.protocol) ? "https" : "http") + "://analytics.securihost.com/";
    _paq.push(["setTrackerUrl", u+"piwik.php"]);
    _paq.push(["setSiteId", "4"]);
    var d=document, g=d.createElement("script"), s=d.getElementsByTagName("script")[0]; g.type="text/javascript";
    g.defer=true; g.async=true; g.src=u+"piwik.js"; s.parentNode.insertBefore(g,s);
  })();
</script>';
}

add_action('wp_footer', 'tervo_add_piwik_code');
?>
