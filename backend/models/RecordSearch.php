<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Record;

/**
 * RecordSearch represents the model behind the search form of `app\models\Record`.
 */
class RecordSearch extends Record
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'archive', 'status', 'tid'], 'integer'],
            [['title', 'date', 'author', 'link', 'picture_annotation', 'picture_text', 'annotation', 'text', 'type'], 'safe'],
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
        $query = Record::find();
        //$query = Record::find()->with(['t']);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                //'pageSizeParam' => false,
                'forcePageParam' => false,
            ],
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
            'date' => $this->date,
            'archive' => $this->archive,
            'status' => $this->status,
            'tid' => $this->tid,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'author', $this->author])
            ->andFilterWhere(['like', 'link', $this->link])
            ->andFilterWhere(['like', 'picture_annotation', $this->picture_annotation])
            ->andFilterWhere(['like', 'picture_text', $this->picture_text])
            ->andFilterWhere(['like', 'annotation', $this->annotation])
            ->andFilterWhere(['like', 'text', $this->text])
            ->andFilterWhere(['like', 'type', $this->type]);

        return $dataProvider;
    }
}