<?php

use yii\db\Migration;

/**
 * Class m200702_133023_seed_access_log_table
 */
class m200702_133023_seed_access_log_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        echo "\n Starting seeding access log table...";

        for ($i = 0; $i < 5; $i++) {

            $this->insert100k();

            echo "\n 100k rows has been added";
            sleep(2);
        }

        echo "\n Seeding completed \n";

        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->truncateTable('access_log');

        return true;
    }

    private function insert100k()
    {
        $sql = "INSERT INTO access_log (status)
            SELECT FLOOR((RAND() * (2-1+1))+1)
            FROM
            (
            select a.N + b.N * 10 + c.N * 100 + d.N * 1000 + e.N * 10000 + 1 N
            from (select 0 as N union all select 1 union all select 2 union all select 3 union all select 4 union all select 5 union all select 6 union all select 7 union all select 8 union all select 9) a
                , (select 0 as N union all select 1 union all select 2 union all select 3 union all select 4 union all select 5 union all select 6 union all select 7 union all select 8 union all select 9) b
                , (select 0 as N union all select 1 union all select 2 union all select 3 union all select 4 union all select 5 union all select 6 union all select 7 union all select 8 union all select 9) c
                , (select 0 as N union all select 1 union all select 2 union all select 3 union all select 4 union all select 5 union all select 6 union all select 7 union all select 8 union all select 9) d
                , (select 0 as N union all select 1 union all select 2 union all select 3 union all select 4 union all select 5 union all select 6 union all select 7 union all select 8 union all select 9) e
            ) t";

        return $this->db->createCommand($sql)->execute();
    }
}
