<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%ad_antics}}`.
 */
class m240815_173513_create_ad_antics_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%ad_antics}}', [
            'id' => $this->primaryKey(),
            'anticName' => $this->string(30),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%ad_antics}}');
    }
}
