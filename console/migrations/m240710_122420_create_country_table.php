<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%country}}`.
 */
class m240710_122420_create_country_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%country}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(75)->unique(),
            'symbol' => $this->string(3)->unique(),
            'currency' => $this->string(50),
            'currencyCode' => $this->string(5),
            'dialCode' => $this->string(10),
            'countryFlag' => $this->string(100),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%country}}');
    }
}
