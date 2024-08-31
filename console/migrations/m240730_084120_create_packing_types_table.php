<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%packing_types}}`.
 */
class m240730_084120_create_packing_types_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%packing_types}}', [
            'id' => $this->primaryKey(),
            'packTypeName' => $this->string(30)->notNull()->unique(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%packing_types}}');
    }
}
