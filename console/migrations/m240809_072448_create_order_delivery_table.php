<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%order_delivery}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%order_item}}`
 * - `{{%towns}}`
 * - `{{%delivery_modes}}`
 * - `{{%user}}`
 */
class m240809_072448_create_order_delivery_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%order_delivery}}', [
            'id' => $this->primaryKey(),
            'orderItemId' => $this->integer()->notNull(),
            'deliveryTown' => $this->integer(),
            'deliveryMode' => $this->integer(),
            'deliveryDate' => $this->datetime(),
            'deliveryAmt' => $this->double()->notNull()->defaultValue(0.0),
            'recordDate' => $this->timestamp()->notNull(),
            'updatedBy' => $this->integer(),
            'updateDate' => $this->datetime(),
        ]);

        // creates index for column `orderItemId`
        $this->createIndex(
            '{{%idx-order_delivery-orderItemId}}',
            '{{%order_delivery}}',
            'orderItemId'
        );

        // add foreign key for table `{{%order_item}}`
        $this->addForeignKey(
            '{{%fk-order_delivery-orderItemId}}',
            '{{%order_delivery}}',
            'orderItemId',
            '{{%order_item}}',
            'id',
            'CASCADE'
        );

        // creates index for column `deliveryTown`
        $this->createIndex(
            '{{%idx-order_delivery-deliveryTown}}',
            '{{%order_delivery}}',
            'deliveryTown'
        );

        // add foreign key for table `{{%towns}}`
        $this->addForeignKey(
            '{{%fk-order_delivery-deliveryTown}}',
            '{{%order_delivery}}',
            'deliveryTown',
            '{{%towns}}',
            'id',
            'CASCADE'
        );

        // creates index for column `deliveryMode`
        $this->createIndex(
            '{{%idx-order_delivery-deliveryMode}}',
            '{{%order_delivery}}',
            'deliveryMode'
        );

        // add foreign key for table `{{%delivery_modes}}`
        $this->addForeignKey(
            '{{%fk-order_delivery-deliveryMode}}',
            '{{%order_delivery}}',
            'deliveryMode',
            '{{%delivery_modes}}',
            'id',
            'CASCADE'
        );

        // creates index for column `updatedBy`
        $this->createIndex(
            '{{%idx-order_delivery-updatedBy}}',
            '{{%order_delivery}}',
            'updatedBy'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-order_delivery-updatedBy}}',
            '{{%order_delivery}}',
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
        // drops foreign key for table `{{%order_item}}`
        $this->dropForeignKey(
            '{{%fk-order_delivery-orderItemId}}',
            '{{%order_delivery}}'
        );

        // drops index for column `orderItemId`
        $this->dropIndex(
            '{{%idx-order_delivery-orderItemId}}',
            '{{%order_delivery}}'
        );

        // drops foreign key for table `{{%towns}}`
        $this->dropForeignKey(
            '{{%fk-order_delivery-deliveryTown}}',
            '{{%order_delivery}}'
        );

        // drops index for column `deliveryTown`
        $this->dropIndex(
            '{{%idx-order_delivery-deliveryTown}}',
            '{{%order_delivery}}'
        );

        // drops foreign key for table `{{%delivery_modes}}`
        $this->dropForeignKey(
            '{{%fk-order_delivery-deliveryMode}}',
            '{{%order_delivery}}'
        );

        // drops index for column `deliveryMode`
        $this->dropIndex(
            '{{%idx-order_delivery-deliveryMode}}',
            '{{%order_delivery}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-order_delivery-updatedBy}}',
            '{{%order_delivery}}'
        );

        // drops index for column `updatedBy`
        $this->dropIndex(
            '{{%idx-order_delivery-updatedBy}}',
            '{{%order_delivery}}'
        );

        $this->dropTable('{{%order_delivery}}');
    }
}
