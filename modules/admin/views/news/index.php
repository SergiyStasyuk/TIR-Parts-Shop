<?php

use yii\helpers\Html;
use yii\grid\GridView;


$this->title = 'Новини та статті';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Додати статтю', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'date_create',
//            'content:ntext',
            'status',
            //'image',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
