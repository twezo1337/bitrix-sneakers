<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle('Главная');
?> 

<div class="main_page">
    <div class="main_page_container">
        <div class="brend_cards">
            <div class="brend_card">
                <img src="<?=SITE_TEMPLATE_PATH?>/img/puma.png" alt="">
                <h2>PUMA, <strong>Forever Faster</strong></h2>
                <a href="/sneakers"><button>Купить</button></a>
            </div>
            <div class="brend_card">
                <img src="<?=SITE_TEMPLATE_PATH?>/img/jordan.png" alt="">
                <h2>Jordan, <strong>Who Said Man Was Not Meant To Fly</strong></h2>
                <a href="/sneakers"><button>Купить</button></a>
            </div>
            <div class="brend_card">
                <img src="<?=SITE_TEMPLATE_PATH?>/img/adidas.png" alt="">
                <h2>Adidas, <strong>Impossible is Nothing</strong></h2>
                <a href="/sneakers"><button>Купить</button></a>
            </div>
            <div class="brend_card">
                <img src="<?=SITE_TEMPLATE_PATH?>/img/nike.png" alt="">
                <h2>Nike, <strong>Just Do It</strong></h2>
                <a href="/sneakers"><button>Купить</button></a>
            </div>
            <div class="brend_card">
                <img src="<?=SITE_TEMPLATE_PATH?>/img/Reebok.png" alt="">
                <h2>Reebok, <strong>All eyes on us</strong></h2>
                <a href="/sneakers"><button>Купить</button></a>
            </div>
            <div class="brend_card">
                <img src="<?=SITE_TEMPLATE_PATH?>/img/newBalance.png" alt="">
                <h2>New Balance, <strong>We Got Now</strong></h2>
                <a href="/sneakers"><button>Купить</button></a>
            </div>
            <div class="brend_card">
                <img src="<?=SITE_TEMPLATE_PATH?>/img/Vans.png" alt="">
                <h2>Vans, <strong>Where the beach meets the street</strong></h2>
                <a href="/sneakers"><button>Купить</button></a>
            </div>
        </div>
    </div>
</div>

<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>