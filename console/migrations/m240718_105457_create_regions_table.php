<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%regions}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%country}}`
 */
class m240718_105457_create_regions_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%regions}}', [
            'id' => $this->primaryKey(),
            'countryId' => $this->integer()->notNull(),
            'regionName' => $this->string(80)->notNull(),
        ]);

        // creates index for column `countryId`
        $this->createIndex(
            '{{%idx-regions-countryId}}',
            '{{%regions}}',
            'countryId'
        );

        // add foreign key for table `{{%country}}`
        $this->addForeignKey(
            '{{%fk-regions-countryId}}',
            '{{%regions}}',
            'countryId',
            '{{%country}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%country}}`
        $this->dropForeignKey(
            '{{%fk-regions-countryId}}',
            '{{%regions}}'
        );

        // drops index for column `countryId`
        $this->dropIndex(
            '{{%idx-regions-countryId}}',
            '{{%regions}}'
        );

        $this->dropTable('{{%regions}}');
    }
}
