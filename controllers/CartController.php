<?php

namespace app\controllers;

use app\models\Checkout;
use Yii;
use yii\helpers\Url;
use yii\web\Controller;
use app\models\Delivery;
use app\models\Payment;
use app\models\Cart;
use app\models\Product;

class CartController extends Controller
{
    public function actionIndex()
    {
        $cart = new Cart;
        $products = null;
        $productsInCart = null;
        $productsCart = null;
        if ($cart->products()) {
            $productsInCart = $cart->products();
            $productsCart = $productsInCart;
            $productsInCart = implode(',', array_keys($productsInCart));
            $products = Product::find()->where('id IN (' . $productsInCart . ')')->all();
        }
        return $this->render('index', ['products' => $products, 'productsCart' => $productsCart]);
    }


    public function actionCheckout()
    {
        $model = new Checkout();
        $payment_list = Payment::findActive();
        $delivery_list = Delivery::findActive();
        $cart = new Cart;
        $products = null;
        $productsInCart = null;
        $productsCart = null;
        if ($cart->products()) {
            $productsInCart = $cart->products();
            $products_count = count($productsInCart);
            $products_json = json_encode($productsInCart);
            $productsCart = $productsInCart;
            $productsInCart = implode(',', array_keys($productsInCart));
            $products = Product::find()->where('id IN (' . $productsInCart . ')')->all();
        }

        if ($model->load(Yii::$app->request->post())) {
            $model->sum = $cart->sum();
            $model->date_create = time();
            $model->products = $products_json;
            $model->count = $products_count;
            $model->save();
            $cart->clear();
            return $this->redirect(Url::to('/cart/success/' . $model->id));
        }
        return $this->render('checkout', [
            'model' => $model,
            'payment_list' => $payment_list,
            'delivery_list' => $delivery_list,
            'products' => $products,
            'productsCart' => $productsCart
        ]);
    }

    public function actionManyadd($id)
    {
        if (Yii::$app->request->post('cart')) {
            $post = Yii::$app->request->post('cart');
            $items = $post['multiple'];
            $x = 0;
            $cart = new Cart();
            while ($x < $items) {

                $cart->add($id);
                $x++;
            }
            return $this->redirect(Yii::$app->request->referrer);
        }
    }

    public function actionSuccess($id)
    {
        return $this->render('success', ['id' => $id]);
    }

    public function actionAdd($id)
    {
        $cart = new Cart;
        if ($cart->add($id)) {
            return $this->redirect(Yii::$app->request->referrer);
        }
        return $this->redirect(Url::to(['/site/index']));
    }

    public function actionMin($id)
    {
        $cart = new Cart;
        if ($cart->min($id)) {
            return $this->redirect(Yii::$app->request->referrer);
        }
        return $this->redirect(Url::to(['/site/index']));
    }

    public function actionRemove($id)
    {
        $cart = new Cart;
        if ($cart->remove($id)) {
            return $this->redirect(Yii::$app->request->referrer);
        }
        return $this->redirect(Url::to(['/cart/index']));
    }

    public function actionClear()
    {
        $cart = new Cart;
        $cart->clear();
        return $this->redirect(Url::to(['/cart/index']));
    }
}