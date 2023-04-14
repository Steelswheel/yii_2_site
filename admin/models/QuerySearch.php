<?php

namespace app\admin\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * CitizensApplicationsSearch represents the model behind the search form of `app\admin\models\CitizensApplications`.
 */
class QuerySearch extends Query
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'problem_id', 'feedback', 'is_active', 'is_map', 'address_id', 'user_created'], 'integer'],
            [['name', 'phone', 'email', 'problem_des', 'address_value', 'code_activate', 'deleted_at', 'updated_at', 'created_at'], 'safe'],
            [['geo_lat', 'geo_lon'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Query::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 30,
            ],
            'sort'=> ['defaultOrder' => ['id' => SORT_DESC]]
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
            'problem_id' => $this->problem_id,
            'feedback' => $this->feedback,
            'is_active' => $this->is_active,
            'is_map' => $this->is_map,
            'address_id' => $this->address_id,
            'geo_lat' => $this->geo_lat,
            'geo_lon' => $this->geo_lon,
            'user_created' => $this->user_created,
            'deleted_at' => $this->deleted_at,
            'updated_at' => $this->updated_at,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'problem_des', $this->problem_des])
            ->andFilterWhere(['like', 'address_value', $this->address_value])
            ->andFilterWhere(['like', 'code_activate', $this->code_activate]);

        return $dataProvider;
    }
}
