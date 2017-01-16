/**
 * @file
 * A JavaScript file for the theme.
 *
 * In order for this JavaScript to be loaded on pages, see the instructions in
 * the README.txt next to this file.
 */

// JavaScript should be made compatible with libraries other than jQuery by
// wrapping it with an "anonymous closure". See:
// - https://drupal.org/node/1446420
// - http://www.adequatelygood.com/2010/3/JavaScript-Module-Pattern-In-Depth
(function ($, Drupal, window, document, undefined) {


// To understand behaviors, see https://drupal.org/node/756722#behaviors
Drupal.behaviors.my_custom_behavior = {
  attach: function(context, settings) {

    // Place your code here.
$(document).ready(function() {
    if ($('body').hasClass('page-node-42210')) {
    $('.sectionDLBox').bjqs({
            animtype : 'slide',
    		height      : 639,
    		width       : 1224,
			animduration : 1000,
			animspeed : 6000,
			showcontrols : false,
			showmarkers : false,
    		responsive  : true
  		});
    }
    
    $('.accordianMe h3').click(function() {
        if ($(this).hasClass('open')) {
            $(this).removeClass('open');
            $('.accordianMe p').hide();
            $('.accordianMe ul').hide();
            $('.accordianMe ol').hide();
        } else {
            $('.accordianMe p').hide();
            $('.accordianMe ul').hide();
            $('.accordianMe ol').hide();
            $('h3.open').removeClass('open');
            $(this).nextUntil('h3').show();
            $(this).addClass('open');
            
        }
    });
    
    //sub nav functions
    
    $(".menu__item a[href$='pdf']").attr('target','_blank');
    
    var currentUrl = window.location.pathname,
        actualActive, sibsorkids;
    
    $('.menu a[href="'+currentUrl+'"]').addClass('thisone');
    
    currentChildren = $('.menu a[href="'+currentUrl+'"]').next('ul').html();
    currentSibs = $('.menu a[href="'+currentUrl+'"]').parents('ul').html();
    //console.log(currentSibs);
    if (currentChildren != null) {
        $('#block-block-64 .menu').html(currentChildren);
    } else if(currentSibs != null) {
        $('#block-block-64 .menu').html(currentSibs);
    } else {
        //console.log('null null');
    }
    
    // fix for longish sub nav
    //var subWidth = $('#block-block-76 li').each().width();
    var subWidth = 0;
    $('#block-block-64 li').each(function () {
        
        if ($(this).index() == 0) {
            subWidth = $(this).width() + subWidth;
            
        } else {
            subWidth = $(this).width() + 18 + subWidth;
            if (subWidth > $('#block-block-64').width()) {
                $('#main').css('padding-top', '153px');
                $(this).addClass('nextR');
            }
        }
        
        
    });
    
    $('.country').each(function () {
       var locTxt = $(this).text();
        locTxt = locTxt.replace('United States', 'US');
        $(this).text(locTxt);
    });
});
      
      
  }
};


})(jQuery, Drupal, this, this.document);
