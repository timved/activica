<?php

namespace app\models\tables;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\tables\Offer;

/**
 * SearchOffer represents the model behind the search form of `app\models\tables\Offer`.
 */
class SearchOffer extends Offer
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'offer_id', 'category_id'], 'integer'],
            [['offer_available', 'url', 'picture', 'name', 'articul', 'vendor', 'description', 'status_new', 'status_action', 'status_top'], 'safe'],
            [['price', 'optprice'], 'number'],
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
        $query = Offer::find();

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
            'offer_id' => $this->offer_id,
            'price' => $this->price,
            'optprice' => $this->optprice,
            'category_id' => $this->category_id,
        ]);

        $query->andFilterWhere(['like', 'offer_available', $this->offer_available])
            ->andFilterWhere(['like', 'url', $this->url])
            ->andFilterWhere(['like', 'picture', $this->picture])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'articul', $this->articul])
            ->andFilterWhere(['like', 'vendor', $this->vendor])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'status_new', $this->status_new])
            ->andFilterWhere(['like', 'status_action', $this->status_action])
            ->andFilterWhere(['like', 'status_top', $this->status_top]);

        return $dataProvider;
    }
}
