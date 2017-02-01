<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * This is the model class for table "{{%announcement_language}}".
 *
 * @property integer $announcement_language_id
 * @property integer $announcement_id
 * @property string $announcement_title
 * @property string $announcement_content
 */
class AnnouncementLanguage extends \yii\db\ActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return AnnouncementLanguage the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	/**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%announcement_language}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['announcement_id'], 'required'],
            [['announcement_id'], 'integer'],
            [['announcement_content'], 'string'],
            [['announcement_title'], 'string', 'max' => 1256],
	        [['announcement_language_id, announcement_id, announcement_title, announcement_content'], 'safe', 'on'=>'search'],
        ];
    }
	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'announcement' => array(self::BELONGS_TO, 'Announcement', 'announcement_id'),
		);
	}

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'announcement_language_id' => Yii::t('app', 'Announcement Language ID'),
            'announcement_id' => Yii::t('app', 'Announcement ID'),
            'announcement_title' => Yii::t('app', 'Announcement Title'),
            'announcement_content' => Yii::t('app', 'Announcement Content'),
        ];
    }


	public function scenarios()
	{
		// bypass scenarios() implementation in the parent class
		return Model::scenarios();
	}

	public function search($params)
	{
		$query = self::find();

		$dataProvider = new ActiveDataProvider([
			'query' => $query
		]);

		if (!($this->load($params) && $this->validate())) {
			return $dataProvider;
		}

		$query->andFilterWhere([
			'announcement_language_id' => $this->announcement_language_id,
			'announcement_id' => $this->announcement_id,
		]);

		$query->andFilterWhere(['like', 'announcement_title',$this->announcement_title])
			->andFilterWhere(['like', 'announcement_content',$this->announcement_content]);

		return $dataProvider;
	}
}
