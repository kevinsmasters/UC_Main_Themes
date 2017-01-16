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
 <p>Sorry, but the page you are looking for is not available. Please use the search below to find the information you are looking for.</p>
  
  <div class="view-filters">
    <form action="/search-page" method="get" id="views-exposed-form-search-page-page" accept-charset="UTF-8">
    <div class="myFormRow">
    <input type="hidden" name="search_api_views_fulltext_op" value="AND" />
    	<p><input type="text" id="edit-search-api-views-fulltext" name="search_api_views_fulltext" value="" size="30" maxlength="128" class="form-text" />	<input type="submit" id="edit-submit-search-page" name="" value="Search" class="form-submit" /></p>
    </div><!-- mfr -->
    <div id="advSearch">
    <p><strong>Advanced
Search</strong></p>
    <div class="myFormRow formDept">
    	<p>Show results only in this department: <select id="edit-field-department" name="field_department" class="form-select">
                   <option value="All" selected="selected">- Any -</option>
                    <option value="12">Executive</option>
                    <option value="2">Aging</option>
                    <option value="27">Attorney</option>
                    <option value="79">Business Services</option>
                    <option value="7">Consumer Fraud</option>
                    <option value="32">Elections Board</option>
                    <option value="11">Emergency Services</option>
                    <option value="33">Employment &amp; Training</option>
                    <option value="10">Environment</option>
                    <option value="13">Finance</option>
                    <option value="4">Health &amp; Mental Health</option>
                    <option value="14">Historian</option>
                    <option value="34">Human Rights Commission</option>
                    <option value="52">Information Services</option>
                    <option value="25">Insurance</option>
                    <option value="15">Legislature</option>
                    <option value="17">Personnel</option>
                    <option value="1">Planning</option>
                    <option value="21">Probation</option>
                    <option value="26">Public Defender</option>
                    <option value="35">Public Works</option>
                    <option value="19">Purchasing</option>
                    <option value="29">Real Property Tax Service</option>
                    <option value="36">Safety</option>
                    <option value="30">Social Services</option>
                    <option value="40">Traffic Safety</option>
                    <option value="22">UCAT</option>
                    <option value="37">Veterans' Services</option>
                    <option value="38">Weights and Measures</option>
                    <option value="39">Youth Bureau</option>
                  </select></p>
    </div><!-- mfr -->
    <?php /*<div class="myFormRow">
    	exclude from search field...
    </div><!-- mfr --> */ ?>
    <div class="myFormRow">
    	<?php /*
        echo 'zomg date magic<br /> ';     
         
		
		echo 'Now:' . $nowDate;
		echo '<br>';
				
		$date = '05/24/2013' ;*/ 
		$nowDate = date("Y-m-d"); 	//  2013-05-24 20:19:15	 Y-m-d H:i:s
$oneWeekAgo = strtotime ( '-1 week' , strtotime ( $nowDate ) ) ;
$oneMonthAgo = strtotime ( '-1 month' , strtotime ( $nowDate ) ) ;
$oneYearAgo = strtotime ( '-1 year' , strtotime ( $nowDate ) ) ;

/*echo date ( 'Y-m-d' , $oneWeekAgo ) . "<br />\n" ;
echo date ( 'Y-m-d' , $oneMonthAgo ) . "<br />\n" ;
echo date ( 'Y-m-d' , $oneYearAgo ) . "<br />\n" ;  
		echo '<br>';*/
		?>
        <input type="hidden" id="edit-changed-op" name="changed_op" value="&gt;=" />
        <div id="datez"><p>
        <input type="radio" id="edit-changed_A" name="changed" value="" /> All Dates
        <input type="radio" id="edit-changed_W" name="changed" value="<?php echo date ( 'Y-m-d' , $oneWeekAgo ); ?> 00:00:00" /> Within the last week     
        <input type="radio" id="edit-changed_M" name="changed" value="<?php echo date ( 'Y-m-d' , $oneWeekAgo ); ?> 00:00:00" /> The past month    
        <input type="radio" id="edit-changed_Y" name="changed" value="<?php echo date ( 'Y-m-d' , $oneWeekAgo ); ?> 00:00:00" /> The past year<p></div>
      
        <?php /*?><select id="edit-changed-op" name="changed_op" class="form-select">
                    <option value="&lt;">Is smaller than</option>
                    <option value="&lt;=">Is smaller than or equal to</option>
                    <option value="=" selected="selected">Is equal to</option>
                    <option value="&lt;&gt;">Is not equal to</option>
                    <option value="&gt;=">Is greater than or equal to</option>
                    <option value="&gt;">Is greater than</option>
                    <option value="empty">Is empty</option>
                    <option value="not empty">Is not empty</option>
                  </select>
           <input type="text" id="edit-changed" name="changed" value="" size="30" maxlength="128" class="form-text" /><?php */?></p>
    </div><!-- mfr -->     
    <div class="myFormRow">
    	<input type="hidden" value="<>" name="type_op" id="operatorT" />
        <input type="hidden" value="document_library_item" name="type" id="typeHid" />
        <input type="checkbox" value="" name="" id="checkType" /> Include Documents</p>
    </div><!-- mfr --> 
    </div>
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
