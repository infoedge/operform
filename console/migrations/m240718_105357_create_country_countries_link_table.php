<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%country_countries_link}}`.
 */
class m240718_105357_create_country_countries_link_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%country_countries_link}}', [
            'id' => $this->primaryKey(),
            'countryName' => $this->string(80)->notNull(),
            'symbol' => $this->string(3),
            'novelId' => $this->integer()->notNull(),
            'oldId' => $this->Integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%country_countries_link}}');
    }
}
