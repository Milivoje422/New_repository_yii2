<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Announcement;

/**
 * announcementSearch represents the model behind the search form about `app\models\Announcement`.
 */
class announcementSearch extends Announcement
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['announcement_id'], 'integer'],
            [['announcement_title', 'announcement_content', 'announcement_status', 'announcement_auto_active_from', 'announcement_auto_active_to', 'announcement_start_time'], 'safe'],
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
        $query = Announcement::find();

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
            'announcement_id' => $this->announcement_id,
            'announcement_auto_active_from' => $this->announcement_auto_active_from,
            'announcement_auto_active_to' => $this->announcement_auto_active_to,
            'announcement_start_time' => $this->announcement_start_time,
        ]);

        $query->andFilterWhere(['like', 'announcement_title', $this->announcement_title])
            ->andFilterWhere(['like', 'announcement_content', $this->announcement_content])
            ->andFilterWhere(['like', 'announcement_status', $this->announcement_status]);

        return $dataProvider;
    }
}
