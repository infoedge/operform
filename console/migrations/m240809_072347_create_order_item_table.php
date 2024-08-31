<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%order_item}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%orders}}`
 * - `{{%price_list}}`
 * - `{{%user}}`
 * - `{{%user}}`
 */
class m240809_072347_create_order_item_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%order_item}}', [
            'id' => $this->primaryKey(),
            'ordersId' => $this->integer()->notNull(),
            'priceListId' => $this->integer()->notNull(),
            'quantity' => $this->double()->notNull()->defaultValue(0.0),
            'totalAmt' => $this->double()->notNull()->defaultValue(0.0),
            'isCancelled' => $this->integer()->defaultValue(0),
            'cancelDate' => $this->datetime(),
            'requiresDelivery' => $this->boolean()->notNull()->defaultValue(0),
            'recordBy' => $this->integer()->notNull(),
            'recordDate' => $this->timestamp()->notNull(),
            'updatedBy' => $this->integer(),
            'updateDate' => $this->datetime(),
        ]);

        // creates index for column `ordersId`
        $this->createIndex(
            '{{%idx-order_item-ordersId}}',
            '{{%order_item}}',
            'ordersId'
        );

        // add foreign key for table `{{%orders}}`
        $this->addForeignKey(
            '{{%fk-order_item-ordersId}}',
            '{{%order_item}}',
            'ordersId',
            '{{%orders}}',
            'id',
            'CASCADE'
        );

        // creates index for column `priceListId`
        $this->createIndex(
            '{{%idx-order_item-priceListId}}',
            '{{%order_item}}',
            'priceListId'
        );

        // add foreign key for table `{{%price_list}}`
        $this->addForeignKey(
            '{{%fk-order_item-priceListId}}',
            '{{%order_item}}',
            'priceListId',
            '{{%price_list}}',
            'id',
            'CASCADE'
        );

        // creates index for column `recordBy`
        $this->createIndex(
            '{{%idx-order_item-recordBy}}',
            '{{%order_item}}',
            'recordBy'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-order_item-recordBy}}',
            '{{%order_item}}',
            'recordBy',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `updatedBy`
        $this->createIndex(
            '{{%idx-order_item-updatedBy}}',
            '{{%order_item}}',
            'updatedBy'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-order_item-updatedBy}}',
            '{{%order_item}}',
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
        // drops foreign key for table `{{%orders}}`
        $this->dropForeignKey(
            '{{%fk-order_item-ordersId}}',
            '{{%order_item}}'
        );

        // drops index for column `ordersId`
        $this->dropIndex(
            '{{%idx-order_item-ordersId}}',
            '{{%order_item}}'
        );

        // drops foreign key for table `{{%price_list}}`
        $this->dropForeignKey(
            '{{%fk-order_item-priceListId}}',
            '{{%order_item}}'
        );

        // drops index for column `priceListId`
        $this->dropIndex(
            '{{%idx-order_item-priceListId}}',
            '{{%order_item}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-order_item-recordBy}}',
            '{{%order_item}}'
        );

        // drops index for column `recordBy`
        $this->dropIndex(
            '{{%idx-order_item-recordBy}}',
            '{{%order_item}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-order_item-updatedBy}}',
            '{{%order_item}}'
        );

        // drops index for column `updatedBy`
        $this->dropIndex(
            '{{%idx-order_item-updatedBy}}',
            '{{%order_item}}'
        );

        $this->dropTable('{{%order_item}}');
    }
}
