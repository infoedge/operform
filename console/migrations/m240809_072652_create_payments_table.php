<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%payments}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%invoices}}`
 * - `{{%payment_modes}}`
 * - `{{%user}}`
 * - `{{%user}}`
 */
class m240809_072652_create_payments_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%payments}}', [
            'id' => $this->primaryKey(),
            'invoiceId' => $this->integer()->notNull(),
            'pmtModeId' => $this->integer()->notNull(),
            'transId' => $this->string(30)->notNull()->unique(),
            'pmtDate' => $this->date()->notNull(),
            'pmtCurrency' => $this->string(5)->notNull(),
            'exchRate' => $this->double()->notNull()->defaultValue(1.0),
            'amtPaid' => $this->double()->notNull()->defaultValue(0.0),
            'recordBy' => $this->integer()->notNull(),
            'recordDate' => $this->timestamp()->notNull(),
            'updatedBy' => $this->integer(),
            'updateDate' => $this->datetime(),
        ]);

        // creates index for column `invoiceId`
        $this->createIndex(
            '{{%idx-payments-invoiceId}}',
            '{{%payments}}',
            'invoiceId'
        );

        // add foreign key for table `{{%invoices}}`
        $this->addForeignKey(
            '{{%fk-payments-invoiceId}}',
            '{{%payments}}',
            'invoiceId',
            '{{%invoices}}',
            'id',
            'CASCADE'
        );

        // creates index for column `pmtModeId`
        $this->createIndex(
            '{{%idx-payments-pmtModeId}}',
            '{{%payments}}',
            'pmtModeId'
        );

        // add foreign key for table `{{%payment_modes}}`
        $this->addForeignKey(
            '{{%fk-payments-pmtModeId}}',
            '{{%payments}}',
            'pmtModeId',
            '{{%payment_modes}}',
            'id',
            'CASCADE'
        );

        // creates index for column `recordBy`
        $this->createIndex(
            '{{%idx-payments-recordBy}}',
            '{{%payments}}',
            'recordBy'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-payments-recordBy}}',
            '{{%payments}}',
            'recordBy',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `updatedBy`
        $this->createIndex(
            '{{%idx-payments-updatedBy}}',
            '{{%payments}}',
            'updatedBy'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-payments-updatedBy}}',
            '{{%payments}}',
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
        // drops foreign key for table `{{%invoices}}`
        $this->dropForeignKey(
            '{{%fk-payments-invoiceId}}',
            '{{%payments}}'
        );

        // drops index for column `invoiceId`
        $this->dropIndex(
            '{{%idx-payments-invoiceId}}',
            '{{%payments}}'
        );

        // drops foreign key for table `{{%payment_modes}}`
        $this->dropForeignKey(
            '{{%fk-payments-pmtModeId}}',
            '{{%payments}}'
        );

        // drops index for column `pmtModeId`
        $this->dropIndex(
            '{{%idx-payments-pmtModeId}}',
            '{{%payments}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-payments-recordBy}}',
            '{{%payments}}'
        );

        // drops index for column `recordBy`
        $this->dropIndex(
            '{{%idx-payments-recordBy}}',
            '{{%payments}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-payments-updatedBy}}',
            '{{%payments}}'
        );

        // drops index for column `updatedBy`
        $this->dropIndex(
            '{{%idx-payments-updatedBy}}',
            '{{%payments}}'
        );

        $this->dropTable('{{%payments}}');
    }
}
