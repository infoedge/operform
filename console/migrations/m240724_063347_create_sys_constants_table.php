<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%sys_constants}}`.
 */
class m240724_063347_create_sys_constants_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%sys_constants}}', [
            'id' => $this->primaryKey(),
            'constantName' => $this->string(30)->notNull()->unique(),
            'constantValue' => $this->integer()->notNull(),
            'description' => $this->string(100),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%sys_constants}}');
    }
}
