<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%category}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%category}}`
 * - `{{%user}}`
 */
class m240811_070110_create_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%category}}', [
            'id' => $this->primaryKey(),
            'categoryName' => $this->string(40)->unique()->notNull(),
            'parentCat' => $this->integer()->defaultValue(0),
            'categoryDescription' => $this->text(),
            'catOrder' => $this->integer()->notNull()->defaultValue(0),
            'featured' => $this->smallInteger()->defaultValue(0),
            'recordBy' => $this->integer()->notNull(),
            'recordDate' => $this->timestamp()->notNull(),
            'updatedBy' => $this->integer(),
            'updateDate' => $this->datetime(),
        ]);

        // creates index for column `parentCat`
        $this->createIndex(
            '{{%idx-category-parentCat}}',
            '{{%category}}',
            'parentCat'
        );

        // add foreign key for table `{{%category}}`
        $this->addForeignKey(
            '{{%fk-category-parentCat}}',
            '{{%category}}',
            'parentCat',
            '{{%category}}',
            'id',
            'CASCADE'
        );
        ///////////////////////
        // creates index for column `recordBy`
        $this->createIndex(
            '{{%idx-category-recordBy}}',
            '{{%category}}',
            'recordBy'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-category-recordBy}}',
            '{{%category}}',
            'recordBy',
            '{{%user}}',
            'id',
            'CASCADE'
        );
        //////////////////////

        // creates index for column `updatedBy`
        $this->createIndex(
            '{{%idx-category-updatedBy}}',
            '{{%category}}',
            'updatedBy'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-category-updatedBy}}',
            '{{%category}}',
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
        // drops foreign key for table `{{%category}}`
        $this->dropForeignKey(
            '{{%fk-category-parentCat}}',
            '{{%category}}'
        );

        // drops index for column `parentCat`
        $this->dropIndex(
            '{{%idx-category-parentCat}}',
            '{{%category}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-category-updatedBy}}',
            '{{%category}}'
        );

        // drops index for column `updatedBy`
        $this->dropIndex(
            '{{%idx-category-updatedBy}}',
            '{{%category}}'
        );

        $this->dropTable('{{%category}}');
    }
}
