<?php

namespace app\controllers;

use app\helpers\StatusHelper;
use app\models\News;
use yii\data\ActiveDataProvider;
use yii\web\Controller;

class NewsController extends Controller
{
    public $pageSize = 4;

    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => News::find(),
            'pagination' => [
                'pageSize' => $this->pageSize
            ]
        ]);
        return $this->render('index',['dataProvider' => $dataProvider]);
    }

    public function actionView($id)
    {
        $model = $this->findModel($id);
        return $this->render('view', ['model' => $model]);
    }

    private function findModel($id)
    {
        $model = News::find()->where(['id' => $id])->andWhere(['status' => StatusHelper::$active])->one();
        if (!$model) {
            throw new \yii\web\HttpException(404, 'Product Not Found');
        }
        return $model;
    }

}
