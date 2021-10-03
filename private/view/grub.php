<?php
$html = <<<HTML

Do food stuff

HTML;

$ret = new StdClass();
$ret->data = $html;
$ret->haserror = false;

echo json_encode($ret);