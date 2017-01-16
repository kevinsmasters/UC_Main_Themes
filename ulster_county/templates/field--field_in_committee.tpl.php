<div class="field-name-field-in-committee"><?php foreach ($items as $delta => $item): ?>

<?php $thisVar = render($item); ?>


<?php if ($thisVar === '<span class="node-unpublished"><a href="/legislature/ulster-county-legislature">Full Legislature</a></span>') {
	echo 'In the '.$thisVar;
} elseif ($thisVar === '<a href="/legislature/ulster-county-legislature">Full Legislature</a>') {
	echo 'In the '.$thisVar;
} else {
	echo 'In the '.$thisVar;
} ?>


<?php endforeach; ?></div>