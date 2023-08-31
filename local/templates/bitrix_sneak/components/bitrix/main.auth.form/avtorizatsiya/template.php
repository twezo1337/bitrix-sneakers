<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true)
{
	die();
}

use \Bitrix\Main\Localization\Loc;
Loc::loadMessages(__FILE__);

\Bitrix\Main\Page\Asset::getInstance()->addCss(
	'E:\front end\bitrix_site\local\templates\bitrix_sneak\css\auth.css'
);

if ($arResult['AUTHORIZED'])
{
	echo Loc::getMessage('MAIN_AUTH_FORM_SUCCESS');
	return;
}
?>


	<form class="auth_form" name="<?= $arResult['FORM_ID'];?>" method="post" target="_top" action="<?= POST_FORM_ACTION_URI;?>">
		<img class="img_left" src="<?=SITE_TEMPLATE_PATH?>/img/bg_form_1.png" alt="">
		<img class="img_right" src="<?=SITE_TEMPLATE_PATH?>/img/bg_form_2.png" alt="">
		<h3>Вход</h3>

		<div class="input_name">Логин</div>
		<div>
			<input class="auth_input" type="text" name="<?= $arResult['FIELDS']['login'];?>" maxlength="255" value="<?= \htmlspecialcharsbx($arResult['LAST_LOGIN']);?>" />
		</div>
			
	
		<div class="input_name input_name_bottom"><?= Loc::getMessage('MAIN_AUTH_FORM_FIELD_PASS');?></div>
		<div>
				<?if ($arResult['SECURE_AUTH']):?>
					<div id="bx_auth_secure" style="display:none">
						<div><span></span>
							<?= Loc::getMessage('MAIN_AUTH_FORM_SECURE_NOTE');?>
						</div>
					</div>
					<script type="text/javascript">
						document.getElementById('bx_auth_secure').style.display = '';
					</script>
				<?endif?>
				<input class="auth_input" type="password" name="<?= $arResult['FIELDS']['password'];?>" maxlength="255" autocomplete="off" />
		</div>
		<div class="forgot_pass">
			<a href="<?= $arResult['AUTH_FORGOT_PASSWORD_URL'];?>" rel="nofollow">
				Забыли пароль?
			</a>
		</div>
			

		<?if ($arResult['STORE_PASSWORD'] == 'Y'):?>
			<div class="remember_me_container">
				<div class="checkbox">
					<label>
						<input type="checkbox" id="USER_REMEMBER" name="<?= $arResult['FIELDS']['remember'];?>" value="Y" />
						<span class="remember_me">Запомнить меня</span>
					</label>
				</div>
			</div>
		<?endif?>

		<div class="auth_btn_container">
			<input class="auth_btn" type="submit" class="btn btn-primary" name="<?= $arResult['FIELDS']['action'];?>" value="<?= Loc::getMessage('MAIN_AUTH_FORM_FIELD_SUBMIT');?>" />
		</div>

		<div class="btn_reg_container">
			<button class="btn_reg"><a href="<?= $arResult['AUTH_REGISTER_URL'];?>" rel="nofollow">
				Регистрация
			</a></button>
		</div>

	</form>
</div>

<style>
	.auth_form {
		position: relative;
		padding-top: 26px;
    	width: 100%;
    	height: 486px;
    	background: #FFFFFF;
    	box-shadow: 0px 4px 20px 5px rgba(0, 0, 0, 0.25);
    	border-radius: 25px;
		padding-left: 359px;
		padding-right: 362px;
		padding-bottom: 45px;
	}
	.auth_form h3{
		font-style: normal;
		font-weight: 400;
		font-size: 28px;
		line-height: 34px;
		color: #000000;
		margin-bottom: 33px;
		text-align: center;

	}
	.data_container {
		width: 100px;
	}
	.input_name {
		font-style: normal;
		font-weight: 200;
		font-size: 16px;
		line-height: 19px;
		color: #000000;
	}
	.auth_input {
		margin-top: 7px;
		width: 245px;
		height: 45px;
		background: #FFFFFF;
		box-shadow: 0px 0px 5px 2px rgba(0, 0, 0, 0.25);
		border-radius: 15px;
		font-style: normal;
		font-weight: 400;
		font-size: 16px;
		line-height: 19px;
		color: #000000;
		padding-left: 18px;
		padding-right: 18px;
	}
	.input_name_bottom {
		margin-top: 25px;
	}
	.forgot_pass {
		text-align: right;
		margin-top: 7px;
	}
	.forgot_pass a{
		font-style: normal;
		font-weight: 200;
		font-size: 12px;
		line-height: 15px;
		color: #5E5E5E;
	}
	.remember_me_container {
		margin-top: 6px;
	}
	.remember_me {
		font-style: normal;
		font-weight: 200;
		font-size: 12px;
		line-height: 15px;
		color: #5E5E5E;
	}
	.auth_btn_container {
		margin-top: 10px;
	}
	.auth_btn {
		cursor: pointer;
		width: 245px;
		height: 45px;
		background: #000000;
		border: 1px solid #000000;
		box-shadow: 0px 0px 5px 2px rgba(126, 144, 99, 0.38);
		border-radius: 15px;
		font-style: normal;
		font-weight: 600;
		font-size: 18px;
		line-height: 24px;
		color: #FFFFFF;
		transition: all 0.3s ease;
	}
	.auth_btn:hover {
		border: 1px solid #000000;
		background-color: #fff;
		color: #000000;
	}
	.btn_reg_container {
		margin-top: 20px;
	}
	.btn_reg {
		width: 245px;
		height: 45px;
		background: #7E9063;
		border: 1px solid #7E9063;
		box-shadow: 0px 0px 5px 2px rgba(126, 144, 99, 0.38);
		border-radius: 15px;
		font-style: normal;
		font-weight: 600;
		font-size: 18px;
		line-height: 24px;
		color: #FFFFFF;
	}
	.btn_reg a{
		color: #FFFFFF;
	}
	.img_left {
		position: absolute;
		top: 0;
		left: 0;
	}
	.img_right {
		position: absolute;
		bottom: 0;
		right: 0;
	}

</style>

<script type="text/javascript">
	<?if ($arResult['LAST_LOGIN'] != ''):?>
	try{document.<?= $arResult['FORM_ID'];?>.USER_PASSWORD.focus();}catch(e){}
	<?else:?>
	try{document.<?= $arResult['FORM_ID'];?>.USER_LOGIN.focus();}catch(e){}
	<?endif?>
</script>