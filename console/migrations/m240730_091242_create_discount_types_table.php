<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%discount_types}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 */
class m240730_091242_create_discount_types_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%discount_types}}', [
            'id' => $this->primaryKey(),
            'discountTypeName' => $this->string(30)->notNull(),
            'discountAmtPC' => $this->double()->notNull()->defaultValue(0.0),
            'recordBy' => $this->integer()->notNull(),
            'recordDate' => $this->timestamp()->notNull(),
        ]);

        // creates index for column `recordBy`
        $this->createIndex(
            '{{%idx-discount_types-recordBy}}',
            '{{%discount_types}}',
            'recordBy'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-discount_types-recordBy}}',
            '{{%discount_types}}',
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
        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-discount_types-recordBy}}',
            '{{%discount_types}}'
        );

        // drops index for column `recordBy`
        $this->dropIndex(
            '{{%idx-discount_types-recordBy}}',
            '{{%discount_types}}'
        );

        $this->dropTable('{{%discount_types}}');
    }
}
