<?php

use kartik\date\DatePicker;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use pendalf89\filemanager\widgets\FileInput;
use pendalf89\filemanager\widgets\TinyMCE;

?>

<div class="news-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model,'date_create')->widget(DatePicker::className(),[
        'name' => 'date_create',
        'value' => date('d-M-Y', strtotime('+2 days')),
        'options' => ['placeholder' => 'Виберіть дату...'],
        'pluginOptions' => [
            'format' => 'dd-M-yyyy',
            'todayHighlight' => true
        ]
    ]);?>

    <?= $form->field($model, 'content')->widget(TinyMCE::className(), [
        'clientOptions' => [
            'language' => 'uk',
            'menubar' => false,
            'height' => 500,
            'image_dimensions' => false,
            'plugins' => [
                'advlist autolink lists link image charmap print preview anchor searchreplace visualblocks code contextmenu table',
            ],
            'toolbar' => 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | code',
        ],
    ]); ?>

    <?= $form->field($model, 'status')->dropDownList(\app\helpers\StatusHelper::show()) ?>

    <?php
    echo $form->field($model, 'image')->widget(FileInput::className(), [
        'buttonTag' => 'button',
        'buttonName' => 'Огляд',
        'buttonOptions' => ['class' => 'btn btn-success'],
        'options' => ['class' => 'form-control'],
        'template' => '<div class="input-group">{input}<span class="input-group-btn">{button}</span></div>',
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
