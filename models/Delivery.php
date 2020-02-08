<?php

namespace app\models;

use app\helpers\StatusHelper;
use Yii;


class Delivery extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'delivery';
    }

    public function rules()
    {
        return [
            [['value'], 'string'],
            [['price', 'status'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['name'], 'required']
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Назва',
            'value' => 'Опис',
            'price' => 'Ціна',
            'status' => 'Статус',
        ];
    }

    public static function findActive()
    {
        return self::find()->where(['status' => StatusHelper::$active])->all();
    }
}
