<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%orders}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%members}}`
 * - `{{%user}}`
 * - `{{%user}}`
 */
class m240809_072252_create_orders_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%orders}}', [
            'id' => $this->primaryKey(),
            'memberId' => $this->integer()->notNull(),
            'orderDate' => $this->date()->notNull(),
            'orderAmt' => $this->double()->defaultValue(0.0),
            'requiresDelivery' => $this->boolean()->notNull()->defaultValue(0),
            'recordBy' => $this->integer()->notNull(),
            'recordDate' => $this->timestamp()->notNull(),
            'updatedBy' => $this->integer(),
            'updateDate' => $this->datetime(),
        ]);

        // creates index for column `memberId`
        $this->createIndex(
            '{{%idx-orders-memberId}}',
            '{{%orders}}',
            'memberId'
        );

        // add foreign key for table `{{%members}}`
        $this->addForeignKey(
            '{{%fk-orders-memberId}}',
            '{{%orders}}',
            'memberId',
            '{{%members}}',
            'id',
            'CASCADE'
        );

        // creates index for column `recordBy`
        $this->createIndex(
            '{{%idx-orders-recordBy}}',
            '{{%orders}}',
            'recordBy'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-orders-recordBy}}',
            '{{%orders}}',
            'recordBy',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `updatedBy`
        $this->createIndex(
            '{{%idx-orders-updatedBy}}',
            '{{%orders}}',
            'updatedBy'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-orders-updatedBy}}',
            '{{%orders}}',
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
            '{{%fk-orders-memberId}}',
            '{{%orders}}'
        );

        // drops index for column `memberId`
        $this->dropIndex(
            '{{%idx-orders-memberId}}',
            '{{%orders}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-orders-recordBy}}',
            '{{%orders}}'
        );

        // drops index for column `recordBy`
        $this->dropIndex(
            '{{%idx-orders-recordBy}}',
            '{{%orders}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-orders-updatedBy}}',
            '{{%orders}}'
        );

        // drops index for column `updatedBy`
        $this->dropIndex(
            '{{%idx-orders-updatedBy}}',
            '{{%orders}}'
        );

        $this->dropTable('{{%orders}}');
    }
}
