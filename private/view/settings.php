<?php

// Get existing list of stuff
require '../model/common.php';
$sectorQry = getNavSectors();
$qry = $sectorQry->data;
$sectorDsp = '';
while($row = $qry->fetch_assoc()) {
    $sectorDsp .= '<input type="button" class="button button-sector" sector_id="' . $row['sector_id'] . '" value="' . $row['title'] . '">';
}

$html = <<<HTML
<div id="sectorBox">
    $sectorDsp
    <input placeholder="New Sector..." autocomplete="off" id="addSector" type="text" class="text">
</div>
<div id="sectorEditBox">
    <div id="sectorEditButtonBox">
        <input type="button" id="sectorCancelBtn" class="button-icon left material-icons" onclick="NOX.SETTINGS.cancelEdit();" value="arrow_back">
        <input type="button" id="sectorDeleteBtn" class="button-icon right material-icons" value="delete">
    </div>
    <input placeholder="Sector Title (optional)" autocomplete="off" id="secTitle" type="text" class="text">
</div>
HTML;

$ret = new StdClass();
$ret->data = $html;
$ret->qry = $sectorQry;
$ret->haserror = false;

echo json_encode($ret);