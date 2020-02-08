<?php

use yii\helpers\Html;
use yii\widgets\DetailView;


$this->title = 'Замовлення №'.$model->id;
$this->params['breadcrumbs'][] = ['label' => 'Швидкі Замовлення', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Замовлення №'.$model->id;
\yii\web\YiiAsset::register($this);
?>
<div class="quick-order-view">

    <h1>Замовлення №<?= $model->id; ?></h1>

    <p>
        <?= Html::a('Редагувати', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Видалити', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Ви впевнені що хочете видалити це замовлення?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'part_name',
            'name',
            'phone',
        ],
    ]) ?>

</div>
