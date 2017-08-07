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
<?php $myvalTrue = $node->field_archived['und'][0]['value']; 

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


<?php if ($title != 'Ulster County Legislature') : ?>
<div id="committeeMembers">
<h3>Committee Members</h3>
<?php print render($content['field_chairman']); ?> 
<?php print render($content['field_deputy_chairman']); ?> 
<?php print render($content['field_members']); ?> 
</div>

<?php else : ?>
<div id="committeeMembers">
<h3>Members</h3>
<?php
	ulster_county_show_block('views', 'legislative_members-block_4');
    
  ?>
</div>

<?php endif; ?>

<div id="legislativeInfo">
<h3>Legislative Information</h3>
<?php print render($content['field_parent_committee']); ?> 
</div>

<div id="meetingAttendance">
<h3>Meeting Attendance</h3>
<span class="attendicon">attended</span> <span class="absenticon">absent</span>
<?php
	ulster_county_show_block('views', 'legislature_meetings-block_2');
   
  ?>
  <span id="result"></span>
<?php
	ulster_county_show_block('views', 'legislature_meetings-block');
  ?>
 </div> 
 <?php if ($title != 'Ulster County Legislature') : ?>
<a href="/legislature/legislative-committee-contact?comemail=<?php print render($content['field_staff_email']); ?>" class="contactLeg">Contact This Committee</a>
<?php else : ?>

<a href="/legislature/legislative-committee-contact?comemail=<?php print render($content['field_staff_email']); ?>" class="contactLeg">Contact the Legislature</a>
<?php endif; ?>
<div id="meetingDocuments">
<h3>Meeting Documents</h3>
 <?php /*Show All Documents: <a href="#" class="currsess">Current Session</a> | <a href="#" class="prevsess">Previous Sessions</a>*/ ?>
 <h4>Current Session<a href="#" class="showfull">+</a><a href="#" class="hidefull">-</a></h4>
<?php
	ulster_county_show_block('views', 'legislature_meetings-block_1');
  ?>
 </div>
 <!-- is <?php echo($myvalTrue); ?> -->
<?php if ( $myvalTrue == 'No' ) : ?>
<div id="commcontactinfo">
  <?php if ($title != 'Ulster County Legislature') : ?>
  <h3>Committee contact information</h3>
  <?php else : ?>
   <h3>Contact Information</h3>
  <?php endif; ?>
  <?php print render($content['field_staff_contact']); ?>
  <?php print render($content['field_staff_phone']); ?>
  <div class="field">Email: <a href="mailto:<?php print render($content['field_staff_email']); ?>"><?php print render($content['field_staff_email']); ?></a> </div>
   


<?php print render($content['field_additional_info']); ?> </div>
<?php endif; ?>
</article><!-- /.node -->
<script type="text/javascript">
        jQuery(document).ready(function() {
            //$(".dropdown img.flag").addClass("flagvisibility");

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
				//console.log (merryBaggins);
				jQuery('#block-views-legislature-meetings-block .views-row').hide();
				jQuery('#block-views-legislature-meetings-block .'+merryBaggins).show();
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
		jQuery('#block-views-legislature-meetings-block-1 .views-row').show();
		jQuery(this).siblings('.hidefull').toggle();
		jQuery(this).toggle();
	});
        });
    </script>
