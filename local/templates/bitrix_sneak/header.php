<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$CurDir = $APPLICATION->GetCurDir();
$CurUri = $APPLICATION->GetCurUri();
?>
<!doctype html>
<html lang="ru">
<head>
    <?

    use Bitrix\Main\Page\Asset;

	
    // Пример подключения JS
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/js/jquery-3.6.0.js');
    //Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/js/fancybox/jquery.fancybox.js');
    //Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/js/myscripts.js');
    // Пример подключения CSS
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/vars.css');
    //Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/js/fancybox/jquery.fancybox.css');
    $APPLICATION->ShowHead();
    ?>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title><? $APPLICATION->ShowTitle() ?></title>
</head>
<body>

<?
$APPLICATION->ShowPanel();
?>

<div class="container">
	<div class="header">

		<div class="header__logo">
			<a href="/">
				<div class="header__logo__main">
					<img src="<?=SITE_TEMPLATE_PATH?>/img/logo.png" alt="">
					<div class="header__logo__slogan">
						<p>BITRIX SNEAKERS</p>
						<span>Магазин лучших кроссовок</span>
					</div>
				</div>
			</a>
		</div>

		<div class="header__menu">
		<?$APPLICATION->IncludeComponent("bitrix:menu", "main_menu", Array(
	"ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
		"CHILD_MENU_TYPE" => "left",	// Тип меню для остальных уровней
		"DELAY" => "N",	// Откладывать выполнение шаблона меню
		"MAX_LEVEL" => "1",	// Уровень вложенности меню
		"MENU_CACHE_GET_VARS" => array(	// Значимые переменные запроса
			0 => "",
		),
		"MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
		"MENU_CACHE_TYPE" => "N",	// Тип кеширования
		"MENU_CACHE_USE_GROUPS" => "Y",	// Учитывать права доступа
		"ROOT_MENU_TYPE" => "top",	// Тип меню для первого уровня
		"USE_EXT" => "N",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
	),
	false
);?>
		</div>

		<div class="header__cart">
			<?$APPLICATION->IncludeComponent(
					"bitrix:sale.basket.basket.line",
					"small_basket",
					Array(),
						false
					);?>
		</div>

	</div>
</div>


