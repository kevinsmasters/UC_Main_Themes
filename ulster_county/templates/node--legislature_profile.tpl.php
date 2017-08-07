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
    <?php if ( $myvalTrue == 'No' ) : ?>
  <div class="legPhoto">
<?php print render($content['field_lphoto']); ?>
<?php $fname = explode(' ',trim($title)); ?>
      
<a href="/legislature/legislator-contact-form?legemail=<?php print $title; ?>" class="contactLeg">Contact <?php echo $fname[0]; ?></a>

<a href="mailto:<?php print render($content['field_lemail']); ?>"><?php print render($content['field_lemail']); ?></a>
     
</div>
     <?php endif; ?>
<div class="legInfo <?php echo ($myvalTrue); ?>">
<?php print render($content['field_title']); ?>
<div class="distTitle">Legislator,</div> <?php print render($content['field_district_name']); ?>
    
<?php if ( $myvalTrue == 'No' ) : ?>
<h3 class="blueHeading">Contact Information</h3>
<?php print render($content['field_address']); ?>
<?php print render($content['field_phone']); ?>
<?php print render($content['field_home_phone']); ?>
<?php print render($content['field_cell_phone']); ?>
    
    <?php endif; ?>
<h3 class="blueHeading">Legislative Information</h3>

<?php if (!empty($content['field_committees'])): ?>
<div class="whiteBox">

<?php print render($content['field_committees']); ?>

<?php print render($content['field_chair_of_committee']); ?>
<?php print render($content['field_deputy_chair_of']); ?>
</div> <?php endif; ?>
<div class="whiteBox">
<?php print render($content['field_party_affiliation']); ?>
</div>
<div class="whiteBox">
<?php if ( $myvalTrue == 'No' ) : ?>
<span class="boxHeading currentSess"><strong class="field-label">Current Term</strong> <a href="#" id="togCurr"><em>show previous</em></a></span>
<span class="boxHeading prevSess" style="display:none;"><strong class="field-label">Previous Term</strong> <a href="#" id="togPrev"><em>show current</em></a></span>    
    <br>	
    <div id="currSess">
<a href="#attendance" class="soFancy">Attendance</a>, <a href="#votes" class="soFancy">Voting Record</a><br>
<a href="#sponsored" class="soFancy">Sponsored Legislation</a><br></div>
   <div id="prevSess" style="display:none;">
        <a href="#oldAttendance" class="soFancy">Attendance</a>, <a href="#oldVotes" class="soFancy">Voting Record</a><br>
   
    <a href="#oldSponsored" class="soFancy">Sponsored Legislation</a>
       </div>
	<?php endif; ?>  
	   <?php if ( $myvalTrue == 'Yes') : ?>
	   <span class="boxHeading prevSess"><strong class="field-label">Previous Terms</strong></span><br>
	   <div id="prevSess">
        <a href="#oldAttendance" class="soFancy">Attendance</a>, <a href="#oldVotes" class="soFancy">Voting Record</a><br>
   
    <a href="#oldSponsored" class="soFancy">Sponsored Legislation</a>
       </div>
	   <?php endif; ?>
</div>
</div>
<br class="clearfix" />
<?php if (!empty($content['body'])): ?>
    <?php if ( $myvalTrue == 'No' ) : ?>
<div class="backgroundinfo">
<h3 class="blueHeading">Background <a href="#" class="showfull">-</a><a href="#" class="hidefull">+</a></h3>
<div class="whiteBox">
<?php print render($content['body']); ?>
</div>
</div>
    <?php endif; ?>
 <?php endif; ?>
    
    <?php if ( $myvalTrue == 'No' ) : ?>
 <?php if (!empty($content['field_additional_info'])): ?>
<div class="addlinfo">
<h3 class="blueHeading">Additional Information <a href="#" class="showfull">-</a><a href="#" class="hidefull">+</a></h3>
<div class="whiteBox">
<?php print render($content['field_additional_info']); ?>
</div>
</div>
 <?php endif; ?>
   <?php endif; ?>
    
    <?php if (!empty($content['field_legislature_term'])): ?>
    <div class="adlinfo">
    <h3 class="blueHeading">Terms Served</h3>
        <div class="whiteBox">
        <?php print render($content['field_legislature_term']); ?>
        </div>
    </div>
    <?php endif; ?>
</article><!-- /.node -->
<div style="display:none;">
<div id="attendance"><a name="attop"></a><p class="atjumps"><em>jump to: </em>&nbsp;<a href="#atabsent">absent</a></p>
<h3><?php echo date('Y'); ?> Attendance</h3>

<?php
	ulster_county_show_block('views', '8698faf38514bd9e629149198e41a3a7');
  ?>
   <a name="atabsent"></a>
  <?php
	ulster_county_show_block('views', 'f3f8dc27d7f98e844ebaa71b9ce5f3ef');
  ?>
</div>
    <div id="oldAttendance"><a name="oattop"></a><p class="atjumps"><em>jump to: </em>&nbsp;<a href="#oatabsent">absent</a></p>
<h3>Attendance from previous terms</h3>

<?php
	    ulster_county_show_block('views', 'legislature_meetings-block_7');
  ?>
   <a name="oatabsent"></a>
  <?php
	    ulster_county_show_block('views', 'legislature_meetings-block_8');
  ?>
</div>
<div id="votes"><a name="votop"></a><p class="atjumps"><em>jump to voted: </em>&nbsp;<a href="#voteno">no</a> | <a href="#voteabst">abstained</a> | <a href="#votenot">no vote</a></p>
<h3><?php echo date('Y'); ?> Votes</h3>

<?php
	ulster_county_show_block('views', 'resolution_votes-block_1');
  ?><a name="voteno"></a>
 <?php
	ulster_county_show_block('views', 'resolution_votes-block_4');
  ?><a name="voteabst"></a>
   <?php
	ulster_county_show_block('views', 'resolution_votes-block_3');
  ?><a name="votenot"></a>
  <?php
	ulster_county_show_block('views', 'resolution_votes-block_2');
  ?>  
</div>
<div id="sponsored">
<h3><?php echo date('Y'); ?> Sponsored Legislation</h3>
 <?php
	ulster_county_show_block('views', 'sponsored_legislation-block');
  ?> 
</div>
    <div id="oldSponsored">
<h3>Sponsored legislation from previous terms</h3>
 <?php
	    ulster_county_show_block('views', 'sponsored_legislation-block_1');
  ?> 
</div>
    <div id="oldVotes">
    <a name="pvotop"></a><p class="atjumps"><em>jump to voted: </em>&nbsp;<a href="#pvoteno">no</a> | <a href="#pvoteabst">abstained</a> | <a href="#pvotenot">no vote</a></p>
<h3>Votes from previous terms</h3>
<?php
	    ulster_county_show_block('views', 'a34afb9740b9fafa5d8bf17b5fec9f97');
  ?><a name="pvoteno"></a>
 <?php
	    ulster_county_show_block('views', 'a79312593aeb1001bb95a8ff88234ce7');
  ?><a name="pvoteabst"></a>
   <?php
	    ulster_county_show_block('views', 'dc7c585292005f7fa4ae14e5eb41fce8');
  ?><a name="pvotenot"></a>
  <?php
	    ulster_county_show_block('views', '90aa6b6de7060d516a55d0a9f504208b');
  ?>  
    </div>
</div>
<script>
    jQuery('#togCurr').click(function(e) {
        e.preventDefault();
	jQuery('.currentSess').hide();
        jQuery('#currSess').hide();
	jQuery('.prevSess').show();
        jQuery('#prevSess').show();
});
jQuery('#togPrev').click(function(e) {
    e.preventDefault();
	jQuery('#prevSess').hide();
    jQuery('#currSess').show();
    jQuery('.prevSess').hide();
    jQuery('.currentSess').show();
});
jQuery('.backgroundinfo .showfull').click(function(e){
		e.preventDefault();
		jQuery('.field-name-body .field-item').toggle();
		jQuery(this).toggle();
		jQuery(this).siblings('.hidefull').toggle();
	});
	jQuery('.backgroundinfo .hidefull').click(function(e){
		e.preventDefault();
		jQuery('.field-name-body .field-item').toggle();
		jQuery(this).siblings('.showfull').toggle();
		jQuery(this).toggle();
	});
	jQuery('.addlinfo .showfull').click(function(e){
		e.preventDefault();
		jQuery('.field-name-field-additional-info .field-item').toggle();
		jQuery(this).toggle();
		jQuery(this).siblings('.hidefull').toggle();
	});
	jQuery('.addlinfo .hidefull').click(function(e){
		e.preventDefault();
		jQuery('.field-name-field-additional-info .field-item').toggle();
		jQuery(this).siblings('.showfull').toggle();
		jQuery(this).toggle();
	});
</script>
