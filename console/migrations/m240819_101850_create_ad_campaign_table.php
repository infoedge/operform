<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%ad_campaign}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%advert}}`
 * - `{{%ad_pay_type}}`
 * - `{{%user}}`
 */
class m240819_101850_create_ad_campaign_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%ad_campaign}}', [
            'id' => $this->primaryKey(),
            'adId' => $this->integer()->notNull(),
            'adPayTypeId' => $this->integer()->notNull(),
            'startDate' => $this->datetime()->notNull(),
            'requestedBy' => $this->integer()->notNull(),
        ]);

        // creates index for column `adId`
        $this->createIndex(
            '{{%idx-ad_campaign-adId}}',
            '{{%ad_campaign}}',
            'adId'
        );

        // add foreign key for table `{{%advert}}`
        $this->addForeignKey(
            '{{%fk-ad_campaign-adId}}',
            '{{%ad_campaign}}',
            'adId',
            '{{%advert}}',
            'id',
            'CASCADE'
        );

        // creates index for column `adPayTypeId`
        $this->createIndex(
            '{{%idx-ad_campaign-adPayTypeId}}',
            '{{%ad_campaign}}',
            'adPayTypeId'
        );

        // add foreign key for table `{{%ad_pay_type}}`
        $this->addForeignKey(
            '{{%fk-ad_campaign-adPayTypeId}}',
            '{{%ad_campaign}}',
            'adPayTypeId',
            '{{%ad_pay_type}}',
            'id',
            'CASCADE'
        );

        // creates index for column `requestedBy`
        $this->createIndex(
            '{{%idx-ad_campaign-requestedBy}}',
            '{{%ad_campaign}}',
            'requestedBy'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-ad_campaign-requestedBy}}',
            '{{%ad_campaign}}',
            'requestedBy',
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
        // drops foreign key for table `{{%advert}}`
        $this->dropForeignKey(
            '{{%fk-ad_campaign-adId}}',
            '{{%ad_campaign}}'
        );

        // drops index for column `adId`
        $this->dropIndex(
            '{{%idx-ad_campaign-adId}}',
            '{{%ad_campaign}}'
        );

        // drops foreign key for table `{{%ad_pay_type}}`
        $this->dropForeignKey(
            '{{%fk-ad_campaign-adPayTypeId}}',
            '{{%ad_campaign}}'
        );

        // drops index for column `adPayTypeId`
        $this->dropIndex(
            '{{%idx-ad_campaign-adPayTypeId}}',
            '{{%ad_campaign}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-ad_campaign-requestedBy}}',
            '{{%ad_campaign}}'
        );

        // drops index for column `requestedBy`
        $this->dropIndex(
            '{{%idx-ad_campaign-requestedBy}}',
            '{{%ad_campaign}}'
        );

        $this->dropTable('{{%ad_campaign}}');
    }
}
