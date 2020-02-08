<?php

namespace app\models;

use app\helpers\StatusHelper;
use Yii;

class News extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'news';
    }

    public function rules()
    {
        return [
            [['status'], 'integer'],
            [['content'], 'string'],
            [['date_create', 'title', 'image'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Назва',
            'date_create' => 'Дата створення',
            'content' => 'Контент',
            'status' => 'Статус',
            'image' => 'Картинка',
        ];
    }

    private function findActive()
    {
        return self::find()->where(['status' => StatusHelper::$active]);
    }

}
