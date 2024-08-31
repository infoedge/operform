<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%exchange_rate}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%country}}`
 * - `{{%user}}`
 * - `{{%user}}`
 */
class m240809_072609_create_exchange_rate_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%exchange_rate}}', [
            'id' => $this->primaryKey(),
            'currencyId' => $this->integer()->notNull(),
            'currencySymbol' => $this->string(5)->notNull(),
            'rateAmt' => $this->double()->notNull()->defaultValue(1.0),
            'startDate' => $this->date()->notNull(),
            'endDate' => $this->date(),
            'recordBy' => $this->integer()->notNull(),
            'recordDate' => $this->timestamp()->notNull(),
            'updatedBy' => $this->integer(),
            'updateDate' => $this->datetime(),
        ]);

        // creates index for column `currencyId`
        $this->createIndex(
            '{{%idx-exchange_rate-currencyId}}',
            '{{%exchange_rate}}',
            'currencyId'
        );

        // add foreign key for table `{{%country}}`
        $this->addForeignKey(
            '{{%fk-exchange_rate-currencyId}}',
            '{{%exchange_rate}}',
            'currencyId',
            '{{%country}}',
            'id',
            'CASCADE'
        );

        // creates index for column `recordBy`
        $this->createIndex(
            '{{%idx-exchange_rate-recordBy}}',
            '{{%exchange_rate}}',
            'recordBy'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-exchange_rate-recordBy}}',
            '{{%exchange_rate}}',
            'recordBy',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `updatedBy`
        $this->createIndex(
            '{{%idx-exchange_rate-updatedBy}}',
            '{{%exchange_rate}}',
            'updatedBy'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-exchange_rate-updatedBy}}',
            '{{%exchange_rate}}',
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
        // drops foreign key for table `{{%country}}`
        $this->dropForeignKey(
            '{{%fk-exchange_rate-currencyId}}',
            '{{%exchange_rate}}'
        );

        // drops index for column `currencyId`
        $this->dropIndex(
            '{{%idx-exchange_rate-currencyId}}',
            '{{%exchange_rate}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-exchange_rate-recordBy}}',
            '{{%exchange_rate}}'
        );

        // drops index for column `recordBy`
        $this->dropIndex(
            '{{%idx-exchange_rate-recordBy}}',
            '{{%exchange_rate}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-exchange_rate-updatedBy}}',
            '{{%exchange_rate}}'
        );

        // drops index for column `updatedBy`
        $this->dropIndex(
            '{{%idx-exchange_rate-updatedBy}}',
            '{{%exchange_rate}}'
        );

        $this->dropTable('{{%exchange_rate}}');
    }
}
