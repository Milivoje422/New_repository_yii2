<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "image_language".
 *
 * @property integer $image_language_id
 * @property integer $image_id
 * @property string $image_description
 * @property string $image_keywords
 * @property string $image_location
 * @property integer $language_id
 */
class ImageLanguage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'image_language';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['image_id', 'image_description', 'image_keywords', 'language_id'], 'required'],
            [['image_id', 'language_id'], 'integer'],
            [['image_description'], 'string', 'max' => 2048],
            [['image_keywords', 'image_location'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'image_language_id' => Yii::t('app', 'Image Language ID'),
            'image_id' => Yii::t('app', 'Image ID'),
            'image_description' => Yii::t('app', 'Image Description'),
            'image_keywords' => Yii::t('app', 'Image Keywords'),
            'image_location' => Yii::t('app', 'Image Location'),
            'language_id' => Yii::t('app', 'Language ID'),
        ];
    }
}
