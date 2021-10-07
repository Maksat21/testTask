<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%ticker_adjustments}}`.
 */
class m211007_175719_create_ticker_adjustments_table extends Migration
{
    protected $tableName = '{{%ticker_adjustments}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable($this->tableName, [
            'id' => $this->primaryKey(),
            'ticker_id' => $this->integer(),
            'bap' => $this->money(10,2),
            'bbp' => $this->money(10,2),
            'spread' => $this->money(10,2),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable($this->tableName);
    }
}
