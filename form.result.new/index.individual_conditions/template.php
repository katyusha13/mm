<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>

<div class="cf cf_home" style="background: url(<?=$arResult['FORM_IMAGE']['URL']?>) no-repeat center;">
    <div class="wrap">
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
        <?
        if ($arResult["isFormTitle"])
        {
        ?>
        <p class="title title_all"><?=$arResult["FORM_TITLE"]?></p>
        <?
        } //endif ;
            ?>
            <?
        } // endif
            ?>
        <div class="cont_form">
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

            <?=str_replace('type="text"', 'type="text" class="input_cf" placeholder=" '
                    . $arQuestion["CAPTION"] . '"', $arQuestion["HTML_CODE"])?>

            <?
                }
            } //endwhile
            ?>
            <input class="submit_cf btn_hover" <?=(intval($arResult["F_RIGHT"]) < 10 ? "disabled=\"disabled\"" : "");?> type="submit" name="web_form_submit" value="<?=htmlspecialcharsbx(trim($arResult["arForm"]["BUTTON"]) == '' ? GetMessage("FORM_ADD") : $arResult["arForm"]["BUTTON"]);?>" />

        </div>
        <div class="check">
                <div class="img_check"></div>
                <p class="info_check">Отправляя заявку, вы принимаете <a href="/privacy.html" target="_blank">условия обработки персональных данных</a></p>
            </div>
        <?=$arResult["FORM_FOOTER"]?>
        <?
        } //endif (isFormNote)
        ?>
    </div>
</div>
