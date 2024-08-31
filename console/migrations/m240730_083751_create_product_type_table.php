<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product_type}}`.
 */
class m240730_083751_create_product_type_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%product_type}}', [
            'id' => $this->primaryKey(),
            'productTypeName' => $this->string(30)->notNull()->unique(),
            'productCode' => $this->string(5)->unique()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%product_type}}');
    }
}
