<?php

namespace app\controllers;

use app\helpers\StatusHelper;
use app\models\Brand;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use app\models\Product;

class ProductController extends Controller
{

    public $pageSize = 20;

    public function actionView($id)
    {
        $model = $this->findModel($id);
        $sameProducts = Product::find()->where(['category_id' => $model->category->id])->andWhere(['!=','id',$model->id])->limit(5);
        $dataProviderSameProducts = new ActiveDataProvider([
            'query' => $sameProducts,
            'pagination' => false
        ]);
        $this->registerMetaTags($model);

        return $this->render('view', ['model' => $model, 'dataProviderSameProducts' => $dataProviderSameProducts]);
    }

    private function findModel($id)
    {
        $model = Product::find()->where(['id' => $id])->andWhere(['status' => StatusHelper::$active])->one();
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

    public function actionSearch()
    {
        if (Yii::$app->request->post('search')) {
            $search = Yii::$app->request->post('search');
            $name = $search['text'];
            $brand = Brand::find()->where(['like', 'name', $name])->one();
            $query = Product::find();
            $query->andFilterWhere([
                'status' => StatusHelper::$active,
            ]);
            if ($brand !== null) {
                $brand_id = $brand->id;
                $query->andFilterWhere(['brand_id' => $brand_id]);
            } else {
                $query->andFilterWhere(['like', 'name', $name]);
                $query->orFilterWhere(['like', 'article', $name]);
            }
            $dataProvider = new ActiveDataProvider([
                'query' => $query,
                'pagination' => [
                    'pageSize' => $this->pageSize
                ],
            ]);
        }
        return $this->render('search', ['dataProvider' => $dataProvider]);
    }
}