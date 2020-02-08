<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\ListView;
use yii\widgets\Pjax;


$this->title = 'Пошук';
$this->params['breadcrumbs'][] = $this->title;

?>

<main class="page-main">
    <div class="page-size">
        <h1 class="title _flex-grow-1 _m-2"></h1>
        <div class="_lg-show">
            <div class="_mb-5">
                <div class="" data-tab-content="1" data-tab-ns="product">
                    <div class="wysiwyg">
                        <table class="table-zebra">
                        </table>
                    </div>
                </div>

                <div class="is-active">
                    <div>
                        <?= ListView::widget([
                            'dataProvider' => $dataProvider,
                            'itemView' => '/product/same_item',
                            'layout' => "<div class=\"analogue-table__row analogue-table__row--header\">
                            <div class=\"analogue-table__col\">Товар</div>
                            <div class=\"analogue-table__col\">Артикул</div>
                            <div class=\"analogue-table__col\">Виробник</div>
                            <div class=\"analogue-table__col\">Ціна</div>
                            <div class=\"analogue-table__col\">Наявність</div>
                            <div class=\"analogue-table__col\"></div>
                        </div>\n{items}",
                            'options' => [
                                'tag' => 'div',
                                'class' => 'analogue-table'
                            ],
                            'itemOptions' => [
                                'tag' => 'div',
                                'class' => 'analogue-table__row'
                            ],
                        ]); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>


