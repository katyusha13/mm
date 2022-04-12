<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if ($arResult["isFormErrors"] == "Y"):?><?=$arResult["FORM_ERRORS_TEXT"];?><?endif;?>
<?=$arResult["FORM_NOTE"]?>
<?if ($arResult["isFormNote"] != "Y")
{
?>
<?=$arResult["FORM_HEADER"]?>
    <p class="zag_popup"><?=$arResult["FORM_TITLE"]?></p>
<?
if ($arResult["isFormDescription"] == "Y" || $arResult["isFormTitle"] == "Y" || $arResult["isFormImage"] == "Y")
{
?>
	<?
} // endif
	?>

	<?
	foreach ($arResult["QUESTIONS"] as $FIELD_SID => $arQuestion)
	{
		if ($arQuestion['STRUCTURE'][0]['FIELD_TYPE'] == 'hidden')
		{
			echo $arQuestion["HTML_CODE"];
		}
		else
		{
	?>

            <?=str_replace('type="text"', 'type="text" class="name_cf input_all" placeholder="' . $arQuestion["CAPTION"] .'"', $arQuestion["HTML_CODE"])?>

	<?
		}
	} //endwhile
	?>

    <div class="check">
        <div class="img_check"></div>
        <p class="info_check">Отправляя заявку, вы принимаете <a href="/">условия обработки персональных данных</a></p>
    </div>
    <input class="submit_btn" <?=(intval($arResult["F_RIGHT"]) < 10 ? "disabled=\"disabled\"" : "");?> type="submit" name="web_form_submit" value="<?=htmlspecialcharsbx(trim($arResult["arForm"]["BUTTON"]) == '' ? GetMessage("FORM_ADD") : $arResult["arForm"]["BUTTON"]);?>" />
<?=$arResult["FORM_FOOTER"]?>
<?
} //endif (isFormNote)