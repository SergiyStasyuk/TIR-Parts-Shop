<?php

namespace app\models;

use Yii;

class QuickOrder extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'quick_order';
    }

    public function rules()
    {
        return [
            [['part_name', 'name', 'phone'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'part_name' => 'Найменування деталі або артикул',
            'name' => 'Ім`я',
            'phone' => 'Телефон',
        ];
    }
}
