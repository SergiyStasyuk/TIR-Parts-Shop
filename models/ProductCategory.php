<?php

namespace app\models;

use Yii;
use app\helpers\StatusHelper;

/**
 * This is the model class for table "product_category".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $meta_title
 * @property string|null $meta_description
 * @property string|null $content
 * @property int|null $status
 * @property string|null $image
 */
class ProductCategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product_category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['meta_description', 'content'], 'string'],
            [['status'], 'integer'],
            [['name', 'meta_title', 'image'], 'string', 'max' => 255],
            [['name', 'meta_title'], 'required']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'meta_title' => 'Meta Title',
            'meta_description' => 'Meta Description',
            'content' => 'Content',
            'status' => 'Status',
            'image' => 'Image',
        ];
    }

    public static function showActive()
    {
        return self::find()->where(['status' => StatusHelper::$active])->all();
    }
}
