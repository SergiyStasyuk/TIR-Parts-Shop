<?php

namespace app\models;

use app\models\Product;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Brand;
use app\models\ProductCategory;


class BrandFrontSearch extends Product
{

    public $minprice;
    public $maxprice;
    public $pageSize = 8;
    public $sort_option;

    public function rules()
    {
        return [
            [['price', 'minprice', 'maxprice'], 'integer'],
            [['brand_id'], 'safe'],
            ['sort_option', 'string']
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params, $brand_id = null)
    {
        $query = Brand::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => $this->pageSize
            ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        if ($brand_id !== null) {
            $query->andFilterWhere(['brand_id' => $brand_id]);
        }

        $post = \Yii::$app->request->get('BrandFrontSearch');
        if (isset($post['minprice'])) {
            $query->andFilterWhere(['>=', 'price', $this->minprice]);
        }

        if (isset($post['maxprice'])) {
            $query->andFilterWhere(['<=', 'price', $this->maxprice]);
        }


        $query->andFilterWhere([
            'brand_id' => $this->brand_id,
        ]);
        if (isset($post['sort_option'])) {
            $query->orderBy('price '.$post['sort_option']);
        }
        return $dataProvider;
    }
}
