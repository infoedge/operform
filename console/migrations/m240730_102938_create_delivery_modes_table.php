<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%delivery_modes}}`.
 */
class m240730_102938_create_delivery_modes_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%delivery_modes}}', [
            'id' => $this->primaryKey(),
            'deliveryTypeName' => $this->string(30)->unique()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%delivery_modes}}');
    }
}
