<div class="field field-where">
<div class="field-label">Where:&nbsp;</div>
    <div class="field-items">
<?php foreach ($items as $delta => $item): ?>

<?php 

print render($item); 
$thisAddr = (render($item)); 
$thisAddr = strip_tags($thisAddr);
//print $thisAddr;
?>
<a href="https://maps.google.com/?q=<?php echo urlencode($thisAddr); ?>&=true" target="blank">map</a>

<?php endforeach; ?> 
        </div>
</div>