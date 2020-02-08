<?php

namespace app\controllers;

use app\models\ProductFrontSearch;
use Yii;
use yii\web\Controller;
use app\helpers\StatusHelper;
use app\models\ProductCategory;
use yii\data\ActiveDataProvider;

class ProductCategoryController extends Controller
{
    public $pageSize = 20;

    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => ProductCategory::find(),
            'pagination' => [
                'pageSize' => $this->pageSize
            ],
        ]);
        return $this->render('index',['dataProvider' => $dataProvider]);
    }

    public function actionView($id)
    {
        $model = $this->findModel($id);
        $this->registerMetaTags($model);
        $searchModel = new ProductFrontSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $id);


        return $this->render('view', [
            'model' => $model,
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel
        ]);
    }

    private function findModel($id)
    {
        $model = ProductCategory::find()->where(['id' => $id])->andWhere(['status' => StatusHelper::$active])->one();
        if (!$model) {
            throw new \yii\web\HttpException(404, 'Product Not Found');
        }
        return $model;
    }

    private function registerMetaTags($model)
    {
        if ($model) {
            $view = Yii::$app->view;
            $view->title = $model->meta_title;
            $view->registerMetaTag(['name' => 'description', 'content' => $model->meta_description]);
        }
    }
}