<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Order */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="order-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'surname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'delivery_id')->textInput() ?>

    <?= $form->field($model, 'payment_id')->textInput() ?>

    <?= $form->field($model, 'sum')->textInput() ?>

    <?= $form->field($model, 'count')->textInput() ?>

    <?= $form->field($model, 'status')->dropDownList(\app\helpers\OrderHelper::show()) ?>

    <?= $form->field($model, 'date_create')->textInput() ?>

    <?= $form->field($model, 'date_update')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Зберегти', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    <?php if (is_array($products)): ?>
        <?php foreach ($products as $product): ?>
            <div class="basket-item">
                <div class="basket-item__image"><img
                            src="<?= Yii::$app->request->baseUrl ?>/images/products/<?= $product->image ?>" width="200"
                            alt="">
                </div>
                <div class="basket-item__body"><?= Html::a($product->name, Url::to(['/product/' . $product->id]), ['class' => 'basket-item__title', 'target' => '_blank']) ?>
                    <div class="_flex _grid-space-3">
                        <div class="basket-item__price"><?= $product->price ?> грн.</div>
                    </div>
                </div>
                <div class="basket-item__count">
                    <div class="product-counter">
                        <input type="text" class="product-counter__field" value="<?= $productsCart[$product->id] ?>">
                    </div>
                </div>
            </div>
            <?php echo $productsCart[$product->id] * $product->price ?>


        <?php endforeach; ?>
    <?php endif; ?>
    <h2>Сума: <?= $model->sum ?> грн.</h2>

</div>
