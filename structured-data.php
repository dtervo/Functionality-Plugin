<?php
/* Add Structured Data to footer
*/


function tervo_st_data() {
    echo '<div itemscope itemtype="http://schema.org/LocalBusiness">
	<meta itemprop="name" content="Company Name" />
	<meta itemprop="url" content="http://example.com" />
	<meta itemprop="email" content="contact@example.com" />
	<meta itemprop="description" content="Business Description" />
	<div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
		<meta itemprop="streetAddress" content="Street Address" />
		<meta itemprop="postOfficeBoxNumber" content="PO Box" />
		<meta itemprop="addressLocality" content="City" />
		<meta itemprop="addressRegion" content="State" />
		<meta itemprop="postalCode" content="Zip Code" />
		<meta itemprop="addressCountry" content="USA" />
	</div>
	<meta itemprop="telephone" content="(123) 456-7890" />
	<meta itemprop="faxNumber" content="(123) 098-7654" />
	<meta itemprop="openingHours" content="Mo, Tu, We, Th, Fr 08:00-17:00" />
	<meta itemprop="openingHours" content="Sa 08:00-17:00" />
	<meta itemprop="openingHours" content="Su 08:00-17:00" />
</div>
';
}
add_action('wp_footer', 'tervo_st_data');

?>
