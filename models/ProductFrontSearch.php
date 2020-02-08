<?php

namespace app\models;

use app\models\Product;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Brand;
use app\models\ProductCategory;

/**
 * ProductSearch represents the model behind the search form of `app\models\Product`.
 */
class ProductFrontSearch extends Product
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

    public function search($params, $category_id = null)
    {
        $query = Product::find();

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

        if ($category_id !== null) {
            $query->andFilterWhere(['category_id' => $category_id]);
        }

        $post = \Yii::$app->request->get('ProductFrontSearch');
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
