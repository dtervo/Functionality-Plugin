<?php
/* Add GEO Meta Tags to Header
*/
function tervo_add_meta_tags() {
	echo '<meta name="meta_name" content="meta_value" />';
	echo '<meta name="geo.region" content="US-FL" />';
	echo '<meta name="geo.placename" content="Clermont" />';
	echo '<meta name="geo.position" content="28.566074;-81.744987" />';
	echo '<meta name="ICBM" content="28.566074, -81.744987" />';
	}

add_action('wp_head', 'tervo_add_meta_tags');


?>
