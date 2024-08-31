<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%job_titles}}`.
 */
class m240724_063533_create_job_titles_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%job_titles}}', [
            'id' => $this->primaryKey(),
            'titleName' => $this->string(30)->unique()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%job_titles}}');
    }
}
