<div class="field field-name-field-department field-type-taxonomy-term-reference field-label-above"><div class="field-label">Department:&nbsp;</div>
<div class="field-items"><div class="field-item even">

    
    <?php
$total = count($items);
$i=0;
foreach ($items as $delta => $item) {
    $i++;
    echo '<a href="/calendar/list/department/';
    print render($item);
    //if ($i != $total) echo', ';
    echo '">';
    print render($item);
    if ($i != $total) echo', ';
    echo '</a>';
    
}
?>
    
</div></div></div>