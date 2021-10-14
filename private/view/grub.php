<?php
$html = <<<HTML

<div id="grubBox" class="action-box" style="display:none">
    <div id="grubOmniBox" class="left">
        <input id="grubOmni" class="tagsinput left" value="">
    </div>
    <input id="grubOmniAdd" type="button" class="button-icon right material-icons" value="add">
    <div id="grubRecipeBox" class="edit-box"></div>
</div>
<form id="grubEditBox" class="edit-box" style="display:block;">
    <p class="edit-button-box">
        <input type="button" id="grubCancelBtn" class="button-icon left material-icons" onclick="NOX.GRUB.cancelEdit();" value="arrow_back">
        <input type="button" id="grubDeleteBtn" class="button-icon right material-icons" value="delete">
    </p>
    <p>
        <input placeholder="Recipe Name" autocomplete="off" id="recipeTitle" type="text" class="text">
    </p>
    <p>
        <label for="grubDifficulty" class="label">Difficulty</label>
        <select id="grubDifficulty" name="effort" class="select w25 clear">
            <option value="1">1 (Easy)</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5 (Hard)</option>
        </select>
    </p>
    <p>
        <label for="grubPrepTime" class="label">Prep Time</label>
        <div id="grubPrepTime"></div>
    </p>
    <p>
        <label for="grubCookTime" class="label">Cook Time</label>
        <div id="grubCookTime"></div>
    </p>
    <p>
        <label for="grubSchedTime" class="label">Schedule Notice</label>
        <div id="grubSchedTime"></div>
    </p>
    <p>
        <label for="" class="label">Instructions</label>
        <div class="edit-box grow-wrap">
            <textarea class="textarea" name="grubInstructions" id="grubInstructions" onInput="this.parentNode.dataset.replicatedValue = this.value"></textarea>
        </div>
    </p>
    <p>
        <label for="" class="label w60">Ingredient</label>
        <label for="" class="label w20">Qty</label>
        <input type="text" placeholder="Bacon" class="text w60" name="">
        <input type="text" placeholder="2" class="text w20" name="">
        <input type="text" placeholder="Lbs" class="text w20" name="">
    </p>
</form>

HTML;

$ret = new StdClass();
$ret->callback = 'GRUB';
$ret->data = $html;
$ret->haserror = false;

echo json_encode($ret);

/*

*/