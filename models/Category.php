<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property integer $category_id
 * @property string $category_name
 * @property string $category_url
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category';
    }


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_name', 'category_url'], 'required'],
            [['category_name'], 'string', 'max' => 45],
            [['category_url'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'category_id' => Yii::t('app', 'Category ID'),
            'category_name' => Yii::t('app', 'Category Name'),
            'category_url' => Yii::t('app', 'Category Url'),
        ];
    }
}
