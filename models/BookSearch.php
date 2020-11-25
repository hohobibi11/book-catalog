<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Book;

/**
 * BookSearch represents the model behind the search form of `app\models\Book`.
 */
class BookSearch extends Book
{
    protected $author_name;
    protected $title_desc;


    public function setAuthorName($name)
    {
        $this->author_name = $name;
    }

    public function getAuthorName()
    {
        return $this->author_name;
    }

    public function setTitleDesc($name)
    {
        $this->title_desc = $name;
    }

    public function getTitleDesc()
    {
        return $this->title_desc;
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'published_at', 'created_at', 'updated_at', 'user_id'], 'integer'],
            [['title', 'description', 'image'], 'safe'],
            [['authorName', 'titleDesc'],'safe'],
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
    public function search($params, $tagId = null, $authorId = null)
    {
        $query = Book::find()->groupBy('id')->JoinWith(['authors', 'tags']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 24,
            ],
            'sort' => [
                'attributes' => [
                    'title',
                    'published_at',
                    'created_at',
                ],
                'defaultOrder' => [
                    'created_at' => SORT_DESC,
                    'title' => SORT_ASC,
                    'published_at' => SORT_DESC,
                ]
            ]
        ]);

        $this->load($params);
        if (isset($_GET['BookSearch'])){
            $this->author_name = $_GET['BookSearch']['authorName'] ?? null;
            $this->title_desc = $_GET['BookSearch']['titleDesc'] ?? null;
        }


        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'published_at' => $this->published_at,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'user_id' => $this->user_id,
            'author.full_name' => $this->author_name,
            'tag.id' => $tagId,
            'author.id' => $authorId,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title_desc])
            ->orFilterWhere(['like', 'book.description', $this->title_desc]);


        return $dataProvider;
    }
}
