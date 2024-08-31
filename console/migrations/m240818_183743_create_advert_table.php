<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%advert}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%members}}`
 * - `{{%ad_antics}}`
 * - `{{%ad_antics}}`
 * - `{{%user}}`
 * - `{{%user}}`
 */
class m240818_183743_create_advert_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%advert}}', [
            'id' => $this->primaryKey(),
            'ownerId' => $this->integer()->notNull(),
            'adTitle' => $this->string(50)->notNull()->unique(),
            'adNarrative' => $this->text(),
            'entranceAnticId' => $this->integer(),
            'outAnticId' => $this->integer(),
            'banner' => $this->string(255),
            'adStartDate' => $this->datetime()->notNull(),
            'adEndDate' => $this->datetime(),
            'recordBy' => $this->integer()->notNull(),
            'recordDate' => $this->timestamp()->notNull(),
            'updatedBy' => $this->integer(),
            'updateDate' => $this->datetime(),
        ]);

        // creates index for column `ownerId`
        $this->createIndex(
            '{{%idx-advert-ownerId}}',
            '{{%advert}}',
            'ownerId'
        );

        // add foreign key for table `{{%members}}`
        $this->addForeignKey(
            '{{%fk-advert-ownerId}}',
            '{{%advert}}',
            'ownerId',
            '{{%members}}',
            'id',
            'CASCADE'
        );

        // creates index for column `entranceAnticId`
        $this->createIndex(
            '{{%idx-advert-entranceAnticId}}',
            '{{%advert}}',
            'entranceAnticId'
        );

        // add foreign key for table `{{%ad_antics}}`
        $this->addForeignKey(
            '{{%fk-advert-entranceAnticId}}',
            '{{%advert}}',
            'entranceAnticId',
            '{{%ad_antics}}',
            'id',
            'CASCADE'
        );

        // creates index for column `outAnticId`
        $this->createIndex(
            '{{%idx-advert-outAnticId}}',
            '{{%advert}}',
            'outAnticId'
        );

        // add foreign key for table `{{%ad_antics}}`
        $this->addForeignKey(
            '{{%fk-advert-outAnticId}}',
            '{{%advert}}',
            'outAnticId',
            '{{%ad_antics}}',
            'id',
            'CASCADE'
        );

        // creates index for column `recordBy`
        $this->createIndex(
            '{{%idx-advert-recordBy}}',
            '{{%advert}}',
            'recordBy'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-advert-recordBy}}',
            '{{%advert}}',
            'recordBy',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `updatedBy`
        $this->createIndex(
            '{{%idx-advert-updatedBy}}',
            '{{%advert}}',
            'updatedBy'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-advert-updatedBy}}',
            '{{%advert}}',
            'updatedBy',
            '{{%user}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%members}}`
        $this->dropForeignKey(
            '{{%fk-advert-ownerId}}',
            '{{%advert}}'
        );

        // drops index for column `ownerId`
        $this->dropIndex(
            '{{%idx-advert-ownerId}}',
            '{{%advert}}'
        );

        // drops foreign key for table `{{%ad_antics}}`
        $this->dropForeignKey(
            '{{%fk-advert-entranceAnticId}}',
            '{{%advert}}'
        );

        // drops index for column `entranceAnticId`
        $this->dropIndex(
            '{{%idx-advert-entranceAnticId}}',
            '{{%advert}}'
        );

        // drops foreign key for table `{{%ad_antics}}`
        $this->dropForeignKey(
            '{{%fk-advert-outAnticId}}',
            '{{%advert}}'
        );

        // drops index for column `outAnticId`
        $this->dropIndex(
            '{{%idx-advert-outAnticId}}',
            '{{%advert}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-advert-recordBy}}',
            '{{%advert}}'
        );

        // drops index for column `recordBy`
        $this->dropIndex(
            '{{%idx-advert-recordBy}}',
            '{{%advert}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-advert-updatedBy}}',
            '{{%advert}}'
        );

        // drops index for column `updatedBy`
        $this->dropIndex(
            '{{%idx-advert-updatedBy}}',
            '{{%advert}}'
        );

        $this->dropTable('{{%advert}}');
    }
}
