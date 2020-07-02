<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%access_log}}`.
 */
class m200702_103137_create_access_log_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%access_log}}', [
            'id' => $this->primaryKey(),
            'created_at' => $this->dateTime()->defaultExpression('NOW()'),
            'status' => $this->tinyInteger()
        ]);

        $this->createIndex('idx-access_log-created_at', '{{%access_log}}', 'created_at');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex('idx-access_log-created_at', '{{%access_log}}');
        $this->dropTable('{{%access_log}}');
    }
}
