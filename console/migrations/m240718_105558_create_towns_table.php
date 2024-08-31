<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%towns}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%regions}}`
 */
class m240718_105558_create_towns_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%towns}}', [
            'id' => $this->primaryKey(),
            'regionId' => $this->integer()->notNull(),
            'townName' => $this->string(80)->notNull(),
            'geoNameId' => $this->string(20),
        ]);

        // creates index for column `regionId`
        $this->createIndex(
            '{{%idx-towns-regionId}}',
            '{{%towns}}',
            'regionId'
        );

        // add foreign key for table `{{%regions}}`
        $this->addForeignKey(
            '{{%fk-towns-regionId}}',
            '{{%towns}}',
            'regionId',
            '{{%regions}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%regions}}`
        $this->dropForeignKey(
            '{{%fk-towns-regionId}}',
            '{{%towns}}'
        );

        // drops index for column `regionId`
        $this->dropIndex(
            '{{%idx-towns-regionId}}',
            '{{%towns}}'
        );

        $this->dropTable('{{%towns}}');
    }
}
