<?php

use yii\db\Migration;

/**
 * Class m200701_070152_seed_book_tables
 */
class m200701_070152_seed_book_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $books = [
            [
                'type' => 1,
                'name' => "Book 1",
                'tirage' => 5000
            ],
            [
                'type' => 1,
                'name' => "Book 2",
                'tirage' => 5000
            ],
            [
                'type' => 2,
                'name' => "Book 3",
                'tirage' => 1000
            ],
            [
                'type' => 1,
                'name' => "Book 4",
                'tirage' => 2000
            ],
        ];

        $categories = [
            ['name' => "Cat 1"],
            ['name' => "Cat 2"],
            ['name' => "Cat 3"],
            ['name' => "Cat 4"],
            ['name' => "Cat 5"],
            ['name' => "Cat 6"],
            ['name' => "Cat 7"],
            ['name' => "Cat 8"],
            ['name' => "Cat 9"],
            ['name' => "Cat 10"],
            ['name' => "Cat 11"],
            ['name' => "Cat 12"],
        ];

        $junction = [
            ['book_id' => 1, 'category_id' => 1],
            ['book_id' => 1, 'category_id' => 2],
            ['book_id' => 1, 'category_id' => 3],
            ['book_id' => 1, 'category_id' => 4],
            ['book_id' => 1, 'category_id' => 5],
            ['book_id' => 1, 'category_id' => 6],
            ['book_id' => 1, 'category_id' => 7],
            ['book_id' => 1, 'category_id' => 8],
            ['book_id' => 1, 'category_id' => 9],
            ['book_id' => 1, 'category_id' => 10],
            ['book_id' => 1, 'category_id' => 11],
            ['book_id' => 1, 'category_id' => 12],
            ['book_id' => 2, 'category_id' => 1],
            ['book_id' => 2, 'category_id' => 2],
            ['book_id' => 2, 'category_id' => 3],
            ['book_id' => 2, 'category_id' => 4],
            ['book_id' => 2, 'category_id' => 5],
            ['book_id' => 2, 'category_id' => 6],
            ['book_id' => 2, 'category_id' => 7],
            ['book_id' => 2, 'category_id' => 8],
            ['book_id' => 2, 'category_id' => 9],
            ['book_id' => 2, 'category_id' => 10],
            ['book_id' => 2, 'category_id' => 11],
            ['book_id' => 2, 'category_id' => 12],
            ['book_id' => 3, 'category_id' => 1],
            ['book_id' => 3, 'category_id' => 2],
        ];

        $book = $this->db->createCommand()->batchInsert('book', ['type', 'name', 'tirage'], $books);
        $cat = $this->db->createCommand()->batchInsert('category', ['name'], $categories);
        $book_cat = $this->db->createCommand()->batchInsert('book_category', ['book_id', 'category_id'], $junction);

        return $book->execute() && $cat->execute() && $book_cat->execute();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200701_070152_seed_book_tables cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200701_070152_seed_book_tables cannot be reverted.\n";

        return false;
    }
    */
}
