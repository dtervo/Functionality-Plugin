jQuery(function() {
    jQuery(document).on('change', "[id^=widget-rvam_organization_schema_]", function(e) {
        jQuery("[id^=widget-rvam_organization_schema_] option:selected").each(function(i) {
            if (jQuery(this).attr("value") == "Local Business") {
				//alert(jQuery(this).attr("value"));
				jQuery(".open-hours").show();
            }
            else {
            	jQuery(".open-hours").hide();
            }
        });
    })
})