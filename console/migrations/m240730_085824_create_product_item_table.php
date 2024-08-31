<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product_item}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%product_type}}`
 * - `{{%packing_types}}`
 * - `{{%user}}`
 */
class m240730_085824_create_product_item_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%product_item}}', [
            'id' => $this->primaryKey(),
            'productName' => $this->string(150)->notNull(),
            'productTypeId' => $this->integer()->notNull(),
            'producer' => $this->string(30),
            'packingId' => $this->integer()->notNull(),
            'code' => $this->string(50),
            'version' => $this->string(20)->notNull(),
            'description' => $this->string(255),
            'hasExpiry' => $this->integer()->notNull()->defaultValue(0),
            'expiryPeriod' => $this->integer()->notNull()->defaultValue(0),
            'recordBy' => $this->integer()->notNull(),
            'recordDate' => $this->timestamp()->notNull(),
        ]);

        // creates index for column `productTypeId`
        $this->createIndex(
            '{{%idx-product_item-productTypeId}}',
            '{{%product_item}}',
            'productTypeId'
        );

        // add foreign key for table `{{%product_type}}`
        $this->addForeignKey(
            '{{%fk-product_item-productTypeId}}',
            '{{%product_item}}',
            'productTypeId',
            '{{%product_type}}',
            'id',
            'CASCADE'
        );

        // creates index for column `packingId`
        $this->createIndex(
            '{{%idx-product_item-packingId}}',
            '{{%product_item}}',
            'packingId'
        );

        // add foreign key for table `{{%packing_types}}`
        $this->addForeignKey(
            '{{%fk-product_item-packingId}}',
            '{{%product_item}}',
            'packingId',
            '{{%packing_types}}',
            'id',
            'CASCADE'
        );

        // creates index for column `recordBy`
        $this->createIndex(
            '{{%idx-product_item-recordBy}}',
            '{{%product_item}}',
            'recordBy'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-product_item-recordBy}}',
            '{{%product_item}}',
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
        // drops foreign key for table `{{%product_type}}`
        $this->dropForeignKey(
            '{{%fk-product_item-productTypeId}}',
            '{{%product_item}}'
        );

        // drops index for column `productTypeId`
        $this->dropIndex(
            '{{%idx-product_item-productTypeId}}',
            '{{%product_item}}'
        );

        // drops foreign key for table `{{%packing_types}}`
        $this->dropForeignKey(
            '{{%fk-product_item-packingId}}',
            '{{%product_item}}'
        );

        // drops index for column `packingId`
        $this->dropIndex(
            '{{%idx-product_item-packingId}}',
            '{{%product_item}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-product_item-recordBy}}',
            '{{%product_item}}'
        );

        // drops index for column `recordBy`
        $this->dropIndex(
            '{{%idx-product_item-recordBy}}',
            '{{%product_item}}'
        );

        $this->dropTable('{{%product_item}}');
    }
}
