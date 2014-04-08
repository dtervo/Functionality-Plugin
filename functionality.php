<?php
/* 
Plugin Name: Tervo Systems Functionality Plugin
Description: Custom functionality for Tervo Systems Websites
Version: 0.1
License: GPL
Author: Dan Tervo
Author URI: www.tervosystems.com
*/
// Add Cutom Post Type Functionality
// Edit the custom-post-type.php file to add custom post types
//require_once('custom-post-type.php');  /*Uncomment this line to add custom post type */

// Add Structured Data to site
// Edit the structured-data-php file to modify fields
require_once('structured-data.php');  /*Uncomment this line to add structured data */

// Add Geo Meta Tags to Site
// Edit the geo-tags.php file to modify fields
require_once('geo-tags.php');  /*Uncomment this line to add structured data */

// Add Google Authorship to Site
function tervo_add_google_author() {
	echo '<link rel="author" href="https://plus.google.com/u/0/105018857658001471650/posts" />';
	}
add_action('wp_head', 'tervo_add_google_author'); 

// Add Piwik Analytics Code to Site
require_once('piwik-code.php');

// Add excerpt functionality to pages
add_action( 'init', 'my_add_excerpts_to_pages' );
function my_add_excerpts_to_pages() {
     add_post_type_support( 'page', 'excerpt' );
	}

//function to call first uploaded image in functions file
function main_image() {
$files = get_children('post_parent='.get_the_ID().'&post_type=attachment
&post_mime_type=image&order=desc');
  if($files) :
    $keys = array_reverse(array_keys($files));
    $j=0;
    $num = $keys[$j];
    $image=wp_get_attachment_image($num, 'large', true);
    $imagepieces = explode('"', $image);
    $imagepath = $imagepieces[1];
    $main=wp_get_attachment_url($num);
		$template=get_template_directory();
		$the_title=get_the_title();
    print "<img src='$main' alt='$the_title' class='alignleftthumb' />";
  endif;
/*				Add the following code to the index.php file to display thumbnails  								*/
/*					<section class="post_content clearfix">															*/
/*							<a href="<?php the_permalink() ?>" >													*/
/*							<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) {		*/
/*							echo get_the_post_thumbnail($post_id, 'thumbnail', array('class' => 'alignleftthumb'));	*/
/*							} else {																				*/
/*							echo main_image();																		*/
/*							} ?></a>																				*/
/*							<?php the_excerpt('Read more &raquo;'); ?>												*/
/*																													*/
/*						</section> 																					*/
}

// Create copyright dates
function tervo_copyright() {
	global $wpdb;
	$copyright_dates = $wpdb->get_results("
		SELECT
		YEAR(min(post_date_gmt)) AS firstdate,
		YEAR(max(post_date_gmt)) AS lastdate
		FROM
		$wpdb->posts
		WHERE
		post_status = 'publish'
		");
	$output = '';
	if($copyright_dates) {
	$copyright = "&copy; " . $copyright_dates[0]->firstdate;
	if($copyright_dates[0]->firstdate != $copyright_dates[0]->lastdate) {
	$copyright .= '-' . $copyright_dates[0]->lastdate;
}
	$output = $copyright;
}
	return $output;
}

// Add "read more" to post excerpts
/* function new_excerpt_more( $more ) {
	return '<div align="right"> <a class="readmore" href="'. get_permalink( get_the_ID() ) . '"> Read More</a></div>';
}
add_filter( 'excerpt_more', 'new_excerpt_more' );
*/
// Enable shortcodes in widgets
add_filter( 'widget_text', array( $wp_embed, 'run_shortcode' ), 8 );

// Enable autoembed functionality in widgets
add_filter( 'widget_text', array( $wp_embed, 'autoembed'), 8 );

// Allow SVG through WordPress Media Uploader
function cc_mime_types( $mimes ){
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
add_filter( 'upload_mimes', 'cc_mime_types' );


?>
