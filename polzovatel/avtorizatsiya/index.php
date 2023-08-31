<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Авторизация");
?>

<div class="main_page">
    <div class="form_container">

<?$APPLICATION->IncludeComponent("bitrix:main.auth.form", "avtorizatsiya", Array(
	"AUTH_FORGOT_PASSWORD_URL" => "/polzovatel/avtorizatsiya/get_password.php",	// Страница для восстановления пароля
		"AUTH_REGISTER_URL" => "/polzovatel/avtorizatsiya/registration.php",	// Страница для регистрации
		"AUTH_SUCCESS_URL" => "/polzovatel/",	// Страница после успешной авторизации
	),
	false
);?>

	</div>
</div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>