<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\ListView;
use yii\widgets\Pjax;


$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Виробники', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>

<main class="page-main">
    <div class="page-size">
        <div class="_flex _lg-flex-nowrap">
            <div class="content">
                <div class="_flex _grid-space-4 _items-center _mb-3">
                    <h1 class="title _flex-grow-1 _m-2"><?= $model->name ?></h1>
                </div>
                <?= ListView::widget([
                    'dataProvider' => $dataProviderBrandItems,
                    'itemView' => '/brand/_itemDetail',
                    'layout' => "<div class='_flex _grid-space-3'>{items}</div>\n<div class='pagination'>{pager}</div>",
                    'itemOptions' => [
                        'tag' => 'div',
                        'class' => '_col-12 _sm-col-6 _md-col-4 _lg-col-6 _xl-col-3 _mb-3',
                    ],
                ]); ?>

            </div>
</main>

