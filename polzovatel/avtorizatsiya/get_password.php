<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("TITLE", "Восстановление пароля");
$APPLICATION->SetPageProperty("keywords", "Восстановление пароля");
$APPLICATION->SetPageProperty("description", "Восстановление пароля");
$APPLICATION->SetTitle("Восстановление пароля");
?>

<div class="main_page">
    <div class="form_container">

<?$APPLICATION->IncludeComponent("bitrix:main.auth.forgotpasswd", "get_password", Array(
	"AUTH_AUTH_URL" => "/polzovatel/avtorizatsiya/index.php",	// Страница для авторизации
		"AUTH_REGISTER_URL" => "/polzovatel/avtorizatsiya/registration.php",	// Страница для регистрации
	),
	false
);?>

	</div>
</div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>