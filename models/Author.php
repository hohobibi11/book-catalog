<?php

namespace app\models;

use Yii;
use yii\imagine\Image;

/**
 * This is the model class for table "author".
 *
 * @property int $id
 * @property string $full_name
 * @property int $birth_date
 * @property int|null $death_date
 * @property string|null $image
 * @property string $description
 *
 * @property BookHasAuthor[] $bookHasAuthors
 * @property Book[] $books
 */
class Author extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'author';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['full_name', 'birth_date', 'description'], 'required'],
            [['birth_date', 'death_date'], 'date'],
            [['full_name', 'description'], 'string', 'max' => 256],
            ['image', 'image', 'skipOnEmpty' => true, 'maxSize' => 2 * pow(2, 20)]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'full_name' => 'Full Name',
            'birth_date' => 'Birth Date',
            'death_date' => 'Death Date',
            'image' => 'Image',
            'description' => 'Description',
        ];
    }

    /**
     * Gets query for [[BookHasAuthors]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBookHasAuthors()
    {
        return $this->hasMany(BookHasAuthor::className(), ['author_id' => 'id']);
    }

    /**
     * Gets query for [[Books]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBooks()
    {
        return $this->hasMany(Book::className(), ['id' => 'Book_id'])->viaTable('book_has_author', ['author_id' => 'id']);
    }

    /**
     * this method is for uploading an author picture.
     */
    public function upload()
    {
        try {
            $path = 'uploads/authors/author_' . $this->id . '.' . $this->image->extension;
            Image::resize($this->image->tempName, 250, 250, false)->save($path);
            $this->image = $path;
            return true;
        }
        catch (\Exception $e){
            return false;
        }
    }

    public function beforeSave($insert)
    {
        $this->birth_date = strtotime($this->birth_date);
        $this->death_date = strtotime($this->death_date);
        return parent::beforeSave($insert);
    }
}
