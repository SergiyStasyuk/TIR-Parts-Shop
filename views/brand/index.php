<?php

use yii\helpers\Html;
use yii\widgets\ListView;


$this->title = 'Виробники';
$this->params['breadcrumbs'][] = $this->title;
?>


<main class="page-main">
    <div class="page-size">
        <h1 class="title _mb-3"><?= Html::encode($this->title) ?></h1>
        <div class="producer">

                <?= ListView::widget([
                    'dataProvider' => $dataProvider,
                    'itemView' => '/brand/_item',
                    'layout' => "\n{items}",
                    'options' => [
                        'tag' => 'div',
                    ],
                    'itemOptions' => [
                        'tag' => 'div',
                        'class' => 'producer__item'
                    ],
                ]); ?>
        </div>
    </div>
</main>
