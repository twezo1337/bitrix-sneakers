<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
    die();

use Bitrix\Main\Localization\Loc;

/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $arResult
 * @var CatalogSectionComponent $component
 * @var CBitrixComponentTemplate $this
 * @var string $templateName
 * @var string $componentPath
 * @var string $templateFolder
 */

CJSCore::Init(array("jquery"));

$this->setFrameMode(true);

$templateLibrary = array('popup', 'fx');
$currencyList = '';

if (!empty($arResult['CURRENCIES'])) {
    $templateLibrary[] = 'currency';
    $currencyList = CUtil::PhpToJSObject($arResult['CURRENCIES'], false, true, true);
}

$templateData = array(
    'TEMPLATE_THEME' => $arParams['TEMPLATE_THEME'],
    'TEMPLATE_LIBRARY' => $templateLibrary,
    'CURRENCIES' => $currencyList,
    'ITEM' => array(
        'ID' => $arResult['ID'],
        'IBLOCK_ID' => $arResult['IBLOCK_ID'],
        'OFFERS_SELECTED' => $arResult['OFFERS_SELECTED'],
        'JS_OFFERS' => $arResult['JS_OFFERS']
    )
);
unset($currencyList, $templateLibrary);

$mainId = $this->GetEditAreaId($arResult['ID']);
$itemIds = array(
    'ID' => $mainId,
    'DISCOUNT_PERCENT_ID' => $mainId . '_dsc_pict',
    'STICKER_ID' => $mainId . '_sticker',
    'BIG_SLIDER_ID' => $mainId . '_big_slider',
    'BIG_IMG_CONT_ID' => $mainId . '_bigimg_cont',
    'SLIDER_CONT_ID' => $mainId . '_slider_cont',
    'OLD_PRICE_ID' => $mainId . '_old_price',
    'PRICE_ID' => $mainId . '_price',
    'DISCOUNT_PRICE_ID' => $mainId . '_price_discount',
    'PRICE_TOTAL' => $mainId . '_price_total',
    'SLIDER_CONT_OF_ID' => $mainId . '_slider_cont_',
    'QUANTITY_ID' => $mainId . '_quantity',
    'QUANTITY_DOWN_ID' => $mainId . '_quant_down',
    'QUANTITY_UP_ID' => $mainId . '_quant_up',
    'QUANTITY_MEASURE' => $mainId . '_quant_measure',
    'QUANTITY_LIMIT' => $mainId . '_quant_limit',
    'BUY_LINK' => $mainId . '_buy_link',
    'ADD_BASKET_LINK' => $mainId . '_add_basket_link',
    'BASKET_ACTIONS_ID' => $mainId . '_basket_actions',
    'NOT_AVAILABLE_MESS' => $mainId . '_not_avail',
    'COMPARE_LINK' => $mainId . '_compare_link',
    'TREE_ID' => $mainId . '_skudiv',
    'DISPLAY_PROP_DIV' => $mainId . '_sku_prop',
    'DESCRIPTION_ID' => $mainId . '_description',
    'DISPLAY_MAIN_PROP_DIV' => $mainId . '_main_sku_prop',
    'OFFER_GROUP' => $mainId . '_set_group_',
    'BASKET_PROP_DIV' => $mainId . '_basket_prop',
    'SUBSCRIBE_LINK' => $mainId . '_subscribe',
    'TABS_ID' => $mainId . '_tabs',
    'TAB_CONTAINERS_ID' => $mainId . '_tab_containers',
    'SMALL_CARD_PANEL_ID' => $mainId . '_small_card_panel',
    'TABS_PANEL_ID' => $mainId . '_tabs_panel'
);
$obName = $templateData['JS_OBJ'] = 'ob' . preg_replace('/[^a-zA-Z0-9_]/', 'x', $mainId);
$arParams['MESS_BTN_BUY'] = $arParams['MESS_BTN_BUY'] ?: Loc::getMessage('CT_BCE_CATALOG_BUY');
$arParams['MESS_BTN_ADD_TO_BASKET'] = $arParams['MESS_BTN_ADD_TO_BASKET'] ?: Loc::getMessage('CT_BCE_CATALOG_ADD');
$arParams['MESS_NOT_AVAILABLE'] = $arParams['MESS_NOT_AVAILABLE'] ?: Loc::getMessage('CT_BCE_CATALOG_NOT_AVAILABLE');
$arParams['MESS_BTN_COMPARE'] = $arParams['MESS_BTN_COMPARE'] ?: Loc::getMessage('CT_BCE_CATALOG_COMPARE');
$arParams['MESS_PRICE_RANGES_TITLE'] = $arParams['MESS_PRICE_RANGES_TITLE'] ?: Loc::getMessage('CT_BCE_CATALOG_PRICE_RANGES_TITLE');
$arParams['MESS_DESCRIPTION_TAB'] = $arParams['MESS_DESCRIPTION_TAB'] ?: Loc::getMessage('CT_BCE_CATALOG_DESCRIPTION_TAB');
$arParams['MESS_PROPERTIES_TAB'] = $arParams['MESS_PROPERTIES_TAB'] ?: Loc::getMessage('CT_BCE_CATALOG_PROPERTIES_TAB');
$arParams['MESS_COMMENTS_TAB'] = $arParams['MESS_COMMENTS_TAB'] ?: Loc::getMessage('CT_BCE_CATALOG_COMMENTS_TAB');
$arParams['MESS_SHOW_MAX_QUANTITY'] = $arParams['MESS_SHOW_MAX_QUANTITY'] ?: Loc::getMessage('CT_BCE_CATALOG_SHOW_MAX_QUANTITY');
$arParams['MESS_RELATIVE_QUANTITY_MANY'] = $arParams['MESS_RELATIVE_QUANTITY_MANY'] ?: Loc::getMessage('CT_BCE_CATALOG_RELATIVE_QUANTITY_MANY');
$arParams['MESS_RELATIVE_QUANTITY_FEW'] = $arParams['MESS_RELATIVE_QUANTITY_FEW'] ?: Loc::getMessage('CT_BCE_CATALOG_RELATIVE_QUANTITY_FEW');
?>
<div class="product_row" id="<?= $itemIds['ID'] ?>" itemscope itemtype="http://schema.org/Product">

    <div class="back_page">
        <a href="/sneakers">
            <svg class="icon">
                <use xlink:href="#exit"></use>
            </svg>
        </a>
        <span>Кроссовки</span>
    </div>

    <div class="product_row_container">
        <div class="product_row_images" id="<?= $itemIds['BIG_SLIDER_ID'] ?>">

            <div class="img_slider_wrapper">

                <div class="slider_view_img">
                    <div class="big-image"><img src="<?= $arResult['MORE_PHOTO']['0']['SRC'] ?>"
                            alt="<? echo $actualItem['NAME'] ?>"></div>
                </div>
                <div class="slider_bottom">
                    <button class="arrow prev">&#10094</button>
                    <div class="slider_bottom_img">
                        <ul class="ul">
                            <? if (count($arResult["MORE_PHOTO"]) > 0) {
                                foreach ($arResult["MORE_PHOTO"] as $PHOTO) {
                                    ?>
                                    <a href="<?= $PHOTO['SRC'] ?>">
                                        <li class="li"><img src="<?= $PHOTO['SRC'] ?>" alt="<? echo $actualItem['NAME'] ?>">
                                        </li>
                                    </a>
                                <? }
                            } ?>
                        </ul>
                    </div>
                    <button class="arrow next">&#10095</button>
                </div>

            </div>
            <div class="product_row_images_main" data-entity="images-container">
                <a href="<?= $arResult['DETAIL_PICTURE']['SRC'] ?>" data-fancybox="images"
                    data-caption="Купить <?= $arResult['NAME'] ?>">
                </a>
            </div>
        </div>

        <div class="product_row_content">
            <h1>
                <?= $arResult['NAME'] ?>
            </h1>
            <ul class="product_row_content_props">
                <? foreach ($arResult['DISPLAY_PROPERTIES'] as $PROPERTY) { ?>
                    <li>
                        <strong>
                            <?= $PROPERTY['NAME'] ?>:
                        </strong>
                        <? if (is_array($PROPERTY['VALUE'])) { ?>
                            <? echo implode(', ', $PROPERTY['VALUE']) ?>
                            <?
                        } else { ?>
                            <?= $PROPERTY['VALUE'] ?>
                            <?
                        } ?>
                    </li>
                    <?
                } ?>
            </ul>
            <div class="product_row_content_actions">
                <?
                foreach ($arParams['PRODUCT_PAY_BLOCK_ORDER'] as $blockName) {
                    switch ($blockName) {
                        case 'price':
                            ?>
                            <div class="product_row_content_price" id="<?= $itemIds['PRICE_ID'] ?>">
                                <?
                                foreach ($arResult['ITEM_PRICES'] as $ITEM_PRICE) {
                                    echo $ITEM_PRICE['PRINT_BASE_PRICE'];
                                }
                                ?>
                            </div>
                            <?php
                            break;

                        case 'buttons':
                            ?>
                            <div class="charact">
                                <div class="charact_name">
                                    <span>
                                        <?= $arResult["PROPERTIES"]["MATERIAL"]["NAME"] ?>
                                    </span>
                                    <span>
                                        <?= $arResult["PROPERTIES"]["MATERIAL_STELKI"]["NAME"] ?>
                                    </span>
                                    <span>
                                        <?= $arResult["PROPERTIES"]["MATERIAL_PODOSHVY"]["NAME"] ?>
                                    </span>
                                    <span>
                                        <?= $arResult["PROPERTIES"]["VID_SPORTA"]["NAME"] ?>
                                    </span>
                                    <span>
                                        <?= $arResult["PROPERTIES"]["SEZON"]["NAME"] ?>
                                    </span>
                                </div>
                                <div class="charact_value">
                                    <span>
                                        <?= $arResult["PROPERTIES"]["MATERIAL"]["VALUE"] ?>
                                    </span>
                                    <span>
                                        <?= $arResult["PROPERTIES"]["MATERIAL_STELKI"]["VALUE"] ?>
                                    </span>
                                    <span>
                                        <?= $arResult["PROPERTIES"]["MATERIAL_PODOSHVY"]["VALUE"] ?>
                                    </span>
                                    <span>
                                        <?= $arResult["PROPERTIES"]["VID_SPORTA"]["VALUE"] ?>
                                    </span>
                                    <span>
                                        <?= $arResult["PROPERTIES"]["SEZON"]["VALUE"] ?>
                                    </span>
                                </div>
                            </div>

                            <div id="<?= $itemIds['BASKET_ACTIONS_ID'] ?>">
                                <div class="product-item-detail-info-container">
                                    <a class="buy_btn" id="<?= $itemIds['BUY_LINK'] ?>" href="javascript:void(0);">
                                        <button>
                                            <?= $arParams['MESS_BTN_BUY'] ?>
                                        </button>
                                    </a>
                                </div>
                            </div>


                        </div>
                        <?php
                        break;
                    }
                }
                ?>
        </div>
    </div>


    <h1 class="sect_name">Описание</h1>
    <div class="content_main_page">
        <?= $arResult['DETAIL_TEXT'] ?>
    </div>
    <h1 class="sect_name">Характеристики</h1>

    <div class="full_charact">
        <div class="charact_right">
            <div class="charact_name">
                <span>
                    <?= $arResult["PROPERTIES"]["MATERIAL"]["NAME"] ?>
                </span>
                <span>
                    <?= $arResult["PROPERTIES"]["MATERIAL_STELKI"]["NAME"] ?>
                </span>
                <span>
                    <?= $arResult["PROPERTIES"]["MATERIAL_PODOSHVY"]["NAME"] ?>
                </span>
                <span>
                    <?= $arResult["PROPERTIES"]["VID_SPORTA"]["NAME"] ?>
                </span>
                <span>
                    <?= $arResult["PROPERTIES"]["SEZON"]["NAME"] ?>
                </span>
                <span>
                    <?= $arResult["PROPERTIES"]["POL"]["NAME"] ?>
                </span>
                <span>
                    <?= $arResult["PROPERTIES"]["AUDITORIYA"]["NAME"] ?>
                </span>
            </div>
            <div class="charact_value">
                <span>
                    <?= $arResult["PROPERTIES"]["MATERIAL"]["VALUE"] ?>
                </span>
                <span>
                    <?= $arResult["PROPERTIES"]["MATERIAL_STELKI"]["VALUE"] ?>
                </span>
                <span>
                    <?= $arResult["PROPERTIES"]["MATERIAL_PODOSHVY"]["VALUE"] ?>
                </span>
                <span>
                    <?= $arResult["PROPERTIES"]["VID_SPORTA"]["VALUE"] ?>
                </span>
                <span>
                    <?= $arResult["PROPERTIES"]["SEZON"]["VALUE"] ?>
                </span>
                <span>
                    <?= $arResult["PROPERTIES"]["POL"]["VALUE"] ?>
                </span>
                <span>
                    <?= $arResult["PROPERTIES"]["AUDITORIYA"]["VALUE"] ?>
                </span>
            </div>
        </div>
        <div class="charact_left">
            <div class="charact_name">
                <span>
                    <?= $arResult["PROPERTIES"]["BREND"]["NAME"] ?>
                </span>
                <span>
                    <?= $arResult["PROPERTIES"]["POSADKA"]["NAME"] ?>
                </span>
                <span>
                    <?= $arResult["PROPERTIES"]["MATERIAL_VERXA"]["NAME"] ?>
                </span>
                <span>
                    <?= $arResult["PROPERTIES"]["VNYTR_MATERIAL"]["NAME"] ?>
                </span>
                <span>
                    <?= $arResult["PROPERTIES"]["VID_KABLYKA"]["NAME"] ?>
                </span>
                <span>
                    <?= $arResult["PROPERTIES"]["VID_ZASTEJKI"]["NAME"] ?>
                </span>
                <span>
                    <?= $arResult["PROPERTIES"]["STRANA"]["NAME"] ?>
                </span>
            </div>
            <div class="charact_value">
                <span>
                    <?= $arResult["PROPERTIES"]["BREND"]["VALUE"] ?>
                </span>
                <span>
                    <?= $arResult["PROPERTIES"]["POSADKA"]["VALUE"] ?>
                </span>
                <span>
                    <?= $arResult["PROPERTIES"]["MATERIAL_VERXA"]["VALUE"] ?>
                </span>
                <span>
                    <?= $arResult["PROPERTIES"]["VNYTR_MATERIAL"]["VALUE"] ?>
                </span>
                <span>
                    <?= $arResult["PROPERTIES"]["VID_KABLYKA"]["VALUE"] ?>
                </span>
                <span>
                    <?= $arResult["PROPERTIES"]["VID_ZASTEJKI"]["VALUE"] ?>
                </span>
                <span>
                    <?= $arResult["PROPERTIES"]["STRANA"]["VALUE"] ?>
                </span>
            </div>
        </div>
    </div>
</div>



<div class="product_info"></div>


<meta itemprop="name" content="<?= $name ?>" />
<meta itemprop="category" content="<?= $arResult['CATEGORY_PATH'] ?>" />
<span itemprop="offers" itemscope itemtype="http://schema.org/Offer">
    <meta itemprop="price" content="<?= $price['RATIO_PRICE'] ?>" />
    <meta itemprop="priceCurrency" content="<?= $price['CURRENCY'] ?>" />
    <link itemprop="availability" href="http://schema.org/<?= ($actualItem['CAN_BUY'] ? 'InStock' : 'OutOfStock') ?>" />
</span>

<?php
$emptyProductProperties = empty($arResult['PRODUCT_PROPERTIES']);
$jsParams = array(
    'CONFIG' => array(
        'USE_CATALOG' => $arResult['CATALOG'],
        'SHOW_QUANTITY' => $arParams['USE_PRODUCT_QUANTITY'],
        'SHOW_PRICE' => !empty($arResult['ITEM_PRICES']),
        'SHOW_DISCOUNT_PERCENT' => $arParams['SHOW_DISCOUNT_PERCENT'] === 'Y',
        'SHOW_OLD_PRICE' => $arParams['SHOW_OLD_PRICE'] === 'Y',
        'USE_PRICE_COUNT' => $arParams['USE_PRICE_COUNT'],
        'DISPLAY_COMPARE' => $arParams['DISPLAY_COMPARE'],
        'MAIN_PICTURE_MODE' => $arParams['DETAIL_PICTURE_MODE'],
        'ADD_TO_BASKET_ACTION' => $arParams['ADD_TO_BASKET_ACTION'],
        'SHOW_CLOSE_POPUP' => $arParams['SHOW_CLOSE_POPUP'] === 'Y',
        'SHOW_MAX_QUANTITY' => $arParams['SHOW_MAX_QUANTITY'],
        'RELATIVE_QUANTITY_FACTOR' => $arParams['RELATIVE_QUANTITY_FACTOR'],
        'TEMPLATE_THEME' => $arParams['TEMPLATE_THEME'],
        'USE_STICKERS' => true,
        'USE_SUBSCRIBE' => $showSubscribe,
        'SHOW_SLIDER' => $arParams['SHOW_SLIDER'],
        'SLIDER_INTERVAL' => $arParams['SLIDER_INTERVAL'],
        'ALT' => $alt,
        'TITLE' => $title,
        'MAGNIFIER_ZOOM_PERCENT' => 200,
        'USE_ENHANCED_ECOMMERCE' => $arParams['USE_ENHANCED_ECOMMERCE'],
        'DATA_LAYER_NAME' => $arParams['DATA_LAYER_NAME'],
        'BRAND_PROPERTY' => !empty($arResult['DISPLAY_PROPERTIES'][$arParams['BRAND_PROPERTY']])
        ? $arResult['DISPLAY_PROPERTIES'][$arParams['BRAND_PROPERTY']]['DISPLAY_VALUE']
        : null
    ),
    'VISUAL' => $itemIds,
    'PRODUCT_TYPE' => $arResult['PRODUCT']['TYPE'],
    'PRODUCT' => array(
        'ID' => $arResult['ID'],
        'ACTIVE' => $arResult['ACTIVE'],
        'PICT' => reset($arResult['MORE_PHOTO']),
        'NAME' => $arResult['~NAME'],
        'SUBSCRIPTION' => true,
        'ITEM_PRICE_MODE' => $arResult['ITEM_PRICE_MODE'],
        'ITEM_PRICES' => $arResult['ITEM_PRICES'],
        'ITEM_PRICE_SELECTED' => $arResult['ITEM_PRICE_SELECTED'],
        'ITEM_QUANTITY_RANGES' => $arResult['ITEM_QUANTITY_RANGES'],
        'ITEM_QUANTITY_RANGE_SELECTED' => $arResult['ITEM_QUANTITY_RANGE_SELECTED'],
        'ITEM_MEASURE_RATIOS' => $arResult['ITEM_MEASURE_RATIOS'],
        'ITEM_MEASURE_RATIO_SELECTED' => $arResult['ITEM_MEASURE_RATIO_SELECTED'],
        'SLIDER_COUNT' => $arResult['MORE_PHOTO_COUNT'],
        'SLIDER' => $arResult['MORE_PHOTO'],
        'CAN_BUY' => $arResult['CAN_BUY'],
        'CHECK_QUANTITY' => $arResult['CHECK_QUANTITY'],
        'QUANTITY_FLOAT' => is_float($arResult['ITEM_MEASURE_RATIOS'][$arResult['ITEM_MEASURE_RATIO_SELECTED']]['RATIO']),
        'MAX_QUANTITY' => $arResult['PRODUCT']['QUANTITY'],
        'STEP_QUANTITY' => $arResult['ITEM_MEASURE_RATIOS'][$arResult['ITEM_MEASURE_RATIO_SELECTED']]['RATIO'],
        'CATEGORY' => $arResult['CATEGORY_PATH']
    ),
    'BASKET' => array(
        'ADD_PROPS' => $arParams['ADD_PROPERTIES_TO_BASKET'] === 'Y',
        'QUANTITY' => $arParams['PRODUCT_QUANTITY_VARIABLE'],
        'PROPS' => $arParams['PRODUCT_PROPS_VARIABLE'],
        'EMPTY_PROPS' => $emptyProductProperties,
        'BASKET_URL' => $arParams['BASKET_URL'],
        'ADD_URL_TEMPLATE' => $arResult['~ADD_URL_TEMPLATE'],
        'BUY_URL_TEMPLATE' => $arResult['~BUY_URL_TEMPLATE']
    )
);
unset($emptyProductProperties);
?>
<script src="galleria.min.js"></script>
<script>
    BX.message({
        ECONOMY_INFO_MESSAGE: '<?= GetMessageJS('CT_BCE_CATALOG_ECONOMY_INFO2') ?>',
        TITLE_ERROR: '<?= GetMessageJS('CT_BCE_CATALOG_TITLE_ERROR') ?>',
        TITLE_BASKET_PROPS: '<?= GetMessageJS('CT_BCE_CATALOG_TITLE_BASKET_PROPS') ?>',
        BASKET_UNKNOWN_ERROR: '<?= GetMessageJS('CT_BCE_CATALOG_BASKET_UNKNOWN_ERROR') ?>',
        BTN_SEND_PROPS: '<?= GetMessageJS('CT_BCE_CATALOG_BTN_SEND_PROPS') ?>',
        BTN_MESSAGE_BASKET_REDIRECT: '<?= GetMessageJS('CT_BCE_CATALOG_BTN_MESSAGE_BASKET_REDIRECT') ?>',
        BTN_MESSAGE_CLOSE: '<?= GetMessageJS('CT_BCE_CATALOG_BTN_MESSAGE_CLOSE') ?>',
        BTN_MESSAGE_CLOSE_POPUP: '<?= GetMessageJS('CT_BCE_CATALOG_BTN_MESSAGE_CLOSE_POPUP') ?>',
        TITLE_SUCCESSFUL: '<?= GetMessageJS('CT_BCE_CATALOG_ADD_TO_BASKET_OK') ?>',
        COMPARE_MESSAGE_OK: '<?= GetMessageJS('CT_BCE_CATALOG_MESS_COMPARE_OK') ?>',
        COMPARE_UNKNOWN_ERROR: '<?= GetMessageJS('CT_BCE_CATALOG_MESS_COMPARE_UNKNOWN_ERROR') ?>',
        COMPARE_TITLE: '<?= GetMessageJS('CT_BCE_CATALOG_MESS_COMPARE_TITLE') ?>',
        BTN_MESSAGE_COMPARE_REDIRECT: '<?= GetMessageJS('CT_BCE_CATALOG_BTN_MESSAGE_COMPARE_REDIRECT') ?>',
        PRODUCT_GIFT_LABEL: '<?= GetMessageJS('CT_BCE_CATALOG_PRODUCT_GIFT_LABEL') ?>',
        PRICE_TOTAL_PREFIX: '<?= GetMessageJS('CT_BCE_CATALOG_MESS_PRICE_TOTAL_PREFIX') ?>',
        RELATIVE_QUANTITY_MANY: '<?= CUtil::JSEscape($arParams['MESS_RELATIVE_QUANTITY_MANY']) ?>',
        RELATIVE_QUANTITY_FEW: '<?= CUtil::JSEscape($arParams['MESS_RELATIVE_QUANTITY_FEW']) ?>',
        SITE_ID: '<?= CUtil::JSEscape($component->getSiteId()) ?>'
    });

    var <?= $obName ?> = new JCCatalogElement(<?= CUtil::PhpToJSObject($jsParams, false, true) ?>);
</script>

<script>
    /* этот код помечает картинки, для удобства разработки */
    let slider_bottom = document.querySelectorAll('.slider_bottom');
    let i = 1;
    for (let li of document.querySelectorAll('.li')) {
        li.style.position = 'relative';
        li.insertAdjacentHTML('beforeend', `<span style="position:absolute;left:0;top:0">${i}</span>`);
        i++;
    }

    /* конфигурация */
    let width = 100; // ширина картинки
    let count = 3; // видимое количество изображений

    let list = document.querySelector('.ul');
    let listElems = document.querySelectorAll('.li');

    let position = 0; // положение ленты прокрутки

    document.querySelector('.prev').onclick = function () {
        // сдвиг влево
        position += width * count;
        // последнее передвижение влево может быть не на 3, а на 2 или 1 элемент
        position = Math.min(position, 0);
        list.style.marginLeft = position + 'px';
    };

    document.querySelector('.next').onclick = function () {
        // сдвиг вправо
        position -= width * count;
        // последнее передвижение вправо может быть не на 3, а на 2 или 1 элемент
        position = Math.max(position, -width * (listElems.length - count));
        list.style.marginLeft = position + 'px';
    };
</script>
<script>
    $(function () {
        $('.slider_bottom_img ul a').click(function () {                                   // При нажатиина миниатюру
            var images = $(this).find('img');
            var imgSrc = images.attr('src');

            $(".big-image img").attr({ src: imgSrc });                         // Подменяем адрес большого изображения на адрес выбранного
            $(this).siblings('a').removeClass('active');                       // Удаляем класс .active со ссылки чтоб убрать рамку
            images.parent().addClass('active');                                // Добавляем класс .active на выбранную миниатюру
            return false;
        });
    })
</script>
<?php
unset($actualItem, $itemIds, $jsParams);