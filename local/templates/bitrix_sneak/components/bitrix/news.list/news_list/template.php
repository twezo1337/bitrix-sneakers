<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);

$themeClass = isset($arParams['TEMPLATE_THEME']) ? ' bx-'.$arParams['TEMPLATE_THEME'] : '';
?>

		<div class="news">
			<?foreach($arResult["ITEMS"] as $arItem):?>
				<div class="card" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
					<div class="card_content">

					<img src="<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?>" alt="<?= $arItem["PREVIEW_PICTURE"]["ALT"] ?>"
						title="<?= $arItem["PREVIEW_PICTURE"]["TITLE"] ?>"/>

					<div class="card_content_text">
						<h4><?=$arItem["NAME"]?></h4>
						<p><?=$arItem["PREVIEW_TEXT"];?></p>
						<?$value = CIBlockFormatProperties::DateFormat($arParams["ACTIVE_DATE_FORMAT"], MakeTimeStamp($value, CSite::GetDateFormat()));?>

						<span class="news-list-value"><?=$value;?></span>
					</div>
					
	
					</div>
				</div>
			<?endforeach;?>
		</div>
