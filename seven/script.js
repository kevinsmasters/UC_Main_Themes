jQuery(document).ready(function(){ 
    
    // is this a resolution clone situation?
    if (jQuery('body').hasClass('node-type-legislative-resolutions') && jQuery('body').hasClass('page-node-clone-confirm'))
    {
       jQuery('#edit-field-parent').hide();
        var titleVar = jQuery('#edit-title').val();
        
        if (titleVar.length > 0) {
            titleVar = titleVar.replace("Clone of", "");
			
            jQuery('#edit-field-inheritance #edit-field-inheritance-und-duplicate').click(function(){
                jQuery('#edit-field-parent-und-0-value').attr('value', titleVar);
                jQuery('#edit-field-parent').show();
            
            });
			jQuery('#edit-field-inheritance #edit-field-inheritance-und-duplicate').click();
        }
		
		
    }
    
    // is this a new resolution?
    if (jQuery('body').hasClass('page-node-add-legislative-resolutions') )
        {
             jQuery('#edit-field-parent').hide();
            jQuery('#edit-field-inheritance').hide();
        }
    
    // make checkboxes shift click all
    var lastChecked = null;
    
    var $chkboxes = jQuery('.form-checkbox');
                $chkboxes.click(function(e) {
                    if(!lastChecked) {
                        lastChecked = this;
                        return;
						
						
                    }
    
                    if(e.shiftKey) {
                        var start = $chkboxes.index(this);
                        var end = $chkboxes.index(lastChecked);

                        $chkboxes.slice(Math.min(start,end), Math.max(start,end)+ 1).prop('checked', lastChecked.checked);
						
                    }
    
                    lastChecked = this;
					
					jQuery('.form-checkbox').each(function() {
							if(jQuery(this).attr('disabled')) {
								jQuery(this).prop('checked', false);
							}
						});
                });
    
    
    //committee select to enable only members in that committee
        // get the json
    var memberOf = "http://ulstercountyny.gov/committee-json";
       jQuery.getJSON(memberOf, function (json) {        
           
            // trigger upon changing the Committee field
            jQuery('#edit-field-committee-und').change(function() {
                
                if(jQuery(this).val()=="_none" || jQuery(this).val().length>1) {                   
                    jQuery('input.form-checkbox').removeAttr('disabled');
                    jQuery('label').css('opacity','1');
                    
                } else {
                    
                masterJFunc();
                
            }
            });
			
			// another function because different field name :/
			jQuery('#edit-field-in-committee-und').change(function() {
                
                if(jQuery(this).val()=="_none" || jQuery(this).val().length>1) {                   
                    jQuery('input.form-checkbox').removeAttr('disabled');
                    jQuery('label').css('opacity','1');
                    
                } else {
                    
                masterJFunc();
                
            }
            });
           
           
           // trigger on page load
        if(jQuery('#edit-field-committee-und').val()!=null) {   
           if(jQuery('#edit-field-committee-und').val()=="_none" || jQuery('#edit-field-committee-und').val().length>1) { 
               
           } else {
               masterJFunc(); 
			   
           }
        }
           
           
           
           function masterJFunc() {
			   var cmName;
               cmName = jQuery('#edit-field-committee-und option:selected').text(); // what's the committee name
               //var cmName2 = jQuery('#edit-field-in-committee-und option:selected').text();
			   
				if (cmName == undefined || cmName == '') {
					cmName = jQuery('#edit-field-in-committee-und option:selected').text();	
				
				}				
			   
                cmName = jQuery.trim(cmName);
                cmName = cmName.replace('&amp;', '&');   // clean it up and make it ready             
                var comArray = [];
                
           //build committee array
           jQuery.each(json.committees, function (index, committee) {
               comArray.push(committee.title);
           }); 
           
            //find the index of the committee that was clicked
           var cmIndex =(jQuery.inArray(cmName, comArray));
                //console.log(cmIndex); 
                
              //build member array
           var memArray = [];
           jQuery.each(json.committees, function (index, committee) {
               memArray.push(committee.field_members);
           });   
           
                // turn the member array into something we can look through
           var selectMembers = memArray[cmIndex];  
           
                var selectArray = selectMembers.split("; ");
               
                // now make all the checkboxes unclickable
                
               function memberActivate(optionsID) {    

				if (selectArray.length > 0) {
                    jQuery(optionsID + ' input.form-checkbox').attr('disabled', true);    
                    jQuery(optionsID + ' label').css('opacity', '0.5');
                   
                //now make all checkboxes in selectMembers clickable                
              
                   for ( var i = 0; i < selectArray.length; i++ )
					{
                        jQuery(optionsID + ' label:contains("'+selectArray[i]+'")').each(function() {
 					      jQuery(this).css('opacity', '1');
                          jQuery(this).prev('input.form-checkbox').removeAttr('disabled');  
                        });
                     
			         }  
                    
                } 

			   }				
                memberActivate('#edit-field-voted-yes-und');
                memberActivate('#edit-field-abstained');
                memberActivate('#edit-field-voted-no');
                memberActivate('#edit-field-no-vote');
               memberActivate('#edit-field-attended');
               memberActivate('#edit-field-absent');
               //memberActivate('#edit-field-sponsors');
			   //memberActivate('#edit-field-co-sponsors');
           }
        });
    
    
    
    
});