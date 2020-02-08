<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\QuickOrder */

$this->title = 'Редагувати Швидке Замовлення №: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Швидкі Замовлення', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Замовлення №'.$model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редагувати';
?>
<div class="quick-order-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
