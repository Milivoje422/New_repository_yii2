<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "announcement".
 *
 * @property integer $announcement_id
 * @property string $announcement_title
 * @property string $announcement_content
 * @property string $announcement_status
 * @property string $announcement_auto_active_from
 * @property string $announcement_auto_active_to
 * @property string $announcement_start_time
 */
class Announcement extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'announcement';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['announcement_content', 'announcement_status'], 'string'],
            [['announcement_status'], 'required'],
            [['announcement_auto_active_from', 'announcement_auto_active_to', 'announcement_start_time'], 'safe'],
            [['announcement_title'], 'string', 'max' => 1256],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'announcement_id' => Yii::t('app', 'Announcement ID'),
            'announcement_title' => Yii::t('app', 'Announcement Title'),
            'announcement_content' => Yii::t('app', 'Announcement Content'),
            'announcement_status' => Yii::t('app', 'Announcement Status'),
            'announcement_auto_active_from' => Yii::t('app', 'Announcement Auto Active From'),
            'announcement_auto_active_to' => Yii::t('app', 'Announcement Auto Active To'),
            'announcement_start_time' => Yii::t('app', 'Announcement Start Time'),
        ];
    }
}