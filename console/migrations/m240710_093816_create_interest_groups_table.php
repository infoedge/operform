<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%interest_groups}}`.
 */
class m240710_093816_create_interest_groups_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%interest_groups}}', [
            'id' => $this->primaryKey(),
            'groupName' => $this->string(30)->notNull()->unique(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%interest_groups}}');
    }
}
