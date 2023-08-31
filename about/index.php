<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("О нас");
?>


<div class="about_page">
    <div class="about_page_container">

    <h2>О компании</h2>
    <p>
        BITRIX SNEAKERS — это сеть мультибрендовых магазинов, где представлена обувь, одежда и аксессуары от мировых спортивных и лайфстайл брендов: Nike, Jordan, adidas Originals, Reebok Classic, New Balance, Asics, PUMA, Vans, Converse, Saucony, Dr. Martens, UGG, Timberland, The North Face, New Era и др.
        <br><br>
        В BITRIX SNEAKERS можно найти классические модели кроссовок, кед и ботинок, редкие культовые релизы, а также технологичные баскетбольные новинки. Регулярно коллекция в магазинах пополняется эксклюзивными для России моделями. В ассортименте BITRIX SNEAKERS всегда можно найти одежду, в том числе верхнюю, разнообразные аксессуары, а также средства для чистки и защиты обуви.
        Магазины BITRIX SNEAKERS созданы для людей, которые живут в ритме своего города, следят за последними мировыми трендами, всегда находят для себя занятие по душе и не представляют жизни без удобной обуви и одежды.
        <br><br>
        При желании покупатели могут оформить карту постоянного клиента, чтобы пользоваться бонусами, скидками и другими привилегиями, в частности в числе первых получать информацию о новинках, распродажах и специальных предложениях.
    </p>

    <h2>INVENTIVE RETAIL GROUP</h2>
    <p>
        BITRIX SNEAKERS входит в группу компаний Inventive Retail Group.<br>
        Группа компаний Inventive Retail Group — это группа компаний‚ объединяющая сети специализированных магазинов, реализующих продукцию ведущих производителей цифровой электроники, детских и спортивных товаров. Сегодня ядро компании Inventive Retail Group составляют знаменитые во всем мире бренды: Apple‚ Samsung, LEGO, Xiaomi, The North Face, UNOde50. Входит в группу компаний Ланит.
    </p>

    <h2>Связаться с нами</h2>

    <?$APPLICATION->IncludeComponent(
	"bitrix:main.feedback",
	"feedback_form",
    Array()
    );?>

    <h2>Как нас найти</h2>

    <?$APPLICATION->IncludeComponent(
	"bitrix:map.yandex.view",
	"",
    Array()
    );?>

    </div>
</div>




<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>