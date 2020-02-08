<?php

namespace app\models;

use Yii;
use app\helpers\StatusHelper;
use yii\helpers\ArrayHelper;

class Product extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'product';
    }

    public function rules()
    {
        return [
            [['meta_description', 'brand_id', 'article'], 'string'],
            [['price', 'in_stock', 'category_id', 'status'], 'integer'],
            [['name', 'meta_title', 'image'], 'string', 'max' => 255],
            [['name', 'meta_title', 'price', 'brand_id'], 'required']
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'meta_title' => 'Meta Title',
            'meta_description' => 'Meta Description',
            'brand_id' => 'Brand',
            'article' => 'Article',
            'price' => 'Price',
            'in_stock' => 'In Stock',
            'category_id' => 'Category',
            'status' => 'Status',
            'image' => 'Image',
        ];
    }

    private function findActive()
    {
        return self::find()->where(['status' => StatusHelper::$active]);
    }

    public static function findInCategory($category_id)
    {
        return self::find()->where(['status' => StatusHelper::$active])->andWhere(['category_id' => $category_id]);
    }

    public function getBrand()
    {
        return $this->hasOne(Brand::className(), ['id' => 'brand_id']);
    }

    public function getCategory()
    {
        return $this->hasOne(ProductCategory::className(), ['id' => 'category_id']);
    }

    public static function getProductInformation($id)
    {
        return self::findOne($id);
    }
}
