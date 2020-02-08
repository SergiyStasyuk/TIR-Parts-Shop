<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Авторизація';
$this->params['breadcrumbs'][] = $this->title;
?>
<main class="page-main">
    <div class="page-size">
        <div class="site-login">
            <h1 class="title title--lg _mb-3"><?= Html::encode($this->title) ?></h1>

            <p class="title title--md _mb-3">Вкажіть Ваш логін та пароль:</p>

            <?php $form = ActiveForm::begin([
                'id' => 'login-form',
                'layout' => 'horizontal',
                'fieldConfig' => [
                    'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
                    'labelOptions' => ['class' => 'col-lg-1 control-label'],
                ],
            ]); ?>

            <?= $form->field($model, 'username')->textInput(['autofocus' => true])->label('Логін',['class'=>'form-label']) ?>

            <?= $form->field($model, 'password')->passwordInput()->label('Пароль',['class'=>'form-label']) ?>

            <?= $form->field($model, 'rememberMe')->checkbox([
                'template' => "<div class=\"col-lg-offset-1 col-lg-3\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
            ])->label('Запам\'ятати мене') ?>

            <div class="form-group">
                <div class="col-lg-offset-1 col-lg-11">
                    <?= Html::submitButton('Увійти', ['class' => 'button _pl-5 _pr-5', 'name' => 'login-button']) ?>
                </div>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</main>
