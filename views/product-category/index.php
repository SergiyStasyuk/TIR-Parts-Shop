<?php

use yii\helpers\Url;
use yii\widgets\ListView;

?>
<?php $this->params['breadcrumbs'][] = ['label' => 'Каталог продукції'];
?>
<main class="page-main">
    <div class="page-size">
        <h1 class="title _mb-3">Каталог продукції</h1>
        <?= ListView::widget([
            'dataProvider' => $dataProvider,
            'itemView' => '/product-category/_item',
            'layout' => "{pager}\n{items}\n{pager}",
            'options' => [
                'tag' => 'div',
                'class' => '_flex _grid-space-3',
            ],
            'itemOptions' => [
                'tag' => 'div',
                'class' => '_col-12 _sm-col-6 _lg-col-3 _mb-3',
            ],
        ]); ?>
    </div>
</main>
