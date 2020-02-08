<?php

namespace app\models;

use Yii;
use yii\web\Response;

class Cart
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function add($id)
    {
        $id = (int)$id;
        $productInCart = [];
        if (isset($_SESSION['products'])) {
            $productInCart = $_SESSION['products'];
        }
        if (array_key_exists($id, $productInCart)) {
            $productInCart[$id]++;
        } else {
            $productInCart[$id] = 1;
        }
        $_SESSION['products'] = $productInCart;
        return true;
    }

    public function min($id)
    {
        $id = intval($id);
        $productsInCart = array();
        if (isset($_SESSION['products'])) {
            $productsInCart = $_SESSION['products'];
        }
        if (array_key_exists($id, $productsInCart)) {
            if ($productsInCart[$id] > 1) {
                $productsInCart[$id]--;
            } else {
                unset($productsInCart[$id]);
                $_SESSION['products'] = $productsInCart;
            }
            $_SESSION['products'] = $productsInCart;
            return true;
        }
    }

    public function remove($id)
    {
        $id = (int)$id;
        $productsInCart = [];
        if (isset($_SESSION['products'])) {
            $productsInCart = $_SESSION['products'];
            unset($productsInCart[$id]);
        }
        $_SESSION['products'] = $productsInCart;
        return true;
    }


    public static function countProducts()
    {
        if (isset($_SESSION['products'])) {
            return count($_SESSION['products']);
        }
        return 0;
    }

    public function products()
    {
        if (isset($_SESSION['products'])) {
            return $_SESSION['products'];
        }
        return false;
    }

    public function clear()
    {
        if (isset($_SESSION['products'])) {
            unset($_SESSION['products']);
            return true;
        }
        return false;
    }

    public function inCart()
    {

    }

    public
    function sum()
    {
        $products = $this->products();
        $sum = 0;
        if (is_array($products)) {
            foreach ($products as $key => $product_count) {
                $product_info = Product::getProductInformation($key);
                if (isset($product_info->price)) {
                    $sum += $product_info->price * $product_count;
                }
            }
        }
        return $sum;
    }
}