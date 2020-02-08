<?php

use pendalf89\filemanager\models\Mediafile;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ListView;

?>
<main class="page-main">
    <div class="page-size">
        <?php $this->params['breadcrumbs'][] =
            [
                'url' => Url::to('/product-category/index'),
                'label' => 'Каталог',
            ];
        $this->params['breadcrumbs'][] =
            [
                'url' => Url::to('/product-category/' . $model->category->id),
                'label' => $model->category->name,
            ];
        $this->params['breadcrumbs'][] = ['label' => $model->name];
        ?>

        <div class="_flex _grid-space-3">
            <div class="_col-12 _lg-col-7 _xl-col-4 _flex-grow-0 _mb-3">
                <div class="product-gallery" style="margin-left: 80px;">
                    <div class="product-labels _mt-3">
                    </div>
                    <div class="product-thumbs" data-slider="product-thumb">
                        <div class="product-thumbs__item">

                            <?= Html::img("{$model->image}", ['alt' => $model->name]); ?>
                        </div>
                    </div>
                    <div class="product-image" data-slider="product">
                        <div class="product-image__item">
                            <?= Html::a(Html::img("{$model->image}"), ["{$model->image}"], ['data-fancybox' => 'gallery']) ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="_col-12 _lg-col-5 _xl-col-5 _flex-grow-0 _flex-shrink-0 _mb-3">
                <h1 class="title _mb-3 _mt-0"><?= $model->name ?></h1>
                <div class="product-meta _mb-4">
                    <div class="_flex">
                        <div class="_col-6">
                            <?php if ($model->in_stock): ?>
                                <span class="product-exist product-exist--true">В наявності</span>
                            <?php else: ?>
                                <div class="product-exist product-exist--false">Нема в наявності</div>
                            <?php endif; ?>
                        </div>
                        <div class="_col-6">
                            <div class="product-code">Артикул: <?= $model->article ?></div>
                        </div>
                    </div>
                    <div class="divider _mt-2 _mb-2"></div>
                    <div class="_flex _items-center">
                        <div class="_col-6">
                            <div class="product-maker">Виробник:
                                <a href="#"><?= $model->brand->name; ?></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product-handler">
                    <div class="_pl-3 _pr-3 _pt-3 _pb-2">
                        <div class="_flex _justify-between _grid-space-3 _items-end">
                            <div class="_col-auto _mb-2">
                                <div class="product-price"><?= $model->price ?> грн.</div>
                            </div>

                            <div class="_col-auto _mb-2">
                                <?= Html::beginForm(['/cart/manyadd/' . $model->id], 'post') ?>
                                <div class="product-counter" data-counter data-binding="product">
                                    <input type="text" value="1" readonly="readonly" class="product-counter__field" name="cart[multiple]" data-counter-value>
                                    <div class="product-counter__increment" data-counter-trigger="increment"></div>
                                    <div class="product-counter__decrement" data-counter-trigger="decrement"></div>
                                </div>
                                <?= Html::endForm() ?>

                            </div>
                            <div class="_col-auto _mb-2">
                                <div class="_flex _flex-column">
                                    <a href="<?= Url::to(['/cart/add/' . $model->id]) ?>" class="button">

                                    <span>
                                        <i>
                                            <svg id="cart" viewBox="0 0 50.613 50.613">
	<g>
		<path d="M49.569,11.145H20.055c-0.961,0-1.508,0.743-1.223,1.661l4.669,13.677c0.23,0.738,1.044,1.336,1.817,1.336h19.35    c0.773,0,1.586-0.598,1.814-1.336l4.069-14C50.783,11.744,50.344,11.145,49.569,11.145z"></path>
		<circle cx="22.724" cy="43.575" r="4.415"></circle>
		<circle cx="41.406" cy="43.63" r="4.415"></circle>
		<path d="M46.707,32.312H20.886L10.549,2.568H2.5c-1.381,0-2.5,1.119-2.5,2.5s1.119,2.5,2.5,2.5h4.493L17.33,37.312h29.377    c1.381,0,2.5-1.119,2.5-2.5S48.088,32.312,46.707,32.312z"></path>
	</g>
</svg>
                                        </i>
                                        <span>До кошику</span>
                                    </span>
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="divider divider--white"></div>
                </div>
            </div>
            <div class="_col-12 _xl-col-3 _flex-grow-0 _mb-3">
                <div class="_p-4" style="background-color: #f8f8f8">
                    <div class="_flex _items-center _mb-2 _justify-between"><i
                                class="icon icon--md icon--grey _mr-3">
                            <svg id="delivery" viewBox="0 0 31.5 36">
                                <path class="st0"
                                      d="M31.5,9.5c0,0,0-0.1,0-0.1c0-0.1-0.1-0.3-0.1-0.4c0,0,0,0,0,0c0,0,0,0,0,0c-0.1-0.1-0.2-0.2-0.3-0.3  c0,0-0.1,0-0.1-0.1c0,0-0.1,0-0.1-0.1l-7.2-4.2c-0.2-0.2-0.3-0.3-0.6-0.3l-6.7-3.9c-0.4-0.2-0.9-0.2-1.3,0L0.6,8.5  c0,0-0.1,0-0.1,0.1c0,0-0.1,0-0.1,0.1C0.2,8.9,0.1,9.1,0,9.4c0,0,0,0.1,0,0.1c0,0,0,0.1,0,0.1v16.7c0,0.4,0.2,0.9,0.6,1.1l14.5,8.4  c0,0,0.1,0,0.1,0c0,0,0.1,0,0.1,0c0.1,0.1,0.3,0.1,0.4,0.1s0.3,0,0.4-0.1c0,0,0.1,0,0.1,0c0,0,0.1,0,0.1,0l14.5-8.4  c0.4-0.2,0.6-0.6,0.6-1.1L31.5,9.5C31.5,9.6,31.5,9.6,31.5,9.5z M15.8,16.6l-5-2.9l12-6.9l5,2.9L15.8,16.6z M15.8,2.7l4.5,2.6  l-12,6.9L3.7,9.6L15.8,2.7z M2.5,11.8l4.6,2.6v13.9l-4.6-2.6V11.8z M17,32.6v-8.2c0-0.7-0.6-1.3-1.3-1.3s-1.3,0.6-1.3,1.3v8.2  l-4.9-2.8V15.9l4.9,2.8v1.8c0,0.7,0.6,1.3,1.3,1.3s1.3-0.6,1.3-1.3v-1.8l12-6.9v13.9L17,32.6z"></path>
                            </svg>
                        </i>
                        <div class="title title--ms">Доставка</div>
                        <i class="icon icon--rotate icon--sm icon--grey icon-collapser _ml-3">
                            <svg id="d-arrows" viewBox="0 0 220.682 220.682">
                                <g>
                                    <polygon
                                            points="92.695,38.924 164.113,110.341 92.695,181.758 120.979,210.043 220.682,110.341 120.979,10.639  "></polygon>
                                    <polygon
                                            points="28.284,210.043 127.986,110.341 28.284,10.639 0,38.924 71.417,110.341 0,181.758  "></polygon>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                            </svg>
                        </i>
                    </div>
                    <div class="wysiwyg _mb-3 _hide">
                        <ul>
                            <li>Доставка &ldquo;Новою поштою&rdquo;, &ldquo;Інтайм&rdquo;, "Delivery", "Гюнсел",
                                "Автолюкс", "САТ"
                            </li>
                            <li>Самовивіз у містах: Київ, Луцьк, Житомир, Ковель</li>
                        </ul>
                    </div>
                    <div class="_flex _items-center _mb-2 _justify-between"><i
                                class="icon icon--md icon--grey _mr-3">
                            <svg id="payment" viewBox="0 0 35.3 26.3">
                                <g>
                                    <path class="st0"
                                          d="M29.1,0H6.2C2.8,0,0,2.8,0,6.2v13.9c0,3.4,2.8,6.2,6.2,6.2h22.9c3.4,0,6.2-2.8,6.2-6.2V6.2   C35.3,2.7,32.5,0,29.1,0z M6.3,2.5h22.9c2,0,3.5,1.5,3.6,3.5H2.7C2.7,4,4.3,2.5,6.3,2.5z M32.8,20c0,2-1.6,3.7-3.7,3.7H6.2   c-2,0-3.7-1.6-3.7-3.7v-7.1h30.2L32.8,20L32.8,20z M32.8,10.5H2.6v-2h30.2V10.5z"></path>
                                    <path class="st0"
                                          d="M5.7,18.5h3.5c0.7,0,1.3-0.6,1.3-1.3s-0.6-1.3-1.3-1.3H5.7c-0.7,0-1.3,0.6-1.3,1.3S5,18.5,5.7,18.5z"></path>
                                    <path class="st0"
                                          d="M12.7,18.5H17c0.7,0,1.3-0.6,1.3-1.3s-0.6-1.3-1.3-1.3h-4.3c-0.7,0-1.3,0.6-1.3,1.3S12,18.5,12.7,18.5z"></path>
                                    <circle class="st0" cx="28.4" cy="17.2" r="1.9"></circle>
                                </g>
                            </svg>
                        </i>
                        <div class="title title--ms">Оплата</div>
                        <i class="icon icon--rotate icon--sm icon--grey icon-collapser _ml-3">
                            <svg id="d-arrows" viewBox="0 0 220.682 220.682">
                                <g>
                                    <polygon
                                            points="92.695,38.924 164.113,110.341 92.695,181.758 120.979,210.043 220.682,110.341 120.979,10.639  "></polygon>
                                    <polygon
                                            points="28.284,210.043 127.986,110.341 28.284,10.639 0,38.924 71.417,110.341 0,181.758  "></polygon>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                            </svg>
                        </i>
                    </div>
                    <div class="wysiwyg _mb-3 _hide">
                        <ul>
                            <li>Накладеним платежем</li>
                            <li>Готівкою при отриманні у відділенні</li>
                        </ul>
                    </div>
                    <div class="_flex _items-center _mb-2 _justify-between"><i
                                class="icon icon--md icon--grey _mr-3">
                            <svg id="warranty" viewBox="0 0 26.2 32.4">

                                <g>
                                    <path class="st0"
                                          d="M24.9,32.4H1.3c-0.7,0-1.3-0.6-1.3-1.3V1.3C0,0.6,0.6,0,1.3,0h23.6c0.7,0,1.3,0.6,1.3,1.3v29.8   C26.2,31.8,25.6,32.4,24.9,32.4z M2.5,29.9h21.1V2.6H2.5V29.9z"></path>
                                </g>
                                <g>
                                    <path class="st0"
                                          d="M19.8,10H6.3C5.6,10,5,9.4,5,8.7s0.6-1.3,1.3-1.3h13.5c0.7,0,1.3,0.6,1.3,1.3S20.5,10,19.8,10z"></path>
                                </g>
                                <g>
                                    <path class="st0"
                                          d="M19.8,15H6.3C5.6,15,5,14.4,5,13.7s0.6-1.3,1.3-1.3h13.5c0.7,0,1.3,0.6,1.3,1.3S20.5,15,19.8,15z"></path>
                                </g>
                                <g>
                                    <path class="st0"
                                          d="M19.8,20H6.3C5.6,20,5,19.4,5,18.7s0.6-1.3,1.3-1.3h13.5c0.7,0,1.3,0.6,1.3,1.3S20.5,20,19.8,20z"></path>
                                </g>
                                <g>
                                    <path class="st0"
                                          d="M14.8,25H6.3C5.6,25,5,24.4,5,23.7s0.6-1.3,1.3-1.3h8.5c0.7,0,1.3,0.6,1.3,1.3S15.5,25,14.8,25z"></path>
                                </g>
                            </svg>
                        </i>
                        <div class="title title--ms">Гарантія</div>
                        <i class="icon icon--rotate icon--sm icon--grey icon-collapser _ml-3">
                            <svg id="d-arrows" viewBox="0 0 220.682 220.682">
                                <g>
                                    <polygon
                                            points="92.695,38.924 164.113,110.341 92.695,181.758 120.979,210.043 220.682,110.341 120.979,10.639  "></polygon>
                                    <polygon
                                            points="28.284,210.043 127.986,110.341 28.284,10.639 0,38.924 71.417,110.341 0,181.758  "></polygon>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                            </svg>
                        </i>
                    </div>
                    <div class="wysiwyg _mb-3 _hide">
                        <p>Ідейні міркування вищого порядку, а також зміцнення та розвиток структури дозволяє
                            виконувати важливі завдання по розробці системи навчання кадрів</p>
                    </div>
                    <div class="_flex _items-center _mb-2 _justify-between"><i
                                class="icon icon--md icon--grey _mr-3">
                            <svg id="refund" viewBox="0 0 28.7 30">
                                <g>
                                    <g>
                                        <path class="st0"
                                              d="M1.3,11.8c-0.1,0-0.3,0-0.4-0.1c-0.7-0.2-1-0.9-0.8-1.6C2.2,4,7.9,0,14.3,0c4.3,0,8.5,1.9,11.3,5.2    C26.1,5.7,26,6.5,25.5,7s-1.3,0.4-1.8-0.1c-2.4-2.7-5.8-4.3-9.4-4.3C9,2.6,4.2,6,2.5,11.1C2.3,11.5,1.8,11.8,1.3,11.8z"></path>
                                    </g>
                                    <g>
                                        <polygon class="st0" points="20.5,5.7 24,5.2 26,2.3 27.3,10.6   "></polygon>
                                    </g>
                                </g>
                                <g>
                                    <g>
                                        <path class="st0"
                                              d="M14.3,30c-4.7,0-9-2.1-11.9-5.9c-0.4-0.5-0.3-1.3,0.2-1.8c0.5-0.4,1.3-0.3,1.8,0.2c2.4,3.1,6,4.9,9.9,4.9    c5.5,0,10.3-3.5,12-8.8c0.2-0.7,0.9-1,1.6-0.8s1,0.9,0.8,1.6C26.7,25.8,20.9,30,14.3,30z"></path>
                                    </g>
                                    <g>
                                        <polygon class="st0"
                                                 points="7.6,23.9 4.1,24.3 1.9,27 1.1,18.7   "></polygon>
                                    </g>
                                </g>
                            </svg>
                        </i>
                        <div class="title title--ms">Повернення</div>
                        <i class="icon icon--rotate icon--sm icon--grey icon-collapser _ml-3">
                            <svg id="d-arrows" viewBox="0 0 220.682 220.682">
                                <g>
                                    <polygon
                                            points="92.695,38.924 164.113,110.341 92.695,181.758 120.979,210.043 220.682,110.341 120.979,10.639  "></polygon>
                                    <polygon
                                            points="28.284,210.043 127.986,110.341 28.284,10.639 0,38.924 71.417,110.341 0,181.758  "></polygon>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                            </svg>
                        </i>
                    </div>
                    <div class="wysiwyg _mb-3 _hide">
                        <p>Ідейні міркування вищого порядку, а також зміцнення та розвиток структури дозволяє
                            виконувати важливі завдання по розробці системи навчання кадрів</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="_flex _mb-4">
            <a href="#" class="tab-link is-active" data-tab-trigger="3" data-tab-ns="product">Аналогічні товари</a>
        </div>
        <div class="_mb-5">
            <div class="" data-tab-content="1" data-tab-ns="product">
                <div class="wysiwyg">
                    <table class="table-zebra">
                    </table>
                </div>
            </div>

            <div class="is-active">
                <div>
                    <?= ListView::widget([
                        'dataProvider' => $dataProviderSameProducts,
                        'itemView' => '/product/same_item',
                        'layout' => "<div class=\"analogue-table__row analogue-table__row--header\">
                            <div class=\"analogue-table__col\">Товар</div>
                            <div class=\"analogue-table__col\">Артикул</div>
                            <div class=\"analogue-table__col\">Виробник</div>
                            <div class=\"analogue-table__col\">Ціна</div>
                            <div class=\"analogue-table__col\">Наявність</div>
                            <div class=\"analogue-table__col\"></div>
                        </div>\n{items}",
                        'options' => [
                            'tag' => 'div',
                            'class' => 'analogue-table'
                        ],
                        'itemOptions' => [
                            'tag' => 'div',
                            'class' => 'analogue-table__row'
                        ],
                    ]); ?>
                </div>
            </div>
        </div>
    </div>
</main>


