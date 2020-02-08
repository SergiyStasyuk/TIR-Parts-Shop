<?php

use yii\helpers\Url;
use yii\widgets\ListView;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\widgets\Pjax;

?>
<?php $this->params['breadcrumbs'][] =
    [
        'url' => Url::to('/product-category/index'),
        'label' => 'Каталог',
    ];
$this->params['breadcrumbs'][] = ['label' => $model->name];
?>

<main class="page-main">
    <div class="page-size">
        <div class="_flex _lg-flex-nowrap">
            <div class="sidebar">
                <div class="sidebar__section--header">
                    <div class="_flex _items-center _justify-end">
                        <a href="#" class="_lg-hide" data-toggle-trigger="false" data-toggle-ns="filter">Фільтр</a>
                    </div>
                </div>
                <div class="_lg-show">
                    <div class="sidebar__section">
                        <?php Pjax::begin(); ?>
                        <div>
                            <?php
                            $form = ActiveForm::begin([
                                'action' => ['/product-category/' . $model->id],
                                'method' => 'get',
                                'options' => [
                                    'data-pjax' => 1,
                                    'class' => 'sidebar'
                                ],
                            ]); ?>
                            <?php $brands = \app\models\Brand::find()->all();
                            $brands_list = [];
                            array_walk($brands, function ($model) use (&$brands_list) {
                                $brands_list[$model->id] = $model->name;
                            }); ?>
                            <div class="title title--sm _mb-2">Виробник</div>
                            <?= $form->field($searchModel, 'brand_id')->checkboxList($brands_list, [
                                'class' => 'form-element js-filter-brand-item filter-brand-item _mb-2',
                                'style' => 'display:flex;flex-direction:column;'
                            ])->label(''); ?>
                        </div>
                    </div>
                    <a class="link-show-more-brands js-link-show-more-brands title title--sm _mt-3"
                       id="link-show-brands" title="Натисніть, щоб показати всі виробники" data-text="Показати всі" data-text-clicked="Показати менше" data-title="Натисніть, щоб показати всіх виробників" data-title-clicked="Натисніть, щоб показати менше виробників">Показати всі</a>
                    <a class="link-show-more-brands js-link-show-more-brands title title--sm _mt-3 clicked" id="link-hide-brands" title="Натисніть, чтобы показати менше виробників" data-text="Показати всі" data-text-clicked="Показати менше" data-title="Натисніть, щоб показати всіх виробників" data-title-clicked="Натисніть, щоб показати менше виробників">Показати менше</a>
                    <div class="sidebar__section">
                        <div class="title title--sm _mb-3">Ціна</div>

                        <?= $form->field($searchModel, 'minprice')->label('Від:') ?>
                        <?= $form->field($searchModel, 'maxprice')->label('До:') ?>
                        <?= $form->field($searchModel, 'sort_option')->dropDownList([
                            'desc' => 'Від дорогих до дешевих',
                            'asc' => 'Від дешевих до дорогих',
                        ])->label('Сортувати:') ?>
                        <?= Html::submitButton('Пошук', ['class' => 'button button--full _mt-4']) ?>
                        <?php ActiveForm::end() ?>
                        <?php Pjax::end() ?>
                    </div>


                </div>
            </div>
            <div class="content">
                <div class="_flex _grid-space-4 _items-center _mb-3">
                    <h1 class="title _flex-grow-1 _m-2"><?= $model->name ?></h1>
                </div>

                <?= ListView::widget([
                    'dataProvider' => $dataProvider,
                    'itemView' => '/product/_item',
                    'layout' => "<div class='_flex _grid-space-3'>{items}</div>\n<div class='pagination'>{pager}</div>",
                    'itemOptions' => [
                        'tag' => 'div',
                        'class' => '_col-12 _sm-col-6 _md-col-4 _lg-col-6 _xl-col-3 _mb-3',
                    ],
                ]) ?>

            </div>
        </div>
    </div>
    <?= $model->content ?>
</main>


