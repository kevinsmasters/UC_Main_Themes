// JavaScript Document

function set_background() {
	//Expandable Background	
		var   vegasImg = "opus-40-bg.jpg";
		var	  photoTitle = '&ldquo;Opus 40, Saugerties NY&rdquo;';
		var	  photoCred = 'Ulster Tourism';
		var   headerTitle = 'Ulster County';
		
	// 	whereami = document.location.pathname.split("/").slice(-2, -1).toString();
	//	if (whereami == "") {
	//		whereami = document.location.pathname.split("/")[1];
	//		alert(whereami);
	//	} else {
	//	alert(whereami);
	//	};
	
    
	//

		jQuery.backstretch(['/sites/all/themes/kiosk/images/kiosk-bg.jpg']);
		//jQuery('#photoTitle').html(photoTitle);
		//jQuery('#nameCredit').html(photoCred);
		//jQuery('#section-title').html(headerTitle);
	/*jQuery( ".views-exposed-widget" ).each(function() {
	var thislabel = jQuery(this).children('label').text().trim();
	//console.log(thislabel);
	jQuery(this).find('input').attr('placeholder',thislabel);
}); */

jQuery(".view-display-id-page_4 .view-content").siblings('.view-filters').hide();


}
