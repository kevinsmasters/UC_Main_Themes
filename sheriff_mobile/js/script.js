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
    
    // show full site link
    $('#block-block-77 a').click(function(e) {
		e.preventDefault();
		
		if (!jQuery.cookie('sheriff')) {
		
		jQuery.cookie('sheriff', 'desktop', {expires: 1, path: '/'});
		location.reload();
		} /*else {
			
		}*/
	});
    
    // unlock header when scrolling with menu expanded
    var headHeight = $('#header').height();
    
    var lastScrollTop = 0;
		$(window).on('scroll', function() {
			st = $(this).scrollTop();
			//console.log(st);
			if(st < lastScrollTop) {
				$('#header').addClass('slideDown');
				$('#header').removeClass('slideUp');
				$('#header').removeClass('slideOut');
                
			}
			else {
				if(st > headHeight) {
				$('#header').removeClass('slideDown');
				$('#header').addClass('slideUp');
                    
                   //scroll up
                   
                   
				}
			}
        lastScrollTop = st;
            
            
            
		});
    // show mobile dropdown
    $('#menuOpen').on("click", function(e) {
        e.preventDefault;
        $('#block-menu-menu-sheriff-main-menu').toggle();
        $("#header").toggleClass("navOut");
        $(this).toggleClass('opened');
    });
    
    // get all of the is-expanded li and prepend them to their children with a new class
    var iterateme = 0;
     $('#block-menu-menu-sheriff-main-menu li.is-expanded').each(function () {
         var thisLink = $(this).html();
         thisLinkSplit = thisLink.split('<ul');
         thisLink = thisLinkSplit[0];
         
         $(this).children('.menu').prepend('<li class="expDad"><span>X</span>'+thisLink+'</li>');    
                                                            
     });
    
    $('.expDad span').click(function() {
       $(this).parentsUntil('.is-expanded').removeClass('opened'); 
    });
    $('#block-menu-menu-sheriff-main-menu li.is-expanded > a').click(function(e) {
       e.stopImmediatePropagation();
       $(this).next('.menu').addClass('opened');  
        return false;
       
    });
    
    
    if ($('body').hasClass('page-node-42210')) {
     
    // fix broken responsiveness for home slider
   var winwidth = $(window).width();
        //console.log(winwidth);
        var slideHeight;
        /*switch (winwidth) {
            case 320:
                slideHeight = 167;
                break;
            case 480:
                slideHeight = 251;
                break;
            case 414:
                slideHeight = 216;
                break;
            case 736:
                slideHeight = 384;
                break;
            case 568:
                slideHeight = 297;
                break;
            case 600:
                slideHeight = 313;
                break;
            case 375:
                slideHeight = 196;
                break;
            case 667:
                slideHeight = 348;
                break;
            default:
                slideHeight = 501;
                
        }*/
        slideHeight = winwidth / 1.916167664670659;
        // home slider
    $('.sectionDLBox').bjqs({
            animtype : 'slide',
    		width       : winwidth,
            height  : slideHeight,
			animduration : 1000,
			animspeed : 6000,
			showcontrols : false,
			showmarkers : false,
    		responsive  : true
  		});
        
        $(window).on("orientationchange", function(e) {
            $('.sectionDLBox').bjqs({
            animtype : 'slide',
    		width       : winwidth,
            height  : slideHeight,
			animduration : 1000,
			animspeed : 6000,
			showcontrols : false,
			showmarkers : false,
    		responsive  : true
  		});
        location.reload(true);
    });
        
        $(window).resize(function() {
            $('.sectionDLBox').bjqs({
            animtype : 'slide',
    		width       : winwidth,
            height  : slideHeight,
			animduration : 1000,
			animspeed : 6000,
			showcontrols : false,
			showmarkers : false,
    		responsive  : true
  		});
       location.reload(true);
    
    });
    }
    
    
    // in page accordians
    $('.accordianMe h3').click(function() {
        if ($(this).hasClass('open')) {
            $(this).removeClass('open');
            $('.accordianMe p').hide();
        } else {
            $('.accordianMe p').hide();
            $('h3.open').removeClass('open');
            $(this).nextUntil('h3').show();
            $(this).addClass('open');
            
        }
    });
    
    // reveal signup form
    $('#homeAlert h3').click(function() {
       $('#homeAlert form').toggle();
       
    });
    
    $("#showWarrants").click(function(e) {
        e.preventDefault;
        $(this).hide();
        //$('.page-sheriff-active-warrants .view-active-warrants.view-display-id-page').show();
        $('.page-sheriff-active-warrants .view-display-id-block_1').show();
        $('#content').addClass('nohiding');
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
