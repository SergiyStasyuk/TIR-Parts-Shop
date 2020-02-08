<?php

namespace app\models;

use app\helpers\StatusHelper;
use Yii;

class Brand extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'brand';
    }

    public function rules()
    {
        return [
            [['status'], 'integer'],
            [['name', 'image'], 'string', 'max' => 255],
            [['name'], 'required']
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Назва',
            'status' => 'Статус',
            'image' => 'Картинка',
        ];
    }

    public static function showActive()
    {
        return self::find()->where(['status' => StatusHelper::$active])->orderBy('name ASC')->all();
    }
}
