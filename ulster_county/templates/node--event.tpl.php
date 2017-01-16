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

  <?php
    // We hide the comments and links now so that we can render them later.
    hide($content['comments']);
    hide($content['links']);
    //print render($content);
  ?>
<div id="eventLeft">
<?php print render($content['body']); ?>
<?php print render($content['field_organization']); ?>	
<?php print render($content['field_registration_info']); ?>	
<?php print render($content['field_pdf']); ?>	
<?php print render($content['field_event_contact']); ?>	
<?php print render($content['field_contact_address']); ?>	
<?php print render($content['field_contact_phone']); ?>		
<?php print render($content['field_category']); ?>	
	
</div>
<a class="backLink" href="/calendar/">< Back</a>
<div id="eventRight">
	<h3>Event Details</h3>	
<?php print render($content['field_event_date']); ?>	
<?php print render($content['field_address']); ?>		
<?php print render($content['field_fee_admission']); ?>	
	
</div>
<div class="clearer"></div>
  <?php print render($content['links']); ?>

  <?php print render($content['comments']); ?>

</article><!-- /.node -->