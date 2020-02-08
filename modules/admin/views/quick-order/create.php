<?php

use yii\helpers\Html;


$this->title = 'Створити швидке замовлення';
$this->params['breadcrumbs'][] = ['label' => 'Швидкі Замовлення', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="quick-order-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
