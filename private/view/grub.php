<?php
$html = <<<HTML

<div id="grubBox" class="action-box">
    <div id="grubOmniBox" class="left">
        <input id="grubOmni" class="tagsinput left" value="">
    </div>
    <input id="grubOmniAdd" type="button" class="button-icon right material-icons" value="add">
    <div id="grubRecipeBox" class="edit-box"></div>
</div>
<div id="grubEditBox" class="edit-box">
    <div class="edit-button-box">
        <input type="button" id="grubCancelBtn" class="button-icon left material-icons" onclick="NOX.GRUB.cancelEdit();" value="arrow_back">
        <input type="button" id="grubDeleteBtn" class="button-icon right material-icons" value="delete">
    </div>
    <input placeholder="Recipe Name" autocomplete="off" id="recipeTitle" type="text" class="text">
</div>

HTML;

$ret = new StdClass();
$ret->callback = 'GRUB';
$ret->data = $html;
$ret->haserror = false;

echo json_encode($ret);

/*

*/