<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Order */

$this->title = 'Замовлення №:' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Замовлення', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="order-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редагувати', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Видалити', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'surname',
            'phone',
            'email:email',
            'delivery_id',
            'payment_id',
            'sum',
            'count',
            'products:ntext',
            'status',
            'date_create',
            'date_update',
        ],
    ]) ?>

    <?php if (is_array($products)): ?>

        <?php foreach ($products as $product): ?>
            <div class="basket-item">
                <div class="basket-item__image"><img
                            src="<?= Yii::$app->request->baseUrl ?>/images/products/<?= $product->image ?>" alt="" width="200">
                </div>
                <div class="basket-item__body"><?= Html::a($product->name, Url::to(['/product/' . $product->id]), ['class' => 'basket-item__title', 'target' => '_blank']) ?>
                    <div class="_flex _grid-space-3">
                        <div class="basket-item__price"><?= $product->price ?> грн.</div>
                    </div>
                </div>
                <div class="basket-item__count">
                    <div class="product-counter">
                        <input type="text" class="product-counter__field" value="<?= $productsCart[$product->id] ?>">

                    </div>
                </div>
            </div>
            <?php echo $productsCart[$product->id] * $product->price ?>


        <?php endforeach; ?>
    <?php endif; ?>
    <h2>Сумма: <?= $model->sum ?> грн.</h2>

</div>
