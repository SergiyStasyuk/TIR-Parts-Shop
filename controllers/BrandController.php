<?php

namespace app\controllers;

use app\helpers\StatusHelper;
use app\models\BrandFrontSearch;
use app\models\Product;
use app\models\ProductFrontSearch;
use Yii;
use app\models\Brand;
use app\models\BrandSearch;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


class BrandController extends Controller
{

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }


    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Brand::find(),
            'pagination' => [
                'pageSize'=>100
            ]
        ]);
        return $this->render('index',['dataProvider' => $dataProvider]);
    }


    public function actionView($id)
    {
        $model = $this->findModel($id);
        $searchModel = new BrandFrontSearch();
        $brandSearchItems = $searchModel->search(Yii::$app->request->queryParams, $id);
        $dataProviderSearch = new ActiveDataProvider([
            'query' => $brandSearchItems,
        ]);
        $brandItems = Product::find()->where(['brand_id' => $model->id]);
        $dataProviderBrandItems = new ActiveDataProvider([
            'query' => $brandItems,
        ]);
        return $this->render('view', [
            'model' => $this->findModel($id),
            'dataProviderBrandItems' => $dataProviderBrandItems,
            'dataProviderSearch' => $dataProviderSearch,
            'searchModel' => $searchModel
        ]);
    }


    private function findModel($id)
    {
        $model = Brand::find()->where(['id' => $id])->andWhere(['status' => StatusHelper::$active])->one();
        if (!$model) {
            throw new \yii\web\HttpException(404, 'Product Not Found');
        }
        return $model;
    }
}
