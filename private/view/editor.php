<?php
$html = <<<HTML

EDITOR

HTML;

$ret = new StdClass();
$ret->data = $html;
$ret->haserror = false;

echo json_encode($ret);