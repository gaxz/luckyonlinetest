<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\AccessLog;

/**
 * AccessLogSearch represents the model behind the search form of `app\models\AccessLog`.
 */
class AccessLogSearch extends AccessLog
{
    public $dateFrom;
    public $dateTo;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'status'], 'integer'],
            [['created_at', 'dateFrom', 'dateTo'], 'safe'],
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
        $query = AccessLog::find();

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
            'created_at' => $this->created_at,
            'status' => $this->status,
        ]);

        return $dataProvider;
    }

    public function countOnlineVisitors($params)
    {
        $query = AccessLog::find();

        $this->load($params);

        if (!$this->validate()) {
            return null;
        }

        $query->where(['>=', 'created_at', $this->dateFrom]);
        $query->andWhere(['<', 'created_at', $this->dateTo]);

        return $query->sum('(if(status = 1, 1, 0))');
    }
}
