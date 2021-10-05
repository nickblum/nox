<?php
$html = <<<HTML

<div id="grubBox">
    <input name="tags" id="tags" class="tagsinput" value="">[+ New Recipe]<!---default: value="foo,bar,baz" --->
</div>

HTML;

$ret = new StdClass();
$ret->callback = 'GRUB';
$ret->data = $html;
$ret->haserror = false;

echo json_encode($ret);

/*

*/