<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Relationship;

/**
 * RelationshipSearch represents the model behind the search form about `app\models\Relationship`.
 */
class RelationshipSearch extends Relationship
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_one_id', 'user_two_id', 'status', 'action_user_id'], 'integer'],
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
    public function search($params,$id)
    {
        $query = Relationship::find()->where(['user_one_id'=> $id])->orFilterWhere(['user_two_id'=>$id])->andFilterWhere(['status'=>1]) ;

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'user_one_id' => $this->user_one_id,
            'user_two_id' => $this->user_two_id,
            'status' => $this->status,
            'action_user_id' => $this->action_user_id,
        ]);

        return $dataProvider;
    }
}
