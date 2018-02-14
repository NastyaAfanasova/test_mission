<?php

use yii\db\Migration;

/**
 * Handles the creation of table `doctor_specialty`.
 */
class m180212_122714_create_doctor_specialty_table extends Migration
{
    protected $tableName = '{{%doctor_specialty}}';
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable($this->tableName, [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer()
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
