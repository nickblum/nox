<?php

// Get existing list of stuff
require '../model/common.php';
$sectorQry = getNavSectors();
$qry = $sectorQry->data;
$sectorDsp = '';
while($row = $qry->fetch_assoc()) {
    $sectorDsp .= '<input type="button" class="button button-sector" sector_id="' . $row['sector_id'] . '" onclick="NOX.SETTING.editSector(this);" value="' . $row['title'] . '">';
}

$html = <<<HTML
<form>
    <fieldset>
        <legend>Sectors</legend>
        $sectorDsp
        <input placeholder="New Sector..." type="text" class="text">
    </fieldset>
</form>
<div id="">

</div>
HTML;

$ret = new StdClass();
$ret->data = $html;
$ret->qry = $sectorQry;
$ret->haserror = false;

echo json_encode($ret);