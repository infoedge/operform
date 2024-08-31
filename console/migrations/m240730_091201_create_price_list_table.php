<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%price_list}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%product_item}}`
 * - `{{%user}}`
 */
class m240730_091201_create_price_list_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%price_list}}', [
            'id' => $this->primaryKey(),
            'productId' => $this->integer()->notNull(),
            'price' => $this->double()->notNull()->defaultValue(0.0),
            'startDate' => $this->date()->notNull(),
            'endDate' => $this->date(),
            'recordBy' => $this->integer()->notNull(),
            'recordDate' => $this->timestamp()->notNull(),
            'updatedBy' => $this->integer(),
            'updateDate' => $this->datetime(),
        ]);

        // creates index for column `productId`
        $this->createIndex(
            '{{%idx-price_list-productId}}',
            '{{%price_list}}',
            'productId'
        );

        // add foreign key for table `{{%product_item}}`
        $this->addForeignKey(
            '{{%fk-price_list-productId}}',
            '{{%price_list}}',
            'productId',
            '{{%product_item}}',
            'id',
            'CASCADE'
        );

        // creates index for column `recordBy`
        $this->createIndex(
            '{{%idx-price_list-recordBy}}',
            '{{%price_list}}',
            'recordBy'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-price_list-recordBy}}',
            '{{%price_list}}',
            'recordBy',
            '{{%user}}',
            'id',
            'CASCADE'
        );
        /////////////////////////////////////////
        // creates index for column `updatedBy`
        $this->createIndex(
            '{{%idx-price_list-updatedBy}}',
            '{{%price_list}}',
            'updatedBy'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-price_list-updatedBy}}',
            '{{%price_list}}',
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
        // drops foreign key for table `{{%product_item}}`
        $this->dropForeignKey(
            '{{%fk-price_list-productId}}',
            '{{%price_list}}'
        );

        // drops index for column `productId`
        $this->dropIndex(
            '{{%idx-price_list-productId}}',
            '{{%price_list}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-price_list-recordBy}}',
            '{{%price_list}}'
        );

        // drops index for column `recordBy`
        $this->dropIndex(
            '{{%idx-price_list-recordBy}}',
            '{{%price_list}}'
        );

        $this->dropTable('{{%price_list}}');
    }
}
