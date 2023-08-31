<?
if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();
/**
 * Bitrix vars
 *
 * @var array $arParams
 * @var array $arResult
 * @var CBitrixComponentTemplate $this
 * @global CMain $APPLICATION
 * @global CUser $USER
 */
?>
<div class="mfeedback">
<?if(!empty($arResult["ERROR_MESSAGE"]))
{
	//foreach($arResult["ERROR_MESSAGE"] as $v)
		//ShowError($v);
}
?>

<form class="feedback_form" action="<?=POST_FORM_ACTION_URI?>" method="POST">
<?=bitrix_sessid_post()?>
<?
if($arResult["OK_MESSAGE"] <> '')
{
?>

	<div class="send_succes">
		<h3>Спасибо за ваше сообщение, скоро мы с вами свяжемся</h3>
		<img src="<?=SITE_TEMPLATE_PATH?>/img/status_succes.png" alt="">
	</div>
	
<?
}
?>
<div class="form_field_flex">

	<div class="form_data_fields">
		<div class="mf-name">
			<div class="mf-text">
				<span class="input_name"><?=GetMessage("MFT_NAME")?></span>
			</div>
			<input class="input_data" type="text" name="user_name" value="<?=$arResult["AUTHOR_NAME"]?>">
		</div>

		<div class="mf-email bottom_block">
			<div class="mf-text">
				<span class="input_name"><?=GetMessage("MFT_EMAIL")?></span>
			</div>
			<input class="input_data" type="text" name="user_email" value="<?=$arResult["AUTHOR_EMAIL"]?>">
		</div>
	</div>

	<div class="mf-message">
		<div class="mf-text">
			<span class="input_name"><?=GetMessage("MFT_MESSAGE")?></span>
		</div>
		<textarea class="input_message" name="MESSAGE" rows="5" cols="40"><?=$arResult["MESSAGE"]?></textarea>
	</div>
</div>
	<div class="btn_send_container">
		<input class="btn_send_message" type="submit" name="submit" value="<?=GetMessage("MFT_SUBMIT")?>">
	</div>
</form>
</div>