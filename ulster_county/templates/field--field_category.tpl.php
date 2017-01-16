<div class="field field-name-field-category field-label-above"><div class="field-label">Category:&nbsp;</div>
<div class="field-items"><div class="field-item even"><span class="category">

    
    <?php
$total = count($items);
$i=0;
foreach ($items as $delta => $item) {
    $i++;
    echo '<a href="/calendar/list/';
    print render($item);
    //if ($i != $total) echo', ';
    echo '">';
    print render($item);
    if ($i != $total) echo', ';
    echo '</a>';
    
}
?>
    
    </span></div></div></div>