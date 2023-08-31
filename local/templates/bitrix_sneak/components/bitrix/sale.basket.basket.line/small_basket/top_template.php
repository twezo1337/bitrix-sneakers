<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();
/**
 * @global array $arParams
 * @global CUser $USER
 * @global CMain $APPLICATION
 * @global string $cartId
 */
$compositeStub = (isset($arResult['COMPOSITE_STUB']) && $arResult['COMPOSITE_STUB'] == 'Y');
?>

<a href="<?= $arParams['PATH_TO_BASKET'] ?>" rel="nofollow" class="header_basket_item">
	<svg class="icon">
  		<use xlink:href="#basket"></use>
	</svg>
    <span>
        <?= $arResult['TOTAL_PRICE'] ?></i>
    </span>
</a>

<?if(CUser::IsAuthorized()):?> 
	<a href="/polzovatel/">
	<svg class="icon">
  		<use xlink:href="#user"></use>
	</svg>
	</a>
	<a class="exit_link" href="/?logout=yes&<?=bitrix_sessid_get()?>">Выйти</a>
<?else:?>
	<a class="auth_link" href="/polzovatel/avtorizatsiya/">Вход в личный кабинет</a>
<?endif;?>  

