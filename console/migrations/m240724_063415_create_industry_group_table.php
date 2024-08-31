<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%industry_group}}`.
 */
class m240724_063415_create_industry_group_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%industry_group}}', [
            'id' => $this->primaryKey(),
            'grpName' => $this->string(20)->unique()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%industry_group}}');
    }
}
