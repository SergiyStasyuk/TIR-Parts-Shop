<?php

use app\models\Brand;
use app\models\ProductCategory;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Продукти';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Додати Продукт', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            [
                'attribute' => 'category_id',
                'value' => 'category.name',
                'filter' => Html::activeDropDownList($searchModel, 'category_id',
                    ArrayHelper::map(ProductCategory::find()->all(), 'id', 'name'),
                    ['class' => 'form-control', 'prompt' => '']),
            ],
            [
                'attribute' => 'brand_id',
                'value' => 'brand.name',
                'filter' => Html::activeDropDownList($searchModel, 'brand_id',
                    ArrayHelper::map(Brand::find()->all(), 'id', 'name'),
                    ['class' => 'form-control', 'prompt' => '']),
                'headerOptions' => ['style' => 'min-width:150px;']
            ],
            'price',


            ['class' => 'yii\grid\ActionColumn'],
        ],

    ]); ?>


</div>
