<?php

namespace app\models;

use Yii;

class Checkout extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'order';
    }


    public function rules()
    {
        return [
            [['delivery_id', 'payment_id', 'sum', 'count', 'status', 'date_create', 'date_update'], 'integer'],
            [['products'], 'string'],
            [['name', 'surname', 'phone', 'email'], 'string', 'max' => 255],
            [['name', 'surname', 'phone', 'email', 'delivery_id', 'payment_id'], 'required'],
            [['email'], 'email']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Ім`я',
            'surname' => 'Прізвище',
            'phone' => 'Телефон',
            'email' => 'Email',
            'delivery_id' => 'ID Доставки',
            'payment_id' => 'ID Оплати',
            'sum' => 'Сума',
            'count' => 'К-сть',
            'products' => 'Продукти',
            'status' => 'Статус',
            'date_create' => 'Дата Створення',
            'date_update' => 'Дата Редагування',
        ];
    }
}
