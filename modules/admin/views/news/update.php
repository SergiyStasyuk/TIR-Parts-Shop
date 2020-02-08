<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\News */

$this->title = 'Редагувати статтю: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Новини та статті', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Стаття №' . $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редагувати';
?>
<div class="news-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
