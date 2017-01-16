<?php

/**

 * @file

 * Basic template file

 */

?>

<?php if (isset($exposed_filters)): ?>

  <div class="exposed_filter_data">

    <div class="title"><?php print t('Filtered by:'); ?></div>

    <div class="content">

      <?php foreach ($exposed_filters as $filter => $key): ?>

        <?php if ($key): ?>

          <div class="filter"><div class="name"><?php print $filter; ?>: </div>

          <?php if (is_array($key)): ?>

            <div class="value"><?php print implode(', ', $key); ?></div>

          <?php else: ?>

            <div class="value"><?php print $key; ?></div>

          <?php endif; ?>

          </div>

        <?php endif; ?>

      <?php endforeach; ?>

    </div>

  </div>

<?php endif; ?>

