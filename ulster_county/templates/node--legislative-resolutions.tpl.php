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

      <?php if ($unpublished): ?>
        <p class="unpublished"><?php print t('Unpublished'); ?></p>
      <?php endif; ?>
    </header>
  <?php endif; ?>

   <?php print render($content['field_summary_title']); ?>
   <div class="fullmode_summary">
    <?php if ($view_mode == 'full'): ?>
      <?php print render($node->body[$node->language][0]['safe_summary']);  ?>
    <?php endif; ?>
</div>
<div id="resolutionInfo">
<h3>Resolution Information</h3>
    <?php //print render($content['field_session']); ?>
	<?php print render($content['field_parent']); ?>
   <?php print render($content['field_rstatus']); ?>
   <?php print render($content['field_in_committee']); ?>
   <?php print render($content['field_session_term']); ?>
   <?print render($content['field_sessionm']); ?>
   <div id="resText">
   <h3>RESOLUTION TEXT <a href="#" class="showfull">+</a><a href="#" class="hidefull">-</a></h3>
 <div class="resfull">
   <a class="printIcon" href="javascript:window.print();">Print</a>
<?php print render($content['body']); ?>
	</div>
</div><p class="resolutionPDF">Current Text: <a class="pdf dld" href="<?php print render($content['field_resolution_pdf']); ?>">PDF</a></p>
   <?php print render($content['field_sponsors']); ?>
   <p>&nbsp;</p>
   <?php print render($content['field_co_sponsors']); ?>
 <p class="updatedDate">Updated: <span><?php
echo format_date($node->changed, 'custom', 'F j, Y');
?></span></p>
   <?php if (!empty($content['field_supporting_documents'])): ?>
   <h3>Supporting Documents</h3>
   <?php print render($content['field_supporting_documents']); ?>
   <?php endif; ?>
</div>

<div id="resVotes">
<h3>Votes on this Resolution</h3>
<span class="attendicon">yes</span> <span class="absenticon">no</span> <span class="excuseicon">abstained</span> <span class="novoteicon">no vote</span>
<?php
	ulster_county_show_block('views', 'resolution_votes-block');
  ?><!-- for votes to original resolution -->
  <?php
	ulster_county_show_block('views', 'resolution_votes-block_5');
  ?>
</div>
</article><!-- /.node -->
<script>
	jQuery('.showfull').click(function(e){
		e.preventDefault();
		jQuery('.resfull').toggle();
		jQuery('.showfull').toggle();
		jQuery('.hidefull').toggle();
	});
	jQuery('.hidefull').click(function(e){
		e.preventDefault();
		jQuery('.resfull').toggle();
		jQuery('.showfull').toggle();
		jQuery('.hidefull').toggle();
	});
	
	jQuery('.voteHide').click(function(e){
		e.preventDefault();
		jQuery(this).parents('.views-row').children('.views-field-field-voted-yes').toggle();
		jQuery(this).parents('.views-row').children('.views-field-field-voted-no').toggle();
		jQuery(this).parents('.views-row').children('.views-field-field-abstained').toggle();
		jQuery(this).parents('.views-row').children('.views-field-field-no-vote').toggle();
		jQuery(this).toggle();
		jQuery(this).siblings('.voteShow').toggle();
		/*jQuery('.view-id-resolution_votes .views-row').show();
		jQuery('.voteShow').toggle();
		jQuery('.voteHide').toggle();*/
	});
	
	jQuery('.voteShow').click(function(e){
		e.preventDefault();
		jQuery(this).parents('.views-row').children('.views-field-field-voted-yes').toggle();
		jQuery(this).parents('.views-row').children('.views-field-field-voted-no').toggle();
		jQuery(this).parents('.views-row').children('.views-field-field-abstained').toggle();
		jQuery(this).parents('.views-row').children('.views-field-field-no-vote').toggle();
		jQuery(this).toggle();
		jQuery(this).siblings('.voteHide').toggle();
		/*jQuery('.view-id-resolution_votes .views-row').show();
		jQuery('.voteShow').toggle();
		jQuery('.voteHide').toggle();*/
	});
	
	/*jQuery('.voteHide').click(function(e){
		e.preventDefault();
		jQuery('.view-id-resolution_votes .views-row').hide();
		jQuery('.view-id-resolution_votes .views-row:first-child').show();
		jQuery('.voteShow').toggle();
		jQuery('.voteHide').toggle();
	});*/
</script>
