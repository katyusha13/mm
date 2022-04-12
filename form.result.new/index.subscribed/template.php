<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>
<div class="df df3">
        <p class="title"><?=$arResult["FORM_TITLE"]?></p>
    <div class="mailing_list">

    <?if ($arResult["isFormErrors"] == "Y"):?><?=$arResult["FORM_ERRORS_TEXT"];?><?endif;?>
<?=$arResult["FORM_NOTE"]?>
<?if ($arResult["isFormNote"] != "Y")
{
    ?>
    <?=$arResult["FORM_HEADER"]?>

    <?
    if ($arResult["isFormDescription"] == "Y" || $arResult["isFormTitle"] == "Y" || $arResult["isFormImage"] == "Y")
    {
        ?>


        <p><?=$arResult["FORM_DESCRIPTION"]?></p>


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


            <?if (is_array($arResult["FORM_ERRORS"]) && array_key_exists($FIELD_SID, $arResult['FORM_ERRORS'])):?>
            <span class="error-fld" title="<?=htmlspecialcharsbx($arResult["FORM_ERRORS"][$FIELD_SID])?>"></span>
        <?endif;?>


            <?=str_replace('type="text"', 'class="input_mail" type="text" placeholder="' . $arQuestion["CAPTION"] . '"',
            $arQuestion["HTML_CODE"])?>

            <?
        }
    } //endwhile
    ?>
    <?
    if($arResult["isUseCaptcha"] == "Y")
    {
        ?>

        <th colspan="2"><b><?=GetMessage("FORM_CAPTCHA_TABLE_TITLE")?></b></th>


        &nbsp;
        <input type="hidden" name="captcha_sid" value="<?=htmlspecialcharsbx($arResult["CAPTCHACode"]);?>" /><img src="/bitrix/tools/captcha.php?captcha_sid=<?=htmlspecialcharsbx($arResult["CAPTCHACode"]);?>" width="180" height="40" />


        <?=GetMessage("FORM_CAPTCHA_FIELD_TITLE")?><?=$arResult["REQUIRED_SIGN"];?>
        <input type="text" name="captcha_word" size="30" maxlength="50" value="" class="inputtext" />

        <?
    } // isUseCaptcha
    ?>

        <input class="submit_cf btn_hover"  <?=(intval($arResult["F_RIGHT"]) < 10 ? "disabled=\"disabled\"" : "");?> type="submit" name="web_form_submit" value="<?=htmlspecialcharsbx(trim($arResult["arForm"]["BUTTON"]) == '' ? GetMessage("FORM_ADD") : $arResult["arForm"]["BUTTON"]);?>" />

   <!-- <p>
        <?/*=$arResult["REQUIRED_SIGN"];*/?> - <?/*=GetMessage("FORM_REQUIRED_FIELDS")*/?>
    </p>-->
    <?=$arResult["FORM_FOOTER"]?>
    <?
} //endif (isFormNote)
    ?>
    </div>
        <a href="https://maximusmedia.pro/" class="razrab"><img src="<?=SITE_TEMPLATE_PATH?>/images/logo_mm_footer.svg">Разработка<br> и продвижение сайта<br> Maximus Media</a>
</div>
