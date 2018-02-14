<?php

use yii\db\Migration;

/**
 * Handles the creation of table `science_degree_lang`.
 */
class m180213_133839_create_science_degree_lang_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('science_degree_lang', [
            'id' => $this->primaryKey(),
            'science_degree_id' => $this->integer()->notNull(),
            'name' => $this->string(255)->notNull(),
            'language' => $this->string(6)->notNull(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer()
        ]);

        $this->addForeignKey(
            'fk-science-degree-lang',
            '{{%science_degree_lang}}',
            'science_degree_id',
            '{{%doctor_science_degree}}',
            'id',
            'CASCADE',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-science-degree-lang', '{{%science_degree_lang}}');
        $this->dropTable('science_degree_lang');
    }
}
