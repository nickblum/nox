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
    <p class="edit-bottom-box">
        <input type="button" id="grubCancelBtn" class="button-icon left material-icons" onclick="NOX.GRUB.cancelEdit();" value="arrow_back">
        <input type="button" id="grubDeleteBtn" class="button-icon right material-icons" value="delete">
    </p>
    <!--
    <div class="edit-button-box">
        <input type="button" id="grubCancelBtn" class="button-icon left material-icons" onclick="NOX.GRUB.cancelEdit();" value="arrow_back">
        <input type="button" id="grubDeleteBtn" class="button-icon right material-icons" value="delete">
    </div>-->
    <p>
        <input placeholder="Recipe Name" autocomplete="off" id="recipeTitle" type="text" class="text">
    </p>
    <p>
        <label for="grubDifficulty" class="label">Difficulty</label>
        <select id="grubDifficulty" name="effort" class="select w20 clear">
            <option value="1">1 (Easy)</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5 (Hard)</option>
        </select>
    </p>
    <p>
        <label for="" class="label">Notice Required</label>
        <input type="text" placeholder="dd:hh" class="text w40" name="notice_duration">
    </p>
    <p>
        <label for="" class="label">Time</label>
        <div class="duration-box">
            <input type="text" class="duration duration-d" size="3" increment="1" value="00">
            <div class="duration">Day</div>
            <input type="text" class="duration duration-h" size="2" increment="1" value="00">
            <div class="duration">Hrs</div>
            <input type="text" class="duration duration-m" size="2" increment="15" value="00">
            <div class="duration">Min</div>
            <input type="button" class="duration duration-updown material-icons" value="arrow_upward">
            <input type="button" class="duration duration-updown material-icons" value="arrow_downward">
        </div>


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