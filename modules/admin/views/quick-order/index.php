<?php

use yii\helpers\Html;
use yii\grid\GridView;


$this->title = 'Швидке замовлення';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="quick-order-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Створити швидке замовлення', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'part_name',
            'name',
            'phone',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
