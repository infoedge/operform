<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%invoices}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%orders}}`
 * - `{{%discount_types}}`
 * - `{{%user}}`
 */
class m240809_072544_create_invoices_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%invoices}}', [
            'id' => $this->primaryKey(),
            'orderId' => $this->integer()->notNull(),
            'invoiceDate' => $this->date()->notNull(),
            'discountType' => $this->integer()->notNull(),
            'discountAmt' => $this->double()->defaultValue(0.0)->notNull(),
            'totalAmtDue' => $this->double()->notNull()->defaultValue(0.0),
            'totalAmtPaid' => $this->double()->notNull()->defaultValue(0.0),
            'recordBy' => $this->integer()->notNull(),
            'recordDate' => $this->timestamp()->notNull(),
        ]);

        // creates index for column `orderId`
        $this->createIndex(
            '{{%idx-invoices-orderId}}',
            '{{%invoices}}',
            'orderId'
        );

        // add foreign key for table `{{%orders}}`
        $this->addForeignKey(
            '{{%fk-invoices-orderId}}',
            '{{%invoices}}',
            'orderId',
            '{{%orders}}',
            'id',
            'CASCADE'
        );

        // creates index for column `discountType`
        $this->createIndex(
            '{{%idx-invoices-discountType}}',
            '{{%invoices}}',
            'discountType'
        );

        // add foreign key for table `{{%discount_types}}`
        $this->addForeignKey(
            '{{%fk-invoices-discountType}}',
            '{{%invoices}}',
            'discountType',
            '{{%discount_types}}',
            'id',
            'CASCADE'
        );

        // creates index for column `recordBy`
        $this->createIndex(
            '{{%idx-invoices-recordBy}}',
            '{{%invoices}}',
            'recordBy'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-invoices-recordBy}}',
            '{{%invoices}}',
            'recordBy',
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
        // drops foreign key for table `{{%orders}}`
        $this->dropForeignKey(
            '{{%fk-invoices-orderId}}',
            '{{%invoices}}'
        );

        // drops index for column `orderId`
        $this->dropIndex(
            '{{%idx-invoices-orderId}}',
            '{{%invoices}}'
        );

        // drops foreign key for table `{{%discount_types}}`
        $this->dropForeignKey(
            '{{%fk-invoices-discountType}}',
            '{{%invoices}}'
        );

        // drops index for column `discountType`
        $this->dropIndex(
            '{{%idx-invoices-discountType}}',
            '{{%invoices}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-invoices-recordBy}}',
            '{{%invoices}}'
        );

        // drops index for column `recordBy`
        $this->dropIndex(
            '{{%idx-invoices-recordBy}}',
            '{{%invoices}}'
        );

        $this->dropTable('{{%invoices}}');
    }
}
