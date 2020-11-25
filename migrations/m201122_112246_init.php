<?php

use yii\db\Migration;

/**
 * Class m201122_112246_init
 */
class m201122_112246_init extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        //users
        $this->createTable('user', [
            'id' => $this->primaryKey(),
            'username' => $this->string(60)->notNull()->unique(),
            'password' => $this->string(256)->notNull(),
            'role' => $this->smallInteger(),
            'authKey' => $this->string(256)->notNull(),
            'accessToken' => $this->string(256)->notNull()
        ]);
        $this->createIndex('ind_user_id', 'user', 'id');

        //books
        $this->createTable('book', [
            'id' => $this->primaryKey(),
            'title' => $this->string(256)->notNull(),
            'description' => $this->string(256)->notNull(),
            'published_at' =>  $this->integer(11)->notNull(),
            'image' => $this->string(256),
            'created_at' => $this->integer(11)->notNull(),
            'updated_at' => $this->integer(11)->notNull(),
            'created_by' => $this->integer()->notNull()
        ]);
        $this->createIndex('ind_book_id', 'book', 'id');
        $this->createIndex('ind_book_user_id', 'book', 'created_by');
        $this->addForeignKey('fk_book_user', 'book', 'created_by', 'user', 'id');

        //authors
        $this->createTable('author', [
            'id' => $this->primaryKey(),
            'full_name' => $this->string(256)->notNull(),
            'birth_date' => $this->integer(11)->notNull(),
            'death_date' => $this->integer(11),
            'image' => $this->string(256),
            'description' => $this->string(256)->notNull()
        ]);
        $this->createIndex('ind_auth_id', 'author', 'id');

        //tags
        $this->createTable('tag', [
            'id' => $this->primaryKey(),
            'name' => $this->string(256)->notNull(),
            'description' => $this->string(256)->notNull()
        ]);
        $this->createIndex('ind_tag_id', 'tag', 'id');

        //author_book
        $this->createTable('author_book', [
            'author_id' => $this->integer()->notNull(),
            'book_id' => $this->integer()->notNull(),
        ]);
        $this->createIndex('ind_auth_book_auth_id', 'author_book', 'author_id');
        $this->createIndex('ind_auth_book_book_id', 'author_book', 'book_id');
        $this->addForeignKey('fk_auth_book_auth', 'author_book', 'author_id', 'author', 'id');
        $this->addForeignKey('fk_auth_book_book', 'author_book', 'book_id', 'book', 'id');

        //book_tag
        $this->createTable('book_tag', [
            'tag_id' => $this->integer()->notNull(),
            'book_id' => $this->integer()->notNull(),
        ]);
        $this->createIndex('ind_book_tag_tag_id', 'book_tag', 'tag_id');
        $this->createIndex('ind_book_tag_book_id', 'book_tag', 'book_id');
        $this->addForeignKey('fk_book_tag_auth', 'book_tag', 'tag_id', 'tag', 'id');
        $this->addForeignKey('fk_book_tag_book', 'book_tag', 'book_id', 'book', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_book_tag_book', 'book_tag');
        $this->dropForeignKey('fk_book_tag_auth', 'book_tag');
        $this->dropForeignKey('fk_auth_book_auth', 'author_book');
        $this->dropForeignKey('fk_auth_book_book', 'author_book');
        $this->dropForeignKey('fk_book_user', 'book');
        $this->dropIndex('ind_book_tag_book_id', 'book_tag');
        $this->dropIndex('ind_book_tag_tag_id', 'book_tag');
        $this->dropIndex('ind_auth_book_book_id', 'author_book');
        $this->dropIndex('ind_auth_book_auth_id', 'author_book');
        $this->dropIndex('ind_tag_id', 'tag');
        $this->dropIndex('ind_auth_id', 'author');
        $this->dropIndex('ind_book_user_id', 'book');
        $this->dropIndex('ind_book_id', 'book');
        $this->dropIndex('ind_user_id', 'user');
        $this->dropTable('user');
        $this->dropTable('book');
        $this->dropTable('author');
        $this->dropTable('author_book');
        $this->dropTable('tag');
        $this->dropTable('book_tag');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201122_112246_init cannot be reverted.\n";

        return false;
    }
    */
}
