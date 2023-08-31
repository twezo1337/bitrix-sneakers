<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Корзина");
?>

<div class="main_page">
    <div class="news_container">

<?$APPLICATION->IncludeComponent(
	"bitrix:sale.basket.basket",
	"cart_basket",
Array()
);?>

	</div>
</div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>