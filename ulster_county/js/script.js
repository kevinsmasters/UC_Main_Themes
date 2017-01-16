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
		//Expandable Background
		
		
		set_background();
		
		// Resolution filter return
		function getQueryVariable(variable)
{
       var query = window.location.search.substring(1);
       var vars = query.split("&");
       for (var i=0;i<vars.length;i++) {
               var pair = vars[i].split("=");
               if(pair[0] == variable){return pair[1];}
       }
       return(false);
		}
		var rstatname = getQueryVariable("field_rstatus_value");
		var rterm = getQueryVariable("field_term_value");
		//console.log(rstatname);
		if (rstatname != false) {
			if(rstatname != 'All') {
			//console.log(rstatname);
			jQuery('#rstatusIndicator').show();
			}
		}
		
		if (rterm != false) {
			if(rterm != 'All') {
			//console.log(rstatname);
			jQuery('#rtermIndicator').show();
			}
		}
		
		// Resolution view page sort
		jQuery('#edit-field-term-value').change(function() {
			
			var changedVal = jQuery(this).val();
						
			//console.log(changedVal);
			jQuery('#edit-field-session-nid option').each(function() {
				jQuery(this).show();
				if(!jQuery(this).is(':contains("'+changedVal+'")')) {
					jQuery(this).hide();
				}
				});				
			
		});
    
    
		//For the contact legislator form
		
		var legName = getQueryVariable("legemail");
		if (legName != false) {
			
			var legEmail;
            legName = legName.replace(/%20/g, ' ');
            //console.log(legName);
            var legislators = "http://ulstercountyny.gov/legislator-json";
            jQuery.getJSON(legislators, function (json) {
                var legArray = [];
                
           //build committee array
           jQuery.each(json.members, function (index, member) {
               legArray.push(member.title);
           });            
            //find the index of the committee that was clicked
           var cmIndex =(jQuery.inArray(legName, legArray));
                //console.log(cmIndex); 
                var legEmails = [];
            jQuery.each(json.members, function (index, member) {
               legEmails.push(member.Email);
                
           });   
                if (cmIndex > -1) {
            legEmail = legEmails[cmIndex];
              jQuery('#edit-submitted-contact').attr('value', legEmail);  
                } else {
                jQuery('#edit-submitted-contact').attr('value', 'vfab@co.ulster.ny.us');     
                }
                
            });
            
            
			
			var legClean = legName.replace(/%20/g, " ");
			jQuery('#page-title').html('Contact '+legClean);
		} else {
			
            jQuery('#edit-submitted-contact').attr('value', 'vfab@co.ulster.ny.us');  
		}		
			
		//For the contact committee form
		
		var comName = getQueryVariable("comemail");
       
		if (comName != false) {
             comName = comName.replace(/%20/g, " ");
			//console.log(comName);
			var comEmail;
            
            var committees = "http://ulstercountyny.gov/com-contact-json";
            jQuery.getJSON(committees, function (json) {
                var comArray = [];
                
           //build committee array
           jQuery.each(json.committees, function (index, committee) {
               comArray.push(committee.title);
           });            
            //find the index of the committee that was clicked
           var cmIndex =(jQuery.inArray(comName, comArray));
                console.log(cmIndex); 
                var comEmails = [];
            jQuery.each(json.committees, function (index, committee) {
               comEmails.push(committee.Email);
                
           });   
                if (cmIndex > -1) {
                comEmail = comEmails[cmIndex];
              jQuery('#edit-submitted-committee-contact').attr('value', comEmail);  
                } else {
                jQuery('#edit-submitted-committee-contact').attr('value', 'vfab@co.ulster.ny.us');     
                }
                
            });
            
			jQuery('#page-title').html('Contact ' +comName);
		} else {
            jQuery('#edit-submitted-committee-contact').attr('value', 'vfab@co.ulster.ny.us');
            
            
		}
		
		
		
		
		//For the Advanced Search page
		jQuery('#checkType').change(function() {
											// alert('argh');
    	if (this.checked) {
			jQuery('#typeHid').attr('value','All');
			jQuery('#operatorT').attr('value','=');
        	
    	} else {
		//alert('no more lert');	
			
			jQuery('#operatorT').attr('value','<>');
			jQuery('#typeHid').attr('value','document_library_item');
		}
		});
		
		// executive home page news ticker 
		jQuery("ul.newsticker").liScroll();
		
		//show or hide search department
		jQuery('#showDept').click(function() {
								jQuery('.formDept').toggle();
										   });
		jQuery('.hideDept').click(function() {
								jQuery('.formDept').toggle();
										   });
		/*
		jQuery('#checkType').click(function(){
											 //alert('needs lerts');
			jQuery('#typeHid').attr('value','All');
			jQuery('#operatorT').attr('value','=');
		});*/
		
		
		//emergency banner cookie magic
		if (!jQuery.cookie('davidbanner')) {
			jQuery('.region-alert').animate({
				height: "75px"								
			}, 1500);
			jQuery('.region-alert + #page header#header').animate({
				top: "75px"								
			}, 1500);
			jQuery('.region-alert + #page #headerFixed').animate({
				top: "75px"								
			}, 1500);
			jQuery('.region-alert + #page #main').animate({
				top: "75px"								
			}, 1500);
			jQuery('.region-alert + #page #section-title').animate({
				top: "75px"								
			}, 1500);
			jQuery('.region-alert + #page #footer').animate({
				top: "75px"								
			}, 1500);
        	  
		}
		jQuery('.messages--error').click(function() {
			jQuery(this).hide();			
		});
		//destroy emergency banner
		jQuery('#closeBan').click(function() {
		   jQuery('.region-alert').animate({
				height: "0"								
			}, 1500);
			jQuery('.region-alert + #page header#header').animate({
				top: "0"								
			}, 1500);
			jQuery('.region-alert + #page #headerFixed').animate({
				top: "0"								
			}, 1500);
			jQuery('.region-alert + #page #main').animate({
				top: "0"								
			}, 1500);
			jQuery('.region-alert + #page #section-title').animate({
				top: "0"								
			}, 1500);
			jQuery('.region-alert + #page #footer').animate({
				top: "0"								
			}, 1500);
			//Create a cookie
			var date = new Date();
 			var minutes = 120;
 			date.setTime(date.getTime() + (minutes * 60 * 1000));
			jQuery.cookie('davidbanner', 'viewed', {expires: date, path: '/'});
		});
		
		
		// external popup
		jQuery('a.ext').leaveNotice({
		siteName:"Ulster County",
		exitMessage:"<h2>You are now leaving {SITENAME}!</h2><p>You are being directed to a third-party website: {URL}</p><p>This link is provided for your convenience. Please note that this third-party website is not controlled by {SITENAME} or subject to our privacy policy.</p><p>Thank you for visiting our site. We hope your visit was informative and enjoyable.</p>",
		preLinkMessage:"",		
		messageBoxId:"custom-messageBox",
		messageBoxHolder:"custom-messageHolder",
		overlayAlpha:0.6,
		timeOut:0
		});
		
		
		
		jQuery('a').on('touchend', function(e) {
    	var el = jQuery(this);
    	var link = el.attr('href');
    	window.location = link;
		});
		
		
		//SLABS
		//Government Slab
		jQuery('.mid-g a').mouseover(function() {
			//alert ("need moar lerts!");
			jQuery('#block-block-9').css({display: 'block'});
			jQuery(this).addClass('activeNav');
		}).mouseout(function() {
			//alert ("need moar lerts!");
			jQuery('#block-block-9').css({display: 'none'});
			jQuery(this).removeClass('activeNav');
			jQuery('#block-block-9').mouseover(function() {
				jQuery('#block-block-9').css({display: 'block'});
				jQuery('.mid-g a').addClass('activeNav');
			}).mouseout(function() {
			    jQuery('#block-block-9').delay(1000).css({display: 'none'});
				jQuery('.mid-g a').removeClass('activeNav');
			});
		});
		//Resident Slab
		jQuery('.mid-r a').mouseover(function() {
			jQuery('#block-block-12').css({display: 'block'});
			jQuery(this).addClass('activeNav');
		}).mouseout(function() {
			jQuery('#block-block-12').css({display: 'none'});
			jQuery(this).removeClass('activeNav');
			jQuery('#block-block-12').mouseover(function() {
				jQuery('#block-block-12').css({display: 'block'});
				jQuery('.mid-r a').addClass('activeNav');
			}).mouseout(function() {
			    jQuery('#block-block-12').delay(1000).css({display: 'none'});
				jQuery('.mid-r a').removeClass('activeNav');
			});
		});
		//Business Slab
		jQuery('.mid-b a').mouseover(function() {
			jQuery('#block-block-13').css({display: 'block'});
			jQuery(this).addClass('activeNav');
		}).mouseout(function() {
			jQuery('#block-block-13').css({display: 'none'});
			jQuery(this).removeClass('activeNav');
			jQuery('#block-block-13').mouseover(function() {
				jQuery('#block-block-13').css({display: 'block'});
				jQuery('.mid-b a').addClass('activeNav');
			}).mouseout(function() {
			    jQuery('#block-block-13').delay(1000).css({display: 'none'});
				jQuery('.mid-b a').removeClass('activeNav');
			});
		});
		//Visitor Slab
		jQuery('.mid-v a').mouseover(function() {
			jQuery('#block-block-14').css({display: 'block'});
			jQuery(this).addClass('activeNav');
		}).mouseout(function() {
			jQuery('#block-block-14').css({display: 'none'});
			jQuery(this).removeClass('activeNav');
			jQuery('#block-block-14').mouseover(function() {
				jQuery('#block-block-14').css({display: 'block'});
				jQuery('.mid-v a').addClass('activeNav');
			}).mouseout(function() {
			    jQuery('#block-block-14').delay(1000).css({display: 'none'});
				jQuery('.mid-v a').removeClass('activeNav');
			});
		});
		//How Do I Slab
		jQuery('.mid-h a').mouseover(function() {
			jQuery('#block-block-15').css({display: 'block'});
			jQuery(this).addClass('activeNav');
		}).mouseout(function() {
			jQuery('#block-block-15').css({display: 'none'});
			jQuery(this).removeClass('activeNav');
			jQuery('#block-block-15').mouseover(function() {
				jQuery('#block-block-15').css({display: 'block'});
				jQuery('.mid-h a').addClass('activeNav');
			}).mouseout(function() {
			    jQuery('#block-block-15').delay(1000).css({display: 'none'});
				jQuery('.mid-h a').removeClass('activeNav');
			});
		});
		// end of slabs
		
		// newsletter signup slab (I lied, one more slab :P)
		
		jQuery('#nlSignup').mouseover(function() {
			jQuery('#block-block-23').css({display: 'block', visibility: 'visible'});			
			jQuery(this).addClass('activeNlNav');
		}).mouseout(function() {
			jQuery('#block-block-23').css({display: 'none'});
			jQuery(this).removeClass('activeNlNav');
			jQuery('#block-block-23').mouseover(function() {				
				jQuery('#block-block-23').css({display: 'block', visibility: 'visible'});
				jQuery('#nlSignup').addClass('activeNlNav');				
			}).mouseout(function() {
			    jQuery('#block-block-23').delay(1000).css({display: 'none'});
				jQuery('#nlSignup').removeClass('activeNav');
			});
		});
		
		
		
		// dept landing dl 
		jQuery('.sectionDLBox').bjqs({
    		height      : 278,
    		width       : 966,
			animduration : 1000,
			animspeed : 6000,
			showcontrols : false,
			showmarkers : false,
    		responsive  : true
  		});
		
		jQuery('.ucoedDLBox').bjqs({
    		height      : 296,
    		width       : 450,
			animduration : 1000,
			animspeed : 6000,
			showcontrols : false,
			showmarkers : false,
    		responsive  : true
  		});
		jQuery('.region-sidebar-first .menu .menu .expanded').prevAll().css('display', 'none');
		jQuery('.region-sidebar-first .menu .menu .expanded').css('border-top', '1px solid #181818');
		
		if ( pagePath.indexOf ( "county-archive" ) != -1) {
			
		
		// archive gallery
		jQuery('div.navigation').css({'width' : '174px', 'float' : 'left'});
		jQuery('div.imgcontent').css('display', 'block');

					
				// Initialize Minimal Galleriffic Gallery
				jQuery('.view-county-archive .item-list').galleriffic({
					imageContainerSel:      '#slideshow',
					captionContainerSel:      '#caption',
					numThumbs:                 70,
					controlsContainerSel:   '#controls'
				});
		};
		
		jQuery('a[title=Spanish]').click(function() {
			jQuery('#block-block-37').hide();
			jQuery('body').addClass('spanish');
			//console.log('clicked Spanish');
		});
		
		jQuery('a[title=English]').click(function() {
			jQuery('#block-block-37').show();
			jQuery('body').removeClass('spanish');
			//console.log('clicked English');
		});
		
		
//jQuery('#advSearch').hide();		
		function getQueryVariable(variable)
{
       var query = window.location.search.substring(1);
       var vars = query.split("&");
       for (var i=0;i<vars.length;i++) {
               var pair = vars[i].split("=");
               if(pair[0] == variable){return pair[1];}
       }
       return(false);
}
var advSearch = getQueryVariable("adv");
if (advSearch == "y") {
	//advSearch = "";
	jQuery('#advSearch').show();
	//alert (advSearch);
} else {
	//jQuery('#si_contact_ex_field1_4').val(docName);
	//alert (advSearch);
	//jQuery('#advSearch').show();
};
		
		
		jQuery('.myFormRow a#advanced').click(function(e) {
													   e.preventDefault();
													   	jQuery('#advSearch').show();
													   });
		
		// iconalitry
		// Add pdf icons to pdf links
		jQuery("#content a[href$='.pdf']").addClass("pdf").attr('target','_blank');
		jQuery("#content a[href$='.doc']").addClass("doc");
		jQuery("#content a[href$='.docx']").addClass("doc");		
		jQuery("#content a[href$='.xls']").addClass("xls");			
		jQuery("#content a[href$='.xlsx']").addClass("xls");		
		jQuery("#content a[href$='.ppt']").addClass("ppt");
		jQuery("#content a[href$='.wav']").addClass("wav");
		jQuery("#content a[href$='.mp3']").addClass("mp3");
		jQuery("#content a[href$='.wma']").addClass("wma");
		jQuery("#content a[href$='.mov']").addClass("mov");
		jQuery("#content a[href$='.wmv']").addClass("wmv");
		jQuery("#content a[href$='.avi']").addClass("avi");
		jQuery("#content a[href$='.mp4']").addClass("mp4");
		jQuery("#content a[href$='.m4v']").addClass("m4v");
		jQuery("#content a[href$='.PDF']").addClass("pdf");
		jQuery("#content a[href$='.DOC']").addClass("doc");
		jQuery("#content a[href$='.DOCX']").addClass("doc");		
		jQuery("#content a[href$='.XLS']").addClass("xls");		
		jQuery("#content a[href$='.XLSX']").addClass("xls");		
		jQuery("#content a[href$='.PPT']").addClass("ppt");
		jQuery("#content a[href$='.WAV']").addClass("wav");
		jQuery("#content a[href$='.MP3']").addClass("mp3");
		jQuery("#content a[href$='.WMA']").addClass("wma");
		jQuery("#content a[href$='.MOV']").addClass("mov");
		jQuery("#content a[href$='.WMV']").addClass("wmv");
		jQuery("#content a[href$='.AVI']").addClass("avi");
		jQuery("#content a[href$='.MP4']").addClass("mp4");
		jQuery("#content a[href$='.M4V']").addClass("m4v");
		
	jQuery(".resolutionPDF a").attr("target","_blank");
		
	});

/////////
/// Our Function
/////////
function tabletTouch() {

	/////////
	/// Settings Object
	/////////
	var settings = {
		objHoverItem: '.hoverItem',
		objClickItem: '.clickItem'
	}

	/////////
	/// Scan For Touch Device
	/////////
	if ("ontouchstart" in document.documentElement) {
		//Set our event strings to be touch events
		strClick = 'touchend';
		strOver = 'touchstart';
		//A string that determines which device we are using
		strDevice = 'Touch Device';
	}
	else {
		//Set our event strings to be mouse events
		strClick = 'click';
		strOver = 'mouseover';
		//A string that determines which device we are using
		strDevice = 'Normal Device';
	} 

	/////////
	/// Some simple test events
	/////////

	//Mouseover event
	jQuery(settings.objHoverItem).bind(strOver , function(e){
                //Prevent any default actions 
                e.preventDefault();
		alert('This is a "Hover" event with a ' + strDevice);												 
	});

	//Click event
	jQuery(settings.objClickItem).bind(strClick , function(){
		alert('This is a "Click" event with a ' + strDevice);												 
	});
}


})(jQuery, Drupal, this, this.document);
