<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * ImagesSearch represents the model behind the search form about `app\models\Images`.
 */
class BannersSearch extends Banners
{
	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['id'], 'integer'],
			[['banner_name', 'banner_status', 'date_created','banner_position'], 'safe'],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function scenarios()
	{
		// bypass scenarios() implementation in the parent class
		return Model::scenarios();
	}

	/**
	 * Creates data provider instance with search query applied
	 *
	 * @param array $params
	 *
	 * @return ActiveDataProvider
	 */
	public function search($params)
	{
		$query = Banners::find();

		// add conditions that should always apply here

		$dataProvider = new ActiveDataProvider([
			'query' => $query,
		]);

		$this->load($params);

		if (!$this->validate()) {
			// uncomment the following line if you do not want to return any records when validation fails
			// $query->where('0=1');
			return $dataProvider;
		}

		// grid filtering conditions
		$query->andFilterWhere([
			'id' => $this->id,
			'date_start' => $this->date_start,
			'date_ends' => $this->date_ends,
			'banner_position'=>$this->banner_position,
		]);

		$query->andFilterWhere(['like', 'banner_name', $this->banner_name])
			->andFilterWhere(['like', 'banner_status', $this->banner_status])
			->andFilterWhere(['like', 'banner_position', $this->banner_position])
			->andFilterWhere(['like', 'date_created', $this->date_created])
			->andFilterWhere(['like', 'banner_size', $this->banner_size]);


		return $dataProvider;
	}
}
