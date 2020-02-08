<?php

use yii\helpers\Html;
use yii\helpers\Url;

?>
<div class="analogue-table__col">
    <div class="_flex _flex-nowrap _items-center">
        <div class="_col-auto"><a href="<?= $model->id ?>" class="analogue-image"><img
                        src="<?= $model->image ?>" alt=""></a>
        </div>
        <div class="_col-auto"><a href="<?= $model->id ?>"
                                  class="analogue-title"><?= $model->name ?></a></div>
    </div>
</div>
<div class="analogue-table__col"><span class="product-code"><?= $model->article ?>+</span></div>
<div class="analogue-table__col"><a href="/brand/<?= $model->brand_id ?>"><?= $model->brand->name ?></a></div>
<div class="analogue-table__col"><span class="analogue-price"><?= $model->price ?> грн.</span></div>
<div class="analogue-table__col"><?php if ($model->in_stock): ?>
        <span class="product-exist product-exist--true">В наявності</span>
    <?php else: ?>
        <div class="product-exist product-exist--false">Нема в наявності</div>
    <?php endif; ?></div>
<div class="analogue-table__col"><a href="<?= Url::to(['/cart/add/' . $model->id]) ?>" class="button" о>
                                    <span>
                                        <i>
                                            <svg id="cart" viewBox="0 0 50.613 50.613">
	<g>
		<path d="M49.569,11.145H20.055c-0.961,0-1.508,0.743-1.223,1.661l4.669,13.677c0.23,0.738,1.044,1.336,1.817,1.336h19.35    c0.773,0,1.586-0.598,1.814-1.336l4.069-14C50.783,11.744,50.344,11.145,49.569,11.145z"></path>
		<circle cx="22.724" cy="43.575" r="4.415"></circle>
		<circle cx="41.406" cy="43.63" r="4.415"></circle>
		<path d="M46.707,32.312H20.886L10.549,2.568H2.5c-1.381,0-2.5,1.119-2.5,2.5s1.119,2.5,2.5,2.5h4.493L17.33,37.312h29.377    c1.381,0,2.5-1.119,2.5-2.5S48.088,32.312,46.707,32.312z"></path>
	</g>
</svg>
                                        </i>
                                        <span>До кошику</span>
                                    </span>
    </a>
</div>
