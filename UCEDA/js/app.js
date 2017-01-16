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
      jQuery(document).ready(function($){
          
          if($('#formThanks').length) {
              
              var moveThanks = $('#formThanks');
              $('#formThanks').remove();
              $('.webform-client-form').css('padding-bottom','126px');
              $('.webform-component--policy-link').css('bottom','-1px');
              $('.webform-component--policy-link').append(moveThanks);
          } else {
              
          }
          
          $('.rowButton input').prop('checked', false);
          $('.rowButton input').click(function () {
              console.log('1');
             var ticketUrl = $(this).parents('.fauxRow').find('.rowDetail a:first-child').attr('href');
             document.location = ticketUrl;
          });
          
          
          var date = new Date();
          currentDate = date.getDate();     // Get current date
          if (currentDate < 10) {
              currentDate = "0"+currentDate;
          }
          month       = date.getMonth() + 1; // current month
          if (month < 10) {
              month = "0"+month;
          }
          year        = date.getFullYear();         
          var curDate = new Date(year+'-'+month+'-'+currentDate);
          //curDate = new Date('2016-08-20');
              
          
          $('.webform-component--intro-html .yesBox').each(function() {
              var spanDate = new Date($(this).attr('data-date'));
              
              if (spanDate < curDate) {                  
                  $(this).addClass('expired');
                  $(this).children('input').remove();
                  $(this).children('label').text('This year’s event is now over.  Be sure to visit next year!');
                  $(this).parent().parent().addClass('sgf');
                  $(this).parent().siblings('form-actions').remove();
              }
          });
          
          $('.visitBox span').each(function() {
              var spanDate = new Date($(this).attr('data-date'));              
              if (spanDate < curDate) {                  
                  $(this).addClass('expired');
                  $(this).children('.date').text("(expired)");
                  $(this).children('a').removeAttr('href');
              }
          });
              
          $('.fauxRow').each(function() {
              var spanDate = new Date($(this).attr('data-date'));              
              if (spanDate < curDate) {                  
                  $(this).addClass('expired');
                  $(this).find('.date').text("(expired)");
                  $(this).find('a').removeAttr('href');
                  $(this).find('a.fmi').text("(expired)");
                  $(this).find("input[type=radio]").attr('disabled', true);
              }
          });
          //console.log(curDate);
          
          
          //persist form values
          
          if (localStorage) {
            // LocalStorage is supported!
            
            $('.webform-client-form input').blur(function() {
                var fname = $('#edit-submitted-first-name').val();
                localStorage.setItem('fname', fname);
                var lname = $('#edit-submitted-last-name').val();
                localStorage.setItem('lname', lname);
                var add1 = $('#edit-submitted-address-line-1').val();
                localStorage.setItem('add1', add1);
                var add2 = $('#edit-submitted-address-line-2').val();
                localStorage.setItem('add2', add2);
                var city = $('#edit-submitted-city').val();
                localStorage.setItem('city', city);
                var state = $('#edit-submitted-state').val();
                localStorage.setItem('state', state);
                var zip = $('#edit-submitted-zip').val();
                localStorage.setItem('zip', zip);
                var email = $('#edit-submitted-email').val();
                localStorage.setItem('email', email);
                var prof = $('#edit-submitted-what-best-describes-your-profession').val();
                localStorage.setItem('prof', prof);
                var tel = $('#edit-submitted-telephone-number').val();
                localStorage.setItem('tel', tel);
            });
              
              var fname = localStorage.getItem('fname');              
              if (fname != "undefined" || fname != "null") {
                  $('#edit-submitted-first-name').val(fname);
              }
              var lname = localStorage.getItem('lname');              
              if (lname != "undefined" || lname != "null") {
                  $('#edit-submitted-last-name').val(lname);
              }
              var add1 = localStorage.getItem('add1');              
              if (add1 != "undefined" || add1 != "null") {
                  $('#edit-submitted-address-line-1').val(add1);
              }
              var add2 = localStorage.getItem('add2');              
              if (add2 != "undefined" || add2 != "null") {
                  $('#edit-submitted-address-line-2').val(add2);
              }
              var city = localStorage.getItem('city');              
              if (city != "undefined" || city != "null") {
                  $('#edit-submitted-city').val(city);
              }
              var state = localStorage.getItem('state');              
              if (state != "undefined" || state != "null") {
                  $('#edit-submitted-state').val(state);
              }
              var zip = localStorage.getItem('zip');              
              if (zip != "undefined" || zip != "null") {
                  $('#edit-submitted-zip').val(zip);
              }
              var email = localStorage.getItem('email');              
              if (email != "undefined" || email != "null") {
                  $('#edit-submitted-email').val(email);
              }
              var prof = localStorage.getItem('prof');              
              if (prof != "undefined" || prof != "null") {
                  $('#edit-submitted-what-best-describes-your-profession').val(prof);
              }
              var tel = localStorage.getItem('tel');              
              if (tel != "undefined" || tel != "null") {
                  $('#edit-submitted-telephone-number').val(tel);
              }
     
          }
      });      
    
      
      //
  }
};


})(jQuery, Drupal, this, this.document);
