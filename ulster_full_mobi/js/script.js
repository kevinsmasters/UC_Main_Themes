/**
 * @file
 * A JavaScript file for the theme.
 *
 * In order for this JavaScript to be loaded on pages, see the instructions in
 * the README.txt next to this file.
 */

// JavaScript should be made compatible with libraries other than jQuery by
// wrapping it with an "anonymous closure". See:
// - http://drupal.org/node/1446420
// - http://www.adequatelygood.com/2010/3/JavaScript-Module-Pattern-In-Depth
(function ($, Drupal, window, document, undefined) {


// Place your code here.
jQuery(document).ready(function() {
//console.log('loaded');
jQuery('.switch a').click(function(e) {
		e.preventDefault();
		//alert('clicked');
		//console.log('clicked it');
		if (!jQuery.cookie('doublestuffed')) {
		//alert('LERT!');  
		//Create a cookie
		//console.log('clicked desktop');
		jQuery.cookie('doublestuffed', 'doublestuffed', {expires: 7, path: '/'});
		location.reload();
		} /*else {
			alert('NOLERT');
			jQuery.removeCookie('doublestuffed');
		}*/
	});
});


})(jQuery, Drupal, this, this.document);
