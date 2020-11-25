<?php

namespace app\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\imagine\Image;

/**
 * This is the model class for table "book".
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property int $published_at
 * @property string|null $image
 * @property int $created_at
 * @property int $updated_at
 * @property int $user_id
 *
 * @property User $user
 * @property BookHasAuthor[] $bookHasAuthors
 * @property Author[] $authors
 * @property BookHasTag[] $bookHasTags
 * @property Tag[] $tags
 */
class Book extends \yii\db\ActiveRecord
{

    //authors
    private $author1;

    public function getAuthor1()
    {
        return array_key_exists(0, $this->authors) ? $this->authors[0]->id : null;
    }

    private $author2;

    public function getAuthor2()
    {
        return array_key_exists(1, $this->authors) ? $this->authors[1]->id : null;
    }

    private $author3;

    public function getAuthor3()
    {
        return array_key_exists(2, $this->authors) ? $this->authors[2]->id : null;
    }

    private $author4;

    public function getAuthor4()
    {
        return array_key_exists(3, $this->authors) ? $this->authors[3]->id : null;
    }

    private $author5;

    public function getAuthor5()
    {
        return array_key_exists(4, $this->authors) ? $this->authors[4]->id : null;
    }

    public function setAuthors15($book)
    {
        $this->author1 = $book['author1'];
        $this->author2 = $book['author2'];
        $this->author3 = $book['author3'];
        $this->author4 = $book['author4'];
        $this->author5 = $book['author5'];
    }

    //tags
    private $tag1;

    public function getTag1()
    {
        return array_key_exists(0, $this->tags) ? $this->tags[0]->id : null;
    }

    private $tag2;

    public function getTag2()
    {
        return array_key_exists(1, $this->tags) ? $this->tags[1]->id : null;
    }

    private $tag3;

    public function getTag3()
    {
        return array_key_exists(2, $this->tags) ? $this->tags[2]->id : null;
    }

    private $tag4;

    public function getTag4()
    {
        return array_key_exists(3, $this->tags) ? $this->tags[3]->id : null;
    }

    private $tag5;

    public function getTag5()
    {
        return array_key_exists(4, $this->tags) ? $this->tags[4]->id : null;
    }

    public function setTags15($book)
    {
        $this->tag1 = $book['tag1'];
        $this->tag2 = $book['tag2'];
        $this->tag3 = $book['tag3'];
        $this->tag4 = $book['tag4'];
        $this->tag5 = $book['tag5'];
    }

    /**
     * @return array
     */
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
            ],
            [
                'class' => BlameableBehavior::className(),
                'createdByAttribute' => 'user_id',
                'updatedByAttribute' => false,
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'book';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'description', 'published_at'], 'required'],
            [['published_at'], 'date'],
            [['title', 'description',], 'string', 'max' => 256],
            ['image','image', 'skipOnEmpty' => true, 'maxSize' => 2 * pow(2, 20)],
            [['published_at'], 'default', 'value' => null]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
            'published_at' => 'Published At',
            'image' => 'Image',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'user_id' => 'User ID',
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * Gets query for [[BookHasAuthors]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBookHasAuthors()
    {
        return $this->hasMany(BookHasAuthor::className(), ['Book_id' => 'id']);
    }

    /**
     * Gets query for [[Authors]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAuthors()
    {
        return $this->hasMany(Author::className(), ['id' => 'author_id'])->viaTable('book_has_author', ['Book_id' => 'id']);
    }

    /**
     * Gets query for [[BookHasTags]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBookHasTags()
    {
        return $this->hasMany(BookHasTag::className(), ['Book_id' => 'id']);
    }

    /**
     * Gets query for [[Tags]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTags()
    {
        return $this->hasMany(Tag::className(), ['id' => 'tag_id'])->viaTable('book_has_tag', ['Book_id' => 'id']);
    }

    public function beforeSave($insert)
    {
        $this->published_at = strtotime($this->published_at);
        return parent::beforeSave($insert);
    }

    public function afterSave($insert, $changedAttributes)
   {
       parent::afterSave($insert, $changedAttributes);

       $this->unlinkAll('authors', true);
       $this->unlinkAll('tags', true);

       $author1 = Author::findOne($this->author1);
       $author2 = Author::findOne($this->author2);
       $author3 = Author::findOne($this->author3);
       $author4 = Author::findOne($this->author4);
       $author5 = Author::findOne($this->author5);
       if ($author1)
           $this->link('authors', $author1);
       if ($author2)
           $this->link('authors', $author2);
       if ($author3)
           $this->link('authors', $author3);
       if ($author4)
           $this->link('authors', $author4);
       if ($author5)
           $this->link('authors', $author5);

       $tag1 = Tag::findOne($this->tag1);
       $tag2 = Tag::findOne($this->tag2);
       $tag3 = Tag::findOne($this->tag3);
       $tag4 = Tag::findOne($this->tag4);
       $tag5 = Tag::findOne($this->tag5);
       if ($tag1)
           $this->link('tags', $tag1);
       if ($tag2)
           $this->link('tags', $tag2);
       if ($tag3)
           $this->link('tags', $tag3);
       if ($tag4)
           $this->link('tags', $tag4);
       if ($tag5)
           $this->link('tags', $tag5);
   }

    /**
     * this method is for uploading a book picture.
     */
    public function upload()
    {
        try {
            $path = 'uploads/books/book_' . $this->id . '.' . $this->image->extension;
            Image::resize($this->image->tempName, 625, 1000, false)->save($path);
            $this->image = $path;
            return true;
        }
        catch (\Exception $e){
            return false;
        }
    }
}
