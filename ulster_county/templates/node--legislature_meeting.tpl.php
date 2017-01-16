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
<?php print render($content['body']); ?>
<div id="committeeMembers">
<h3>Meeting Date</h3>
<?php print render($content['field_meeting_date']); ?> 
<h3>Committee</h3>
<?php print render($content['field_committee']); ?> 

</div>

<div id="legislativeInfo">
<h3>Location</h3>
<?php print render($content['field_location']); ?>

</div>

<div id="meetingAttendance">
<h3>Meeting Attendance</h3>
<span class="attendicon">attended</span> <span class="absenticon">absent</span>
<?php print render($content['field_attended']); ?> 
<?php print render($content['field_absent']); ?> 
</div>
<div id="meetingFiles">
<?php print render($content['field_agenda']); ?> 
<?php print render($content['field_minutes']); ?> 
<?php print render($content['field_audio']); ?> 

<?php print render($content['field_videolink']); ?> 
</div>
</article><!-- /.node -->
