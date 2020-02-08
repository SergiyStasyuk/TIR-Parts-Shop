<?php

namespace app\models;

use Yii;

class Block extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'block';
    }

    public function rules()
    {
        return [
            [['content'], 'string'],
            [['status'], 'integer'],
            [['name', 'image'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Назва',
            'content' => 'Контент',
            'status' => 'Статус',
            'image' => 'Картинка',
        ];
    }
}
