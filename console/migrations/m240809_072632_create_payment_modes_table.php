<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%payment_modes}}`.
 */
class m240809_072632_create_payment_modes_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%payment_modes}}', [
            'id' => $this->primaryKey(),
            'pmtTypeName' => $this->string(30)->notNull(),
            'startDate' => $this->date()->notNull(),
            'endDate' => $this->date(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%payment_modes}}');
    }
}
