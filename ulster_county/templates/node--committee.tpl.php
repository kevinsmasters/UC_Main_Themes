<article class="node-<?php print $node->nid; ?> <?php print $classes; ?> clearfix"<?php print $attributes; ?>>
  <?php if ($title_prefix || $title_suffix || $display_submitted || $unpublished || !$page && $title): ?>
    <header>
      <?php print render($title_prefix); ?>
      <?php if (!$page && $title): ?>
        <h2<?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
      <?php endif; ?>
      <?php print render($title_suffix); ?>

      <?php if ($display_submitted): ?>
        <p class="submitted">
          <?php print $user_picture; ?>
          <?php // print $submitted;
if ($submitted) {
echo "Posted: " . date( "F j, Y",$node->created);
}  ?>
        </p>
      <?php endif; ?>
	  
	  <?php 
	  $myvalTrue = 'No';
    $archived = $node->field_archived;
    if (isset($archived['und'][0]['value'])) {
        $myvalTrue = $node->field_archived['und'][0]['value'];
    }
?>
	  

      <?php if ($unpublished): ?>
        <p class="unpublished"><?php print t('Unpublished'); ?></p>
      <?php endif; ?>
    </header>
  <?php endif; ?>
<?php print render($content['body']); ?>
<div id="meetingInfo">
<h3>Meeting Information:</h3>
<?php print render($content['field_committee_schedule']); ?>
</div>

<div id="committeeMembers"<?php if (!empty($content['field_parent_committee'])): ?>class="hasParent"<?php endif; ?>>
<?php if ($title != 'Ulster County Legislature') : ?>
<h3>Committee Members</h3>

<?php print render($content['field_chairman']); ?> 
<?php print render($content['field_deputy_chairman']); ?> 
<?php print render($content['field_members']); ?> 

<?php else : ?>
<?php /*
<h3>Members</h3>
<?php
    $blockObject = block_load('views', 'legislative_members-block_4');
    $block = _block_get_renderable_array(_block_render_blocks(array($blockObject)));
    $output = drupal_render($block);
    print $output;
  ?> */?>
 <?php endif; ?> 
</div>
<?php if (!empty($content['field_parent_committee'])): ?>
<div id="legislativeInfo">
<h3>Legislative Information</h3>
<?php print render($content['field_parent_committee']); ?> 
</div>
<?php endif; ?>
<div id="meetingAttendance">
<h3>Meeting Attendance</h3>
<span class="attendicon">attended</span> <span class="absenticon">absent</span>
    
    <?php if ( $myvalTrue == 'Yes' ) {
      
    $blockObject = block_load('views', 'legislature_meetings-block_10');
    $block = _block_get_renderable_array(_block_render_blocks(array($blockObject)));
    $output = drupal_render($block);
    print $output;
      
  } else {
      
    $blockObject = block_load('views', 'legislature_meetings-block_2');
    $block = _block_get_renderable_array(_block_render_blocks(array($blockObject)));
    $output = drupal_render($block);
    print $output;
      
  }
  ?>
  <span id="result"></span>
<?php if ( $myvalTrue == 'Yes' ) {
    $blockObject = block_load('views', 'legislature_meetings-block_9');
    $block = _block_get_renderable_array(_block_render_blocks(array($blockObject)));
    $output = drupal_render($block);
    print $output;
   } else {
    $blockObject = block_load('views', 'legislature_meetings-block');
    $block = _block_get_renderable_array(_block_render_blocks(array($blockObject)));
    $output = drupal_render($block);
    print $output;
  }
  ?>
 </div> 
 <?php if ( $myvalTrue != 'Yes' ) : ?>
<?php if ($title != 'Ulster County Legislature') : ?>
<a href="/legislature/legislative-committee-contact?comemail=<?php print $title; ?>" class="contactLeg">Contact This Committee</a>
<?php else : ?>

<a href="/legislature/legislative-committee-contact?comemail=<?php print render($content['field_staff_email']); ?>" class="contactLeg">Contact the Legislature</a>
<?php endif; ?>
<?php endif; ?>
 <?php if ( $myvalTrue != 'Yes' ) : ?>
<div id="meetingDocuments">
<h3>Meeting Documents</h3>
 Show All Documents: <a href="#" id="showCurr">Current Year</a> | <a href="#showPast" id="showPrev">Previous Years</a> 

 <div id="currYear">
 <h4>Current Year<a href="#" class="showfull">+</a><a href="#" class="hidefull">-</a></h4>
<?php
    $blockObject = block_load('views', 'legislature_meetings-block_1');
    $block = _block_get_renderable_array(_block_render_blocks(array($blockObject)));
    $output = drupal_render($block);
    print $output;
  ?>
</div>
 <div id="prevYear">
 <h4>Previous Year<a href="#" class="showfull2">+</a><a href="#" class="hidefull2">-</a></h4>
 
<?php
    $blockObject = block_load('views', 'legislature_meetings-block_6');
    $block = _block_get_renderable_array(_block_render_blocks(array($blockObject)));
    $output = drupal_render($block);
    print $output;
  ?>
</div>
 <div style="display:none;">
 <div id="showCurrent">
 <h4>Current Session</h4>
<?php
    $blockObject = block_load('views', 'legislature_meetings-block_5');
    $block = _block_get_renderable_array(_block_render_blocks(array($blockObject)));
    $output = drupal_render($block);
    print $output;
  ?>
 </div>
 <div id="showPast">
 <h4>Previous Sessions</h4>
<?php
    $blockObject = block_load('views', 'legislature_meetings-block_4');
    $block = _block_get_renderable_array(_block_render_blocks(array($blockObject)));
    $output = drupal_render($block);
    print $output;
  ?>
 </div>
 </div>
</div>

<?php endif; ?>

<?php if ( $myvalTrue == 'Yes' ) : ?>
<div id="meetingDocuments">
<h3>Meeting Documents</h3>

 <div id="prevYear" style="display:block;">
 <h4>Previous Year<a href="#" class="showfull2">+</a><a href="#" class="hidefull2">-</a></h4>
 <?php
    $blockObject = block_load('views', 'legislature_meetings-block_11');
    $block = _block_get_renderable_array(_block_render_blocks(array($blockObject)));
    $output = drupal_render($block);
    print $output;
  ?> 

</div>
 
</div>
<?php endif; ?>

<?php if ( $myvalTrue != 'Yes' ) : ?>
<div id="commcontactinfo">
  <?php if ($title != 'Ulster County Legislature') : ?>
  <h3>Committee Contact Information</h3>
  <?php else : ?>
   <h3>Contact Information</h3>
  <?php endif; ?>
  <?php print render($content['field_staff_contact']); ?>
  <?php print render($content['field_staff_phone']); ?>
  <div class="field">Email: <a href="mailto:<?php print render($content['field_staff_email']); ?>"><?php print render($content['field_staff_email']); ?></a> </div>
   


<?php print render($content['field_additional_info']); ?> </div>
<?php endif; ?>
</article><!-- /.node -->
<?php
$myvalDate = '';
    $valDate = $node->field_legislature_term;
    if (isset($valDate['und'][0]['value'])) {
        $myvalDate = $node->field_legislature_term['und'][0]['value'];
    }
	
?>
<script type="text/javascript">
        jQuery(document).ready(function() {
            //$(".dropdown img.flag").addClass("flagvisibility");

            var myYear = "<?php echo ($myvalDate); ?>";

			
            var yearFrom = myYear.split(/[-]/)[0];
            var yearTo = myYear.split(/[-]/)[1];
            
            jQuery('#meetingSel li').each(function() {
               if(jQuery(this).is(":contains('"+yearFrom+"')")||jQuery(this).is(":contains('"+yearTo+"')")){
                    jQuery(this).addClass('thisTerm');   
                }
                
                
                if(!jQuery(this).hasClass('thisTerm')){
                  //jQuery(this).remove();
                }
            });
            
            jQuery(".dropdown dt a").click(function(e) {
				e.preventDefault();
                jQuery(".dropdown dd ul").toggle();
            });
                        
            jQuery(".dropdown dd ul li a").click(function(e) {
				e.preventDefault();
                var text = jQuery(this).html();
                jQuery(".dropdown dt a span").html(text);
                jQuery(".dropdown dd ul").hide();
                //jQuery("#result").html("Selected value is: " + getSelectedValue("sample"));
            });
                        
            function getSelectedValue(id) {
                return jQuery("#" + id).find("dt a span.value").html();
            }

            jQuery(document).bind('click', function(e) {
                var $clicked = jQuery(e.target);
                if (! $clicked.parents().hasClass("dropdown"))
                    jQuery(".dropdown dd ul").hide();
            });
			
			
			
			jQuery('#meetingSel a').click(function() {
				var merryBaggins = jQuery(this).parent().attr('class');
                var merryBaggins = merryBaggins.replace(' thisTerm', '');
				//console.log (merryBaggins);
				jQuery('#block-views-legislature-meetings-block .views-row').hide();
				jQuery('#block-views-legislature-meetings-block .'+merryBaggins).show();
                
                jQuery('#block-views-legislature-meetings-block-9 .views-row').hide();
				jQuery('#block-views-legislature-meetings-block-9 .'+merryBaggins).show();
			});

			jQuery('#meetingSel li:first-child a').click();
           /* $("#flagSwitcher").click(function() {
                $(".dropdown img.flag").toggleClass("flagvisibility");
            });*/
			
	jQuery('.hidefull').click(function(e){
		e.preventDefault();
		jQuery('#block-views-legislature-meetings-block-1 .views-row').hide();
		jQuery('#block-views-legislature-meetings-block-1 .views-row-first').show();
		
		jQuery(this).toggle();
		jQuery(this).siblings('.showfull').toggle();
	});
	jQuery('.showfull').click(function(e){
		e.preventDefault();
		//console.log('showfull');
		jQuery('#block-views-legislature-meetings-block-1 .views-row').show();
		jQuery(this).siblings('.hidefull').toggle();
		jQuery(this).toggle();
	});
	
	
	jQuery('.hidefull2').click(function(e){
		e.preventDefault();
		jQuery('#block-views-legislature-meetings-block-6 .views-row').hide();
		jQuery('#block-views-legislature-meetings-block-6 .views-row-first').show();
		jQuery('#block-views-legislature-meetings-block-11 .views-row').hide();
		jQuery('#block-views-legislature-meetings-block-11 .views-row-first').show();
		jQuery(this).toggle();
		jQuery(this).siblings('.showfull2').toggle();
	});
	jQuery('.showfull2').click(function(e){
		e.preventDefault();
		jQuery('#block-views-legislature-meetings-block-6 .views-row').show();
		
		jQuery('#block-views-legislature-meetings-block-11 .views-row').show();
		jQuery(this).siblings('.hidefull2').toggle();
		jQuery(this).toggle();
	});
	
	
	jQuery('#showPrev').click(function(e){
		e.preventDefault();
		jQuery('#currYear').hide();
		jQuery('#prevYear').show();
		//jQuery(this).toggle();
		//jQuery(this).siblings('.showfull2').toggle();
	});
	jQuery('#showCurr').click(function(e){
		e.preventDefault();
		jQuery('#currYear').show();
		jQuery('#prevYear').hide();
		//jQuery(this).siblings('.hidefull2').toggle();
		//jQuery(this).toggle();
	});
	
        });
    </script>
