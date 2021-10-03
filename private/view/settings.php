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
<form id="sectorBox">
    <fieldset>
        <legend>Sectors</legend>
        $sectorDsp
        <input placeholder="New Sector..." autocomplete="off" id="addSector" type="text" class="text">
    </fieldset>
</form>
<form id="sectorEditBox">
    <fieldset>
        <legend></legend>
        <div id="sectorEditButtonBox">
            <input type="button" class="button" onclick="NOX.SETTINGS.cancelEdit();" value="<-">
            <input type="button" class="button" value="[S]">
            <input type="button" class="button" value="[T]">
        </div>
        <input placeholder="Sector Title (optional)" autocomplete="off" id="secTitle" type="text" class="text">
    </fieldset>
</form>
HTML;

$ret = new StdClass();
$ret->data = $html;
$ret->qry = $sectorQry;
$ret->haserror = false;

echo json_encode($ret);