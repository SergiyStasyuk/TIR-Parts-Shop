<?php use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\models\Cart;
use yii\helpers\Url;

AppAsset::register($this);
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <link rel="icon" type="image/png" sizes="32x32"
          href="/web/favicons/favicon-32x32.png">
    <?php $this->head() ?>
</head>

<body class="">
<?php $this->beginBody() ?>
<div class="page-wrapper">
    <header class="page-header">
        <div class="page-header__above">
            <div class="page-size">
                <div class="_flex _justify-between _items-center _grid-space-3">
                    <div class="_col-auto">
                        <ul class="site-menu">
                            <li class="site-menu__item">
                                <a href="<?= Url::to(['site/about']) ?>"
                                   class="site-menu__link">Про компанію </a>
                            </li>
                            <li class="site-menu__item">
                                <a href="<?= Url::to(['product-category/']) ?>"
                                   class="site-menu__link">Каталог </a>
                            </li>
                            <li class="site-menu__item">
                                <a href="<?= Url::to(['site/dostavka']) ?>"
                                   class="site-menu__link">Доставка та оплата </a>
                            </li>
                            <li class="site-menu__item">
                                <a href="<?= Url::to(['site/garanty']) ?>"
                                   class="site-menu__link">Гарантії та повернення </a>
                            </li>
                            <li class="site-menu__item">
                                <a href="<?= Url::to(['site/vacancy']) ?>"
                                   class="site-menu__link">Вакансії </a>
                            </li>
                            <li class="site-menu__item">
                                <a href="<?= Url::to(['site/contact']) ?>"
                                   class="site-menu__link">Контакти </a>
                            </li>
                        </ul>
                    </div>
                    <div class="_col-auto">
                        <?php if (Yii::$app->user->isGuest): ?>
                            <a href="<?= Url::toRoute(['site/login']) ?>" class="account-link">
                                <svg id="user" viewBox="0 0 612 612">
                                    <g>
                                        <path d="M306.001,325.988c90.563-0.005,123.147-90.682,131.679-165.167C448.188,69.06,404.799,0,306.001,0    c-98.782,0-142.195,69.055-131.679,160.82C182.862,235.304,215.436,325.995,306.001,325.988z"></path>
                                        <path d="M550.981,541.908c-0.99-28.904-4.377-57.939-9.421-86.393c-6.111-34.469-13.889-85.002-43.983-107.465    c-17.404-12.988-39.941-17.249-59.865-25.081c-9.697-3.81-18.384-7.594-26.537-11.901c-27.518,30.176-63.4,45.962-105.186,45.964    c-41.774,0-77.652-15.786-105.167-45.964c-8.153,4.308-16.84,8.093-26.537,11.901c-19.924,7.832-42.461,12.092-59.863,25.081    c-30.096,22.463-37.873,72.996-43.983,107.465c-5.045,28.454-8.433,57.489-9.422,86.393    c-0.766,22.387,10.288,25.525,29.017,32.284c23.453,8.458,47.666,14.737,72.041,19.884c47.077,9.941,95.603,17.582,143.921,17.924    c48.318-0.343,96.844-7.983,143.921-17.924c24.375-5.145,48.59-11.424,72.041-19.884    C540.694,567.435,551.747,564.297,550.981,541.908z"></path>
                                    </g>
                                </svg>
                                </i><span>Авторизація/Реєстрація</span></a>
                        <?php else: ?>
                            <?= Html::beginForm(['/site/logout'], 'post') ?>
                            <div class="_col-auto">
                                <a href="#" class="account-link"><span><input type="submit" class="input-account"
                                                                              value="Вийти (<?= Yii::$app->user->identity->username ?>)"></span>

                                </a>
                            </div>
                            <?php Html::endForm() ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-header__middle">
            <div class="page-size">
                <div class="_flex _grid-space-3 _flex-nowrap _items-center _justify-between">
                    <div class="_col-auto _flex-shrink-0">
                                            <span class="logo">
                            <a href="<?= Url::home(); ?>"><img src="/web/pic/logo.png" alt=""></a>
                        </span>
                    </div>
                    <div class="_col-auto _flex-grow-1 _lg-show">
                        <div class="title title--sm _mb-2">Автозапчастини для вантажних автомобілів по всій Україні
                        </div>
                        <span class="my_scroll">
                                <div class="search-form" data-vue="true">
                                    <?= Html::beginForm(['/product/search'], 'post') ?>
                                        <span class="form-element">
                                            <input type="text" name="search[text]" placeholder="Пошук"
                                                   class="form-element__input form-element__input--round">
                                            <span class="search-form__icon">
                                                <svg id="find" viewBox="0 0 30.239 30.239">
                                                    <?= Html::submitButton('') ?>
<g>
	<path d="M20.194,3.46c-4.613-4.613-12.121-4.613-16.734,0c-4.612,4.614-4.612,12.121,0,16.735   c4.108,4.107,10.506,4.547,15.116,1.34c0.097,0.459,0.319,0.897,0.676,1.254l6.718,6.718c0.979,0.977,2.561,0.977,3.535,0   c0.978-0.978,0.978-2.56,0-3.535l-6.718-6.72c-0.355-0.354-0.794-0.577-1.253-0.674C24.743,13.967,24.303,7.57,20.194,3.46z    M18.073,18.074c-3.444,3.444-9.049,3.444-12.492,0c-3.442-3.444-3.442-9.048,0-12.492c3.443-3.443,9.048-3.443,12.492,0   C21.517,9.026,21.517,14.63,18.073,18.074z"></path>
</g>
</svg>
                                            </span>
                                        </span>
                                    <?= Html::endForm() ?>

                                </div>
                            </span>
                    </div>
                    <div class="_col-auto _xl-show">
                        <div class="_flex _flex-nowrap">
                            <div class="header-contact">
                                <div class="header-contact__title">м. Київ, вул. Лесі Курбаса, 9-Б</div>
                                <div class="header-contact__phone">
                                    <a href="#">+38 097 123 45 67</a>
                                </div>
                                <div class="header-contact__phone">
                                    <a href="#">+38 066 123 45 67</a>
                                </div>
                            </div>
                            <div class="header-contact">
                                <div class="header-contact__title">Прийом заявок:</div>
                                <div class="header-contact__data">Пн-Пт: з 09:30 до 17:30;</div>
                                <div class="header-contact__data">Сб: з 09:30 до 14:30. Нд: вихідний</div>
                                <div class="header-contact__data">saless@tirrrmarket.com.ua</div>
                            </div>
                        </div>
                    </div>
                    <div class="_col-auto _flex-shrink-0">

                        <div class="_flex _items-center search">
                            <!--                        <button class="header-icon__image page-header__search-button js-search-show">-->
                            <svg id="find" viewBox="0 0 30.239 30.239">
                                <g>
                                    <path d="M20.194,3.46c-4.613-4.613-12.121-4.613-16.734,0c-4.612,4.614-4.612,12.121,0,16.735   c4.108,4.107,10.506,4.547,15.116,1.34c0.097,0.459,0.319,0.897,0.676,1.254l6.718,6.718c0.979,0.977,2.561,0.977,3.535,0   c0.978-0.978,0.978-2.56,0-3.535l-6.718-6.72c-0.355-0.354-0.794-0.577-1.253-0.674C24.743,13.967,24.303,7.57,20.194,3.46z    M18.073,18.074c-3.444,3.444-9.049,3.444-12.492,0c-3.442-3.444-3.442-9.048,0-12.492c3.443-3.443,9.048-3.443,12.492,0   C21.517,9.026,21.517,14.63,18.073,18.074z"></path>
                                </g>
                            </svg>
                            </button>
                            <span class="js-search _lg-hide page-header__search">
                                <search-form data-vue="true" data-placeholder="Пошук"
                                             data-lang="ua"></search-form>
                            </span>
                            </span>
                            <a href="<?= Url::to(['/cart/index']) ?>" class="header-icon">
                                <span class="header-icon__caption">Кошик</span>
                                <span class="header-icon__image">
                                <svg id="cart" viewBox="0 0 50.613 50.613">
	<g>
		<path d="M49.569,11.145H20.055c-0.961,0-1.508,0.743-1.223,1.661l4.669,13.677c0.23,0.738,1.044,1.336,1.817,1.336h19.35    c0.773,0,1.586-0.598,1.814-1.336l4.069-14C50.783,11.744,50.344,11.145,49.569,11.145z"></path>
		<circle cx="22.724" cy="43.575" r="4.415"></circle>
		<circle cx="41.406" cy="43.63" r="4.415"></circle>
		<path d="M46.707,32.312H20.886L10.549,2.568H2.5c-1.381,0-2.5,1.119-2.5,2.5s1.119,2.5,2.5,2.5h4.493L17.33,37.312h29.377    c1.381,0,2.5-1.119,2.5-2.5S48.088,32.312,46.707,32.312z"></path>
	</g>
</svg>
                                <span class="header-icon__count" data-cart-count><?= Cart::countProducts() ?></span>
                            </span>
                            </a>
                            <div class="hamburger hamburger--spin _lg-hide" data-navbar-trigger>
                                <div class="hamburger-box">
                                    <div class="hamburger-inner">
                                        <div class="hamburger-inner__top"></div>
                                        <div class="hamburger-inner__bottom"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-header__below">
            <div class="page-size">
                <ul class="catalog-menu" data-menu data-menu-tip="Усі категорії">
                    <li class="catalog-menu__item">
                        <a href="/product-category/5"
                           class="catalog-menu__link">ГАЛЬМ. ДИСКИ, БАРАБАНИ</a>
                    </li>
                    <li class="catalog-menu__item">
                        <a href="/product-category/5"
                           class="catalog-menu__link">КОЛОДКИ ТА НАКЛАДКИ</a>
                    </li>
                    <li class="catalog-menu__item">
                        <a href="/product-category/14"
                           class="catalog-menu__link">ПНЕВМАТИЧНІ КРАНИ</a>
                    </li>
                    <li class="catalog-menu__item">
                        <a href="/product-category/5"
                           class="catalog-menu__link">СУПОРТА ТА РМК.</a>
                    </li>
                    <li class="catalog-menu__item">
                        <a href="/product-category/3"
                           class="catalog-menu__link">АКУМУЛЯТОРИ ТА ЕЛЕМЕНТИ</a>
                    </li>
                    <li class="catalog-menu__item">
                        <a href="/product-category/15"
                           class="catalog-menu__link">ЗЧЕПЛЕННЯ</a>
                    </li>
                </ul>
            </div>
        </div>
    </header>

    <header class="page-header page-header--fixed">
        <div class="page-header__below" style="display: block !important;">
            <div class="page-size">

                <div class="_flex _items-center _justify-between">
                    <div class="_col-auto">
                        <ul class="catalog-menu" style="overflow: visible;">
                            <div class="catalog-menu__item" data-dropdown>
                                <a href="#" class="catalog-menu__link" data-dropdown-trigger>Каталог</a>

                                <ul class="dropdown-menu dropdown-menu--fixed">
                                    <li class="catalog-menu__item">
                                        <a href="#"
                                           class="catalog-menu__link">ГАЛЬМ. ДИСКИ, БАРАБАНИ</a>
                                    </li>
                                    <li class="catalog-menu__item">
                                        <a href="#"
                                           class="catalog-menu__link">КОЛОДКИ ТА НАКЛАДКИ</a>
                                    </li>
                                    <li class="catalog-menu__item">
                                        <a href="#"
                                           class="catalog-menu__link">ПНЕВМАТИЧНІ КРАНИ</a>
                                    </li>
                                    <li class="catalog-menu__item">
                                        <a href="#"
                                           class="catalog-menu__link">СУПОРТА ТА РМК.</a>
                                    </li>
                                    <li class="catalog-menu__item">
                                        <a href="#"
                                           class="catalog-menu__link">РАДІАТОРИ ТА ЕЛЕМЕНТИ</a>
                                    </li>
                                    <li class="catalog-menu__item">
                                        <a href="#"
                                           class="catalog-menu__link">ЗЧЕПЛЕННЯ</a>
                                    </li>
                                </ul>
                            </div>
                        </ul>
                    </div>

                    <div class="_col-auto">
                        <div class="_flex _items-center">
                            <a href="<?= Url::to(['/cart/index']) ?>"
                               class="header-icon header-icon--light">
                                <span class="header-icon__image">
                                    <svg id="star" viewBox="0 0 512.001 512.001">
	<g>
		<path d="M510.992,196.91c-2.428-7.487-8.894-12.947-16.683-14.086l-151.857-22.196L274.547,23.059    c-3.484-7.059-10.674-11.528-18.546-11.528c-7.872,0-15.061,4.469-18.546,11.528L169.55,160.628L17.692,182.824    c-7.788,1.139-14.255,6.599-16.683,14.086c-2.428,7.487-0.395,15.703,5.243,21.195l109.867,107.009L90.19,476.291    c-1.331,7.761,1.86,15.603,8.229,20.23c6.369,4.626,14.813,5.236,21.782,1.572L256,426.677l135.799,71.415    c3.027,1.592,6.331,2.377,9.625,2.377c4.287,0,8.554-1.332,12.157-3.949c6.37-4.627,9.56-12.47,8.229-20.23l-25.928-151.177    l109.867-107.009C511.387,212.613,513.42,204.398,510.992,196.91z M359.229,303.073c-4.878,4.751-7.105,11.6-5.954,18.313    l20.682,120.588l-108.331-56.97c-3.014-1.585-6.32-2.377-9.627-2.377c-3.306,0-6.614,0.792-9.627,2.376l-108.33,56.97    l20.682-120.588c1.151-6.712-1.075-13.561-5.954-18.313l-87.656-85.376l121.163-17.709c6.729-0.984,12.544-5.213,15.554-11.311    L256,78.94l54.166,109.736c3.01,6.099,8.826,10.327,15.555,11.311l121.164,17.71L359.229,303.073z"></path>
	</g>
</svg>
                                </span>
                            </a>
                            <a href="<?= Url::to(['/cart/index']) ?>" class="header-icon header-icon--light">
                            <span class="header-icon__image">
                                <svg id="cart" viewBox="0 0 50.613 50.613">
	<g>
		<path d="M49.569,11.145H20.055c-0.961,0-1.508,0.743-1.223,1.661l4.669,13.677c0.23,0.738,1.044,1.336,1.817,1.336h19.35    c0.773,0,1.586-0.598,1.814-1.336l4.069-14C50.783,11.744,50.344,11.145,49.569,11.145z"></path>
		<circle cx="22.724" cy="43.575" r="4.415"></circle>
		<circle cx="41.406" cy="43.63" r="4.415"></circle>
		<path d="M46.707,32.312H20.886L10.549,2.568H2.5c-1.381,0-2.5,1.119-2.5,2.5s1.119,2.5,2.5,2.5h4.493L17.33,37.312h29.377    c1.381,0,2.5-1.119,2.5-2.5S48.088,32.312,46.707,32.312z"></path>
	</g>
</svg>
                                <span class="header-icon__count" data-cart-count>0</span>
                            </span>
                            </a>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </header>

    <?= Breadcrumbs::widget([
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>

    <?= $content; ?>

    <footer class="page-footer">
        <div class="page-size">
            <div class="_flex _md-flex-nowrap _justify-between _grid-space-4">
                <div class="_col-12 _md-col-auto _flex-shrink-0 _flex _flex-column _mb-3 _md-mb-0">
                    <div class="footer-logo">
                        <a href="<?= Url::home(); ?>"><img src="/web/pic/logo.png" alt=""></a>
                    </div>
                    <div class="copyright _flex-grow-1">
                        <div>© 2015 - 2019 Tirmarket.com.ua</div>
                        <div>Продаж автозапчастин для вантажівок.</div>
                    </div>
                    <div class="_col-auto">
                        <a href="#">Карта сайту</a>
                    </div>
                </div>
                <div class="_col-auto _flex-shrink-0 _md-show">
                    <ul class="footer-menu">
                        <li class="footer-menu__item">
                            <a href="<?= Url::home() ?>"
                               class="footer-menu__link">Головна</a>
                        </li>
                        <li class="footer-menu__item">
                            <a href="<?= Url::to(['product-category/index']) ?>"
                               class="footer-menu__link">Каталог</a>
                        </li>
                        <li class="footer-menu__item">
                            <a href="<?= Url::to(['site/about']) ?>"
                               class="footer-menu__link">Про компанію</a>
                        </li>
                        <li class="footer-menu__item">
                            <a href="<?= Url::to(['news/']) ?>"
                               class="footer-menu__link">Новини</a>
                        </li>
                    </ul>
                </div>
                <div class="_col-auto _flex-shrink-0 _md-show">
                    <ul class="footer-menu">
                        <li class="footer-menu__item">
                            <a href="<?= Url::to(['site/dostavka']) ?>"
                               class="footer-menu__link">Доставка та оплата</a>
                        </li>
                        <li class="footer-menu__item">
                            <a href="<?= Url::to(['site/garanty']) ?>"
                               class="footer-menu__link">Гарантія та повернення</a>
                        </li>
                        <li class="footer-menu__item">
                            <a href="<?= Url::to(['brand/index']) ?>"
                               class="footer-menu__link">Наші партнери</a>
                        </li>
                        <li class="footer-menu__item">
                            <a href="<?= Url::to(['site/contact']) ?>"
                               class="footer-menu__link">Контакти</a>
                        </li>
                    </ul>
                </div>
                <div class="_col-auto _flex _xl-show">
                    <div class="_flex-column">
                        <div class="_flex-grow-1">
                            <div class="_flex _justify-between _mb-3">
                                <div class="_col-auto">
                                    <div class="footer-phone">
                                        <a href="tel:380976613433">+38 097 123 45 67</a>
                                    </div>
                                    <div class="footer-phone">
                                        <a href="tel:380668331929">+38 066 123 45 67</a>
                                    </div>
                                    <div class="footer-phone">
                                        <a href="tel:380503776552">+38 050 123 45 67</a>
                                    </div>
                                </div>
                                <div class="_col-auto">
                                    <div>Пн-Пт: з 09:30 до 17:30;</div>
                                    <div>Сб: з 09:30 до 14:30. Нд: вихідний</div>
                                    <div>saless@tirrrmarket.com.ua</div>
                                </div>
                                <div class="_col-auto">
                                    <a href="https://www.work.ua/" target="_blank"><img
                                                src="https://st.work.ua/i/press_kit/88x31b.gif" width="88" height="31"
                                                alt="Work.ua — сайт пошуку роботи №1 в Україні" border="0"></a>
                                </div>
                            </div>
                        </div>
                        <div class="_col-auto">Гарантія надається на виробничий / заводський брак або пошкодження, які
                            виникли не з вини покупця.
                            При отриманні товару покупцем, товар необхідно оглянути на збереження товарного вигляду,
                            цілісності упаковки, на наявність дефектів, які могли виникнути при транспортуванні
                            кур'єрською
                            службою
                        </div>
                    </div>
                </div>

                <div class="_col-12 _md-col-auto _flex-shrink-0 _flex _flex-column _md-ml-4">
                    <div class="_col-auto _flex-grow-1">
                        <p> Наш партнер: <a href="https://www.work.ua/" target="_blank">Work.ua</a></p>
                        <div class="_mb-2">Ми в соціальних мережах:</div>
                        <div class="social _mb-3">
                            <a href="https://www.facebook.com" class="social__item social__item--fb">
                                <svg id="facebook" viewBox="0 0 10 17">
                                    <path d="M9.161,0.501 L7.002,0.498 C4.577,0.498 3.010,2.043 3.010,4.435 L3.010,6.251 L0.839,6.251 C0.652,6.251 0.500,6.397 0.500,6.577 L0.500,9.208 C0.500,9.388 0.652,9.534 0.839,9.534 L3.010,9.534 L3.010,16.171 C3.010,16.352 3.161,16.498 3.349,16.498 L6.181,16.498 C6.368,16.498 6.520,16.352 6.520,16.171 L6.520,9.534 L9.058,9.534 C9.245,9.534 9.397,9.388 9.397,9.208 L9.398,6.577 C9.398,6.490 9.362,6.408 9.299,6.346 C9.235,6.284 9.149,6.251 9.059,6.251 L6.520,6.251 L6.520,4.711 C6.520,3.973 6.704,3.597 7.706,3.597 L9.160,3.596 C9.348,3.596 9.500,3.450 9.500,3.270 L9.500,0.827 C9.500,0.648 9.348,0.501 9.161,0.501 Z"></path>
                                </svg>
                            </a>
                            <a href="http://youtube.com/" class="social__item social__item--youtube">
                                <svg id="youtube" viewBox="0 0 17 12">
                                    <path d="M15.876,1.441 C15.299,0.771 14.232,0.498 12.196,0.498 L4.804,0.498 C2.721,0.498 1.636,0.790 1.061,1.503 C0.500,2.199 0.500,3.225 0.500,4.645 L0.500,7.350 C0.500,10.101 1.165,11.498 4.804,11.498 L12.196,11.498 C13.962,11.498 14.940,11.256 15.574,10.664 C16.223,10.057 16.500,9.066 16.500,7.350 L16.500,4.645 C16.500,3.147 16.456,2.117 15.876,1.441 ZM10.772,6.372 L7.415,8.086 C7.340,8.124 7.258,8.142 7.176,8.142 C7.083,8.142 6.991,8.117 6.909,8.070 C6.754,7.978 6.660,7.814 6.660,7.638 L6.660,4.222 C6.660,4.044 6.754,3.882 6.908,3.791 C7.062,3.699 7.254,3.693 7.414,3.775 L10.771,5.477 C10.941,5.565 11.049,5.736 11.049,5.923 C11.049,6.111 10.942,6.284 10.772,6.372 Z"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div class="_col-auto">

                        <div class="_mb-2">Розробка сайту</div>
                        <a href="#" class="develop-link">
                            <i>
                            </i><span>Sergiy Stasyuk</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
