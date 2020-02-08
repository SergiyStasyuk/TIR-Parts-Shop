<?php

use yii\helpers\Url;

?>

<a href="/news/<?= $model->id ?>" class="news-card _mb-3">
    <div class="news-card__image">
        <img src="<?= $model->image?>" alt="">
    </div>
    <div class="news-card__body">
        <div class="news-card__date"><?=$model->date_create?></div>
        <div class="news-card__title"><?=$model->title?></div>
        <div class="news-card__descr"><?=$model->content?></div>
    </div>
</a>