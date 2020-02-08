<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

$this->title = 'Замовлення';

$this->params['breadcrumbs'][] = ['label' => 'Кошик', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>

<main class="page-main">
    <div class="page-size">
        <div class="_flex _grid-space-4 _justify-between">
            <div class="_col-12 _lg-col-6 _xl-col-5">
                <div class="title _mb-3">Оформлення замовлення</div>
                <?php $form = ActiveForm::begin([
                    'options' => ['class' => '_mb-5 form--no-valid']
                ]); ?>
                <div class="title title--md _mb-2">1. Контактні дані</div>

                <div class="form-element _mb-3">
                    <?= $form->field($model, 'name')->textInput(['maxlength' => true], ['class' => 'form-element__input'])->label("Ваше ім'я <i>*</i>", ['class' => 'form-label']) ?>
                </div>

                <div class="form-element _mb-3">
                    <?= $form->field($model, 'surname')->textInput(['maxlength' => true], ['class' => 'form-element__input'])->label("Ваше прізвище <i>*</i>", ['class' => 'form-label']) ?>
                </div>

                <div class="form-element _mb-3">
                    <?= $form->field($model, 'phone')->textInput(['maxlength' => true], ['class' => 'form-element__input'])->label("Контактний телефон <i>*</i>", ['class' => 'form-label']) ?>
                </div>

                <div class="form-element _mb-3">
                    <?= $form->field($model, 'email')->textInput(['maxlength' => true], ['class' => 'form-element__input'])->label("Вкажіть ваш Email <i>*</i>", ['class' => 'form-label']) ?>
                </div>


                <div class="title title--md _mb-3">2. Доставка і оплата</div>
                <div class="_flex _grid-3 _grid-space-4 _mb-2">
                    <?= $form->field($model, 'delivery_id')->label('', ['style' => 'display:none;'])->radioList(ArrayHelper::map($delivery_list, 'id', 'name')) ?>
                </div>
                <div class="title title--md _mb-2">Оплата</div>
                <div class="_flex _grid-space-4 _mb-4">
                    <?= $form->field($model, 'payment_id')->label('', ['style' => 'display:none;'])->radioList(ArrayHelper::map($payment_list, 'id', 'name')) ?>
                </div>
                <?= Html::submitButton('Зберегти', ['class' => 'button _pl-5 _pr-5']) ?>
                <?php ActiveForm::end(); ?>
            </div>


            <div class="liqpay_div"></div>
            <div class="_col-12 _lg-col-6 _xl-col-5">
                <div class="basket" style="min-height: 0;background-color:#f8f8f8;">
                    <?php if (is_array($products)): ?>
                    <?php $cartSum = 0 ?>
                    <?php $totalProducts = 0 ?>
                    <?php foreach ($products as $product): ?>
                        <div class="basket-item">
                            <?= Html::a('<svg id="cancel" viewBox="0 0 21.9 21.9">
                    <path d="M14.1,11.3c-0.2-0.2-0.2-0.5,0-0.7l7.5-7.5c0.2-0.2,0.3-0.5,0.3-0.7s-0.1-0.5-0.3-0.7l-1.4-1.4C20,0.1,19.7,0,19.5,0  c-0.3,0-0.5,0.1-0.7,0.3l-7.5,7.5c-0.2,0.2-0.5,0.2-0.7,0L3.1,0.3C2.9,0.1,2.6,0,2.4,0S1.9,0.1,1.7,0.3L0.3,1.7C0.1,1.9,0,2.2,0,2.4  s0.1,0.5,0.3,0.7l7.5,7.5c0.2,0.2,0.2,0.5,0,0.7l-7.5,7.5C0.1,19,0,19.3,0,19.5s0.1,0.5,0.3,0.7l1.4,1.4c0.2,0.2,0.5,0.3,0.7,0.3  s0.5-0.1,0.7-0.3l7.5-7.5c0.2-0.2,0.5-0.2,0.7,0l7.5,7.5c0.2,0.2,0.5,0.3,0.7,0.3s0.5-0.1,0.7-0.3l1.4-1.4c0.2-0.2,0.3-0.5,0.3-0.7  s-0.1-0.5-0.3-0.7L14.1,11.3z"></path>
                </svg>', Url::to(['/cart/remove/' . $product->id]), ['class' => 'basket-item__remove']) ?>
                            <div class="basket-item__image"><img
                                        src="<?= $product->image ?>"
                                        alt="">
                            </div>
                            <div class="basket-item__body"><?= Html::a($product->name, Url::to(['/product/' . $product->id]), ['class' => 'basket-item__title', 'target' => '_blank']) ?>
                                <div class="_flex _grid-space-3"><!---->
                                    <div class="basket-item__price"><?= $product->price ?> грн.</div>
                                </div>
                            </div>
                            <div class="basket-item__count">
                                <div class="product-counter">
                                    <input type="text" class="product-counter__field"
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
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    <?php else: ?>
        <h3>
            Кошик порожній
        </h3>
    <?php endif; ?>
    </div>
    <input id="current-language" type="hidden" value="ua"></div>
</main>
