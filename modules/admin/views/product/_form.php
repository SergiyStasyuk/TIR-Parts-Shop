<?php

use pendalf89\filemanager\widgets\FileInput;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$category = \app\models\ProductCategory::showActive();
$brand = \app\models\Brand::showActive();

?>

<div class="product-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'meta_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'meta_description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'article')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'in_stock')->textInput() ?>

    <?= $form->field($model, 'category_id')->dropDownList(\yii\helpers\ArrayHelper::map($category, 'id', 'name')) ?>

    <?= $form->field($model, 'brand_id')->dropDownList(\yii\helpers\ArrayHelper::map($brand, 'id', 'name')) ?>

    <?= $form->field($model, 'status')->dropDownList(\app\helpers\StatusHelper::show()) ?>

    <?php
    echo $form->field($model, 'image')->widget(FileInput::className(), [
        'buttonTag' => 'button',
        'buttonName' => 'Огляд',
        'buttonOptions' => ['class' => 'btn btn-success'],
        'options' => ['class' => 'form-control'],
        'template' => '<div class="input-group">{input}<span class="input-group-btn" style="margin-right:200px;">{button}</span></div>',
        'thumb' => 'original',
        'imageContainer' => '.img',
        'pasteData' => FileInput::DATA_URL,
        'callbackBeforeInsert' => 'function(e, data) {
       $(".image_prev").attr("src",data["url"]);
       console.log(data);
    }',
    ]);
    ?>
    <?php if (!empty($model->image)): ?>
        <img src="<?= $model->image ?>" alt="" height="100" class="image_prev">
    <?php endif; ?>
    <div class="form-group">
        <?= Html::submitButton('Зберегти', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
