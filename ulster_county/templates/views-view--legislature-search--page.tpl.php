<?php

/**
 * @file
 * Main view template.
 *
 * Variables available:
 * - $classes_array: An array of classes determined in
 *   template_preprocess_views_view(). Default classes are:
 *     .view
 *     .view-[css_name]
 *     .view-id-[view_name]
 *     .view-display-id-[display_name]
 *     .view-dom-id-[dom_id]
 * - $classes: A string version of $classes_array for use in the class attribute
 * - $css_name: A css-safe version of the view name.
 * - $css_class: The user-specified classes names, if any
 * - $header: The view header
 * - $footer: The view footer
 * - $rows: The results of the view query, if any
 * - $empty: The empty text to display if the view is empty
 * - $pager: The pager next/prev links to display, if any
 * - $exposed: Exposed widget form/info to display
 * - $feed_icon: Feed icon to display, if any
 * - $more: A link to view more, if any
 *
 * @ingroup views_templates
 */
?>
<script>

</script>
<div class="<?php print $classes; ?>"> <?php print render($title_prefix); ?>
  <?php if ($title): ?>
  <?php print $title; ?>
  <?php endif; ?>
  <?php print render($title_suffix); ?>
  <?php if ($header): ?>
  <div class="view-header"> <?php print $header; ?> </div>
  <?php endif; ?>
  
  <?php /* if ($exposed): ?><hr />
    <div class="view-filters">
      <?php print $exposed; ?>
    </div> <hr />
  <?php endif; */ ?>
 
  <?php /*
  
$ftext = $_GET['search_api_views_fulltext'];

$dtext = "";
$dtext = $_GET['field_department'];

*/
?>

<?php if(isset($_GET['field_department'])) {
	$dtext = $_GET['field_department'];
	$dtext = str_replace('<', '', $dtext);
	$dtext = str_replace('>', '', $dtext);
} else {
$dtext = "";
}
 ?>

<?php if(isset($_GET['search_api_views_fulltext'])) {
	$ftext = $_GET['search_api_views_fulltext'];
	
	$ftext = mb_convert_encoding($ftext, 'UTF-8', 'UTF-8');
	$ftext = htmlentities($ftext, ENT_QUOTES, 'UTF-8');
	$ftext = str_replace('<', '', $ftext);
	$ftext = str_replace('>', '', $ftext);
} else {
$ftext = "";
}
 ?>
<?php
  $view = views_get_current_view();
  print $view->total_rows; 
?> Results Found 
  <div class="view-filters">
    <form action="/legislature/search" method="get" id="views-exposed-form-search-page-page" accept-charset="UTF-8">
    <div class="myFormRow">
    <input type="hidden" name="search_api_views_fulltext_op" value="AND" />
    	<p><input type="text" id="edit-search-api-views-fulltext" name="search_api_views_fulltext" value="<?php echo $ftext; ?>" size="30" maxlength="128" class="form-text" />	<input type="submit" id="edit-submit-search-page" name="" value="Search" class="form-submit" /></p>
    </div><!-- mfr -->
    
    </form>
  </div>
  <?php if ($attachment_before): ?>
  <div class="attachment attachment-before"> <?php print $attachment_before; ?> </div>
  <?php endif; ?>
  <?php if ($rows): ?>
  <div class="view-content"> <?php print $rows; ?> </div>
  <?php elseif ($empty): ?>
  <div class="view-empty"> <?php print $empty; ?> </div>
  <?php endif; ?>
  <?php if ($pager): ?>
  <?php print $pager; ?>
  <?php endif; ?>
  <?php if ($attachment_after): ?>
  <div class="attachment attachment-after"> <?php print $attachment_after; ?> </div>
  <?php endif; ?>
  <?php if ($more): ?>
  <?php print $more; ?>
  <?php endif; ?>
  <?php if ($footer): ?>
  <div class="view-footer"> <?php print $footer; ?> </div>
  <?php endif; ?>
  <?php if ($feed_icon): ?>
  <div class="feed-icon"> <?php print $feed_icon; ?> </div>
  <?php endif; ?>
</div>
<?php /* class view */ ?>
