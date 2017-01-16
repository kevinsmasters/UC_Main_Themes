<?php

/**
 * @file
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */
?>
<?php if (!empty($title)): ?>
  <h3><?php print $title; ?></h3>
<?php endif; ?>
<select>
<?php foreach ($rows as $id => $row): ?>
  <option<?php if ($classes_array[$id]) { print ' class="' . $classes_array[$id] .'"';  } ?> id="<?php print $view->result[$id]->nid; ?>">
    <?php print $row; ?>
  </option>
<?php endforeach; ?>
</select>
