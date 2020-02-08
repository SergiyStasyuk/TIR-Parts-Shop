<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Кошик';
$this->params['breadcrumbs'][] = $this->title;

?>
<main class="page-main">
    <div class="modal modal--basket">
        <div class="basket">
            <div class="basket__header">
                <div class="title title--md">Товари у кошику</div>
            </div>
            <?php if (is_array($products)): ?>
            <?php $cartSum = 0 ?>
            <?php $totalProducts = 0 ?>
            <?php foreach ($products as $product): ?>
                <div class="basket-item">
                    <?= Html::a('<svg id="cancel" viewBox="0 0 21.9 21.9">
                    <path d="M14.1,11.3c-0.2-0.2-0.2-0.5,0-0.7l7.5-7.5c0.2-0.2,0.3-0.5,0.3-0.7s-0.1-0.5-0.3-0.7l-1.4-1.4C20,0.1,19.7,0,19.5,0  c-0.3,0-0.5,0.1-0.7,0.3l-7.5,7.5c-0.2,0.2-0.5,0.2-0.7,0L3.1,0.3C2.9,0.1,2.6,0,2.4,0S1.9,0.1,1.7,0.3L0.3,1.7C0.1,1.9,0,2.2,0,2.4  s0.1,0.5,0.3,0.7l7.5,7.5c0.2,0.2,0.2,0.5,0,0.7l-7.5,7.5C0.1,19,0,19.3,0,19.5s0.1,0.5,0.3,0.7l1.4,1.4c0.2,0.2,0.5,0.3,0.7,0.3  s0.5-0.1,0.7-0.3l7.5-7.5c0.2-0.2,0.5-0.2,0.7,0l7.5,7.5c0.2,0.2,0.5,0.3,0.7,0.3s0.5-0.1,0.7-0.3l1.4-1.4c0.2-0.2,0.3-0.5,0.3-0.7  s-0.1-0.5-0.3-0.7L14.1,11.3z"></path>
                </svg>', Url::to(['/cart/remove/' . $product->id]), ['class' => 'basket-item__remove']) ?>
                    <div class="basket-item__image"><img
                                src="<?= $product->image ?>" alt="">
                    </div>
                    <div class="basket-item__body"><?= Html::a($product->name, Url::to(['/product/' . $product->id]), ['class' => 'basket-item__title', 'target' => '_blank']) ?>
                        <div class="_flex _grid-space-3">
                            <div class="basket-item__price"><?= $product->price ?> грн.</div>
                        </div>
                    </div>
                    <div class="basket-item__count">
                        <div class="product-counter">
                            <input type="text" class="product-counter__field" readonly="readonly"
                                   value="<?= $productsCart[$product->id] ?>">
                            <?= Html::a('<div class="product-counter__increment"></div>', Url::to(['/cart/add/' . $product->id])) ?>
                            <?= Html::a('<div class="product-counter__decrement"></div>', Url::to(['/cart/min/' . $product->id])) ?>

                        </div>
                    </div>
                </div>
                <?php $cartSum += $productsCart[$product->id] * $product->price ?>
                <?php $totalProducts += $productsCart[$product->id]; ?>

            <?php endforeach; ?>
            <div class="basket__footer">
                <div class="_flex _flex-column">
                    <div class="_col-auto">Загалом: <span><?= $totalProducts ?></span> товарів на суму <span
                                class="basket__total"><span><?= $cartSum ?> грн.</span></span>
                    </div>
                </div>
                <div class="_flex _justify-center _mt-3"><?= Html::a('Оформити
                    замовлення', Url::to(['/cart/checkout']), ['class' => 'button']) ?>
                </div>
                <div class="_flex _justify-center _mt-3">
                    <?= Html::a('<span>
                            <i>
                                <svg id="cancel" viewBox="0 0 21.9 21.9">
  <path d="M14.1,11.3c-0.2-0.2-0.2-0.5,0-0.7l7.5-7.5c0.2-0.2,0.3-0.5,0.3-0.7s-0.1-0.5-0.3-0.7l-1.4-1.4C20,0.1,19.7,0,19.5,0  c-0.3,0-0.5,0.1-0.7,0.3l-7.5,7.5c-0.2,0.2-0.5,0.2-0.7,0L3.1,0.3C2.9,0.1,2.6,0,2.4,0S1.9,0.1,1.7,0.3L0.3,1.7C0.1,1.9,0,2.2,0,2.4  s0.1,0.5,0.3,0.7l7.5,7.5c0.2,0.2,0.2,0.5,0,0.7l-7.5,7.5C0.1,19,0,19.3,0,19.5s0.1,0.5,0.3,0.7l1.4,1.4c0.2,0.2,0.5,0.3,0.7,0.3  s0.5-0.1,0.7-0.3l7.5-7.5c0.2-0.2,0.5-0.2,0.7,0l7.5,7.5c0.2,0.2,0.5,0.3,0.7,0.3s0.5-0.1,0.7-0.3l1.4-1.4c0.2-0.2,0.3-0.5,0.3-0.7  s-0.1-0.5-0.3-0.7L14.1,11.3z"></path>
</svg>
                            </i>
                            <span>Очистити кошик</span>
                        </span>', Url::to(['/cart/clear']), ['class' => 'reset-trigger']) ?>
                </div>
            </div>
        </div>
    </div>
    <?php else: ?>
        <h3>
            Кошик порожній
        </h3>
    <?php endif; ?>
</main>