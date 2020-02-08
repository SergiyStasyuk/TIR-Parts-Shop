<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "page".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $meta_title
 * @property string|null $meta_description
 * @property string|null $content
 * @property string|null $short_content
 * @property int|null $status
 * @property int|null $category_id
 * @property string|null $image
 */
class Page extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'page';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['content', 'short_content'], 'string'],
            [['status', 'category_id'], 'integer'],
            [['name', 'meta_title', 'meta_description', 'image'], 'string', 'max' => 255],
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
            'short_content' => 'Short Content',
            'status' => 'Status',
            'category_id' => 'Category ID',
            'image' => 'Image',
        ];
    }
}
