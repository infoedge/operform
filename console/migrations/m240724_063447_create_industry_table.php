<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%industry}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%industry_group}}`
 */
class m240724_063447_create_industry_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%industry}}', [
            'id' => $this->primaryKey(),
            'grpId' => $this->integer(),
            'industryName' => $this->string(30)->unique()->notNull(),
        ]);

        // creates index for column `grpId`
        $this->createIndex(
            '{{%idx-industry-grpId}}',
            '{{%industry}}',
            'grpId'
        );

        // add foreign key for table `{{%industry_group}}`
        $this->addForeignKey(
            '{{%fk-industry-grpId}}',
            '{{%industry}}',
            'grpId',
            '{{%industry_group}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%industry_group}}`
        $this->dropForeignKey(
            '{{%fk-industry-grpId}}',
            '{{%industry}}'
        );

        // drops index for column `grpId`
        $this->dropIndex(
            '{{%idx-industry-grpId}}',
            '{{%industry}}'
        );

        $this->dropTable('{{%industry}}');
    }
}
