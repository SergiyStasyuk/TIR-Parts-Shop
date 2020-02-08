<?php

namespace app\models;

use app\helpers\StatusHelper;
use Yii;

/**
 * This is the model class for table "payment".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $value
 * @property int|null $status
 */
class Payment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'payment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['value'], 'string'],
            [['status'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['name'], 'required']
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
            'value' => 'Value',
            'status' => 'Status',
        ];
    }

    public static function findActive()
    {
        return self::find()->where(['status' => StatusHelper::$active])->all();
    }
}
