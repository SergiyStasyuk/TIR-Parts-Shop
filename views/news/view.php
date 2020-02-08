<?php

use yii\helpers\Url;

$this->title = $model->title;
$this->params['breadcrumbs'][] =
    [
        'url' => Url::to('/news/'),
        'label' => 'Новини',
    ];
$this->params['breadcrumbs'][] = $this->title;

?>

<main class="page-main">
    <div class="page-size page-size--sm">
        <h1 class="title _mb-3"><?= $model->title ?></h1>
        <div class="date _mb-3"><?= $model->date_create ?></div>
        <?php echo $model->content ?>
        <a href="/news/">Повернутись до списку новин</a>
    </div>
</main>
