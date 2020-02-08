<?php

namespace app\modules\admin\controllers;

use app\models\Cart;
use app\models\Product;
use Yii;
use app\models\Order;
use app\models\OrderSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * OrderController implements the CRUD actions for Order model.
 */
class OrderController extends Controller
{
    /**
     * {@inheritdoc}
     */
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
        $searchModel = new OrderSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        $cart = new Cart;
        $model = $this->findModel($id);
        $products = null;
        $productsInCart = null;
        $productsCart = null;
        $cartProducts = json_decode($model->products,true);
        if ($cart->products()) {
            $productsInCart = $cart->products();
            $productsCart = $productsInCart;
            $productsInCart = implode(',', array_keys($productsInCart));
            $products = Product::find()->where('id IN (' . $productsInCart . ')')->all();
        }
        return $this->render('view', [
            'model' => $model,
            'products' => $products,
            'productsCart' => $productsCart
        ]);
    }

    public function actionUpdate($id)
    {
        $cart = new Cart;
        $model = $this->findModel($id);
        $products = null;
        $productsInCart = null;
        $productsCart = null;
        $cartProducts = json_decode($model->products,true);
        if ($cart->products()) {
            $productsInCart = $cart->products();
            $productsCart = $productsInCart;
            $productsInCart = implode(',', array_keys($productsInCart));
            $products = Product::find()->where('id IN (' . $productsInCart . ')')->all();
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'products' => $products,
            'productsCart' => $productsCart
        ]);
    }


    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = Order::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
