<?php

use yii\helpers\Html;
use yii\widgets\ListView;


$this->title = 'Новини';
$this->params['breadcrumbs'][] = $this->title;
?>


<main class="page-main">
    <div class="page-size">
        <h1 class="title _mb-3"><?= Html::encode($this->title) ?></h1>

        <?= ListView::widget([
            'dataProvider' => $dataProvider,
            'itemView' => '/news/_item',
            'layout' => "<div class='_flex _grid-space-3'>{items}</div>\n<div class='pagination'>{pager}</div>",
            'itemOptions' => [
                'tag' => 'div',
                'class' => '_col-12 _xl-col-6'
            ],
        ]); ?>
    </div>
</main>
