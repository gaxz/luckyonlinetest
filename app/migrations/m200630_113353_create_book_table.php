<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%book}}`.
 */
class m200630_113353_create_book_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%book}}', [
            'id' => $this->primaryKey(),
            'type' => $this->tinyInteger(),
            'name' => $this->string(),
            'tirage' => $this->integer(),
        ]);

        $this->createTable('{{%category}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
        ]);

        $this->createTable('{{%book_category}}', [
            'book_id' => $this->integer()->notNull(),
            'category_id' => $this->integer()->notNull(),
        ]);
        $this->addPrimaryKey('pk-book_category', '{{%book_category}}', ['book_id', 'category_id']);

        $this->addForeignKey(
            'fk-book_category-category',
            '{{%book_category}}',
            'category_id',
            '{{%category}}',
            'id',
            'CASCADE'
        );
        $this->addForeignKey(
            'fk-book_category-book',
            '{{%book_category}}',
            'book_id',
            '{{%book}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-category-book_category', '{{%category}}');
        $this->dropForeignKey('fk-book-book_category', '{{%book}}');

        $this->dropIndex('idx-book_category', '{{%book_category}}');

        $this->dropTable('{{%book_category}}');
        $this->dropTable('{{%category}}');
        $this->dropTable('{{%book}}');
    }
}
