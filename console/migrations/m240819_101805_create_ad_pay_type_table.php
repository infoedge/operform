<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%ad_pay_type}}`.
 */
class m240819_101805_create_ad_pay_type_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%ad_pay_type}}', [
            'id' => $this->primaryKey(),
            'adPayTypeName' => $this->string()->notNull()->unique(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%ad_pay_type}}');
    }
}
