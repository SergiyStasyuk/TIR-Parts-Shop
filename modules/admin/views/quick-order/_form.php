<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="quick-order-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'part_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Зберегти', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
