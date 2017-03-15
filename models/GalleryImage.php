<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "gallery_image".
 *
 * @property integer $id
 * @property string $type
 * @property string $ownerId
 * @property string $src
 * @property integer $sort
 * @property string $name
 * @property string $description
 */
class GalleryImage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'gallery_image';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ownerId'], 'required'],
            [['sort'], 'integer'],
            [['description'], 'string'],
            [['ownerId', 'src', 'name'], 'string', 'max' => 300],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'ownerId' => Yii::t('app', 'Owner ID'),
            'src' => Yii::t('app', 'Src'),
            'sort' => Yii::t('app', 'Sort'),
            'name' => Yii::t('app', 'Name'),
            'description' => Yii::t('app', 'Description'),
        ];
    }
}
