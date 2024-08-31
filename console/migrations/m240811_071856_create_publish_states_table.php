<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%publish_states}}`.
 */
class m240811_071856_create_publish_states_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%publish_states}}', [
            'id' => $this->primaryKey(),
            'pubStateName' => $this->string(50)->notNull()->unique(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%publish_states}}');
    }
}
