<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
	die();

use \Bitrix\Main\Localization\Loc;

$this->setFrameMode(true);
?>



	<span class="catalog_item_element">
	<a href="<?= $item['DETAIL_PAGE_URL'] ?>" title="<?= $imgTitle ?>" data-entity="image-wrapper">

	<img src="<?= $item['PREVIEW_PICTURE']['SRC'] ?>" alt="">
	<h3>
		<?= $item['NAME'] ?>
	</h3>

	<span class="price">ЦЕНА:</span>	

	<span class="catalog_item_element_price" id="<?= $itemIds['PRICE'] ?>">
	<?
		foreach ($arResult['ITEM']['ITEM_PRICES'] as $ITEM_PRICE) {
			echo $ITEM_PRICE['PRINT_PRICE'];
	}
	?>
	</span>

	</a>

	<div id="<?= $itemIds['BASKET_ACTIONS'] ?>">
		<button class="btn_basket" id="<?= $itemIds['BUY_LINK'] ?>" href="javascript:void(0)"rel="nofollow">
			<svg class="icon">
  				<use xlink:href="#inbasket"></use>
			</svg>
		</button>
	</div>

		<span class="product-item-image-slider-slide-container slide" id="<?= $itemIds['PICT_SLIDER'] ?>" <?= ($showSlider ? '' : 'style="display: none;"') ?> data-slider-interval="<?= $arParams['SLIDER_INTERVAL'] ?>"
			data-slider-wrap="true">
			<?
			if ($showSlider) {
				foreach ($morePhoto as $key => $photo) {
					?>
					<span class="product-item-image-slide item <?= ($key == 0 ? 'active' : '') ?>"
						style="background-image: url('<?= $photo['SRC'] ?>');"></span>
					<?
				}
			}
			?>
		</span>
		<span class="product-item-image-original" id="<?= $itemIds['PICT'] ?>"
			style="background-image: url('<?= $item['PREVIEW_PICTURE']['SRC'] ?>'); <?= ($showSlider ? 'display: none;' : '') ?>"></span>
		<?
		if ($item['SECOND_PICT']) {
			$bgImage = !empty($item['PREVIEW_PICTURE_SECOND']) ? $item['PREVIEW_PICTURE_SECOND']['SRC'] : $item['PREVIEW_PICTURE']['SRC'];
			?>
			<span class="product-item-image-alternative" id="<?= $itemIds['SECOND_PICT'] ?>"
				style="background-image: url('<?= $bgImage ?>'); <?= ($showSlider ? 'display: none;' : '') ?>"></span>
			<?
		}

		?>
</span>
