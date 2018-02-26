<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Product;

/**
 * ProductSearch represents the model behind the search form of `app\models\Product`.
 */
class ProductSearch extends Product
{
    public $min_price;
    public $max_price;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'category_id', 'brand_id', 'color_id', 'min_price', 'max_price'], 'integer'],
            [['name_ru', 'content_ru', 'minicontent_ru', 'keywords_ru', 'description_ru', 'img', 'hit', 'new', 'sale', 'top', 'slider', 'name_uz', 'content_uz', 'minicontent_uz', 'keywords_uz', 'description_uz'], 'safe'],
            [['price'], 'number'],
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
        $query = Product::find();

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
            'brand_id' => $this->brand_id,
            'color_id' => $this->color_id,
            'category_id' => $this->category_id,
            'parent_id' => $this->parent_id,
        ]);

        $query->andFilterWhere(['like', 'name_ru', $this->name_ru])
            ->andFilterWhere([
                'and',
                ['>=','price',$this->min_price],
                ['<=','price',$this->max_price],
            ]);
            /*->andFilterWhere(['like', 'content_ru', $this->content_ru])
            ->andFilterWhere(['like', 'minicontent_ru', $this->minicontent_ru])
            ->andFilterWhere(['like', 'keywords_ru', $this->keywords_ru])
            ->andFilterWhere(['like', 'description_ru', $this->description_ru])
            ->andFilterWhere(['like', 'img', $this->img])
            ->andFilterWhere(['like', 'hit', $this->hit])
            ->andFilterWhere(['like', 'new', $this->new])
            ->andFilterWhere(['like', 'sale', $this->sale])
            ->andFilterWhere(['like', 'top', $this->top])
            ->andFilterWhere(['like', 'slider', $this->slider])
            ->andFilterWhere(['like', 'name_uz', $this->name_uz])
            ->andFilterWhere(['like', 'content_uz', $this->content_uz])
            ->andFilterWhere(['like', 'minicontent_uz', $this->minicontent_uz])
            ->andFilterWhere(['like', 'keywords_uz', $this->keywords_uz])
            ->andFilterWhere(['like', 'description_uz', $this->description_uz]);*/

        return $dataProvider;
    }
}
