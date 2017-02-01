<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "post_translation".
 *
 * @property integer $id
 * @property integer $post_id
 * @property string $post_title
 * @property string $post_description
 * @property string $post_keywords
 * @property string $post_languages
 * @property string $translation_timedate
 */
class PostTranslation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'post_translation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['post_id', 'post_title', 'post_description', 'post_keywords', 'post_languages'], 'required'],
            [['post_id'], 'integer'],
            [['post_languages'], 'string'],
            [['translation_timedate'], 'safe'],
            [['post_title', 'post_keywords'], 'string', 'max' => 255],
            [['post_description'], 'string', 'max' => 1025],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'post_id' => Yii::t('app', 'Post ID'),
            'post_title' => Yii::t('app', 'Post Title'),
            'post_description' => Yii::t('app', 'Post Description'),
            'post_keywords' => Yii::t('app', 'Post Keywords'),
            'post_languages' => Yii::t('app', 'Post Languages'),
            'translation_timedate' => Yii::t('app', 'Translation Timedate'),
        ];
    }
}
