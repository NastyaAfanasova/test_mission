<?php

use yii\db\Migration;

/**
 * Handles the creation of table `specialty_lang`.
 */
class m180213_125205_create_specialty_lang_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%specialty_lang}}', [
            'id' => $this->primaryKey(),
            'specialty_id' => $this->integer()->notNull(),
            'name' => $this->string(255)->notNull(),
            'language' => $this->string(6)->notNull(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer()
        ]);

        $this->addForeignKey(
            'fk-specialty-lang',
            '{{%specialty_lang}}',
            'specialty_id',
            '{{%doctor_specialty}}',
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
        $this->dropForeignKey('fk-specialty-lang', '{{%specialty_lang}}');
        $this->dropTable('specialty_lang');
    }
}
