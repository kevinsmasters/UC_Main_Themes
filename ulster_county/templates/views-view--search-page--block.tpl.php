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
  
  <?php /*if ($exposed): ?>
    <div class="view-filters">
      <?php print $exposed; ?>
    </div>
  <?php endif; */ ?>
  
  
  <div class="view-filters">
    <form action="/search-page" method="get" id="views-exposed-form-search-page-page" accept-charset="UTF-8">
    <div class="myFormRow">
    <input type="hidden" name="search_api_views_fulltext_op" value="AND" />
    	<p><input type="text" id="edit-search-api-views-fulltext" name="search_api_views_fulltext" value="" size="30" maxlength="128" class="form-text" placeholder="Search Ulster County" />	<input type="submit" id="edit-submit-search-page" name="" value="Search" class="form-submit" /><a href="#" id="showDept" title="Advanced Search">D</a></p>
    </div><!-- mfr -->
    <div class="myFormRow formDept">
    <a class="hideDept" href="#">x</a>
    	<p>Department <select id="edit-field-department" name="field_department" class="form-select">
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
                  </select><input type="submit" id="edit-submit-search-page2" name="" value="Search" class="form-submit" /></p>
                  <p><a href="/search-page?adv=y">Try Advanced Search</a></p>
    </div><!-- mfr -->
    
    
    
    </form>
  </div>
 
</div>
<?php /* class view */ ?>
