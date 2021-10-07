<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%tickers}}`.
 */
class m211007_171257_create_tickers_table extends Migration
{
    protected $tableName = '{{%tickers}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable($this->tableName, [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'status' => $this->tinyInteger()->defaultValue(1)->notNull(),
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
