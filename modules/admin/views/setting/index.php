<?php

namespace app\modules\admin\controllers;

use Yii;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Setting';
$this->params['breadcrumbs'][] = [
    'label' => $this->title
];
?>
    <?php
echo Html::beginForm();
echo Html::label('Currency');
echo Html::input('text', 'Setting[value][currency]');
echo '<br>';
echo Html::label('Site name');
echo Html::input('text', 'Setting[value][site_name]');
echo Html::submitButton('Save');
echo Html::endForm();
