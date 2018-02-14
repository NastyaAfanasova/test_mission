<?php

use yii\db\Migration;

/**
 * Handles the creation of table `request`.
 */
class m180212_122805_create_request_table extends Migration
{
    protected $tableName = '{{%request}}';
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable($this->tableName, [
            'id' => $this->primaryKey(),
            'name' => $this->string(32)->notNull(),
            'surname' => $this->string(32)->notNull(),
            'middle_name' => $this->string(32)->notNull(),
            'email' => $this->string(32)->notNull(),
            'description' => $this->string()->notNull(),
            'date' => $this->dateTime()->notNull(),
            'doctor_specialty_id' => $this->integer(),
            'doctor_science_degree_id' => $this->integer(),
            'paid' => $this->boolean()->defaultValue(false),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer()
        ]);

        $this->addForeignKey(
            'fk-doctor-specialty',
            $this->tableName,
            'doctor_specialty_id',
            '{{%doctor_specialty}}',
            'id',
            'SET NULL'
        );

        $this->addForeignKey(
            'fk-doctor-science-degree',
            $this->tableName,
            'doctor_science_degree_id',
            '{{%doctor_science_degree}}',
            'id',
            'SET NULL'
        );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-doctor-specialty', $this->tableName);
        $this->dropForeignKey('fk-doctor-science-degree', $this->tableName);
        $this->dropTable($this->tableName);
    }
}
