<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%article}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%category}}`
 * - `{{%user}}`
 * - `{{%user}}`
 * - `{{%publish_states}}`
 * - `{{%user}}`
 * - `{{%user}}`
 */
class m240811_072149_create_article_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%article}}', [
            'id' => $this->primaryKey(),
            'articleTitle' => $this->string(100)->notNull()->unique(),
            'catId' => $this->integer()->notNull(),
            'articleNarration' => $this->text(),
            'articleIntro' => $this->text(),
            'articleIntroImg' => $this->string(255),
            'publishDate' => $this->datetime()->notNull(),
            'startDate' => $this->datetime()->notNull(),
            'endDate' => $this->datetime(),
            'author' => $this->integer(),
            'editor' => $this->integer(),
            'editDate' => $this->datetime(),
            'published' => $this->integer()->notNull()->defaultValue(1),
            'publisher' => $this->integer(),
            'articleOrder' => $this->integer()->notNull()->defaultValue(0),
            'featured' => $this->smallInteger()->defaultValue(0),
            'recordBy' => $this->integer()->notNull(),
            'recordDate' => $this->timestamp(),
        ]);

        // creates index for column `catId`
        $this->createIndex(
            '{{%idx-article-catId}}',
            '{{%article}}',
            'catId'
        );

        // add foreign key for table `{{%category}}`
        $this->addForeignKey(
            '{{%fk-article-catId}}',
            '{{%article}}',
            'catId',
            '{{%category}}',
            'id',
            'CASCADE'
        );

        // creates index for column `author`
        $this->createIndex(
            '{{%idx-article-author}}',
            '{{%article}}',
            'author'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-article-author}}',
            '{{%article}}',
            'author',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `editor`
        $this->createIndex(
            '{{%idx-article-editor}}',
            '{{%article}}',
            'editor'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-article-editor}}',
            '{{%article}}',
            'editor',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `published`
        $this->createIndex(
            '{{%idx-article-published}}',
            '{{%article}}',
            'published'
        );

        // add foreign key for table `{{%publish_states}}`
        $this->addForeignKey(
            '{{%fk-article-published}}',
            '{{%article}}',
            'published',
            '{{%publish_states}}',
            'id',
            'CASCADE'
        );

        // creates index for column `publisher`
        $this->createIndex(
            '{{%idx-article-publisher}}',
            '{{%article}}',
            'publisher'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-article-publisher}}',
            '{{%article}}',
            'publisher',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `recordBy`
        $this->createIndex(
            '{{%idx-article-recordBy}}',
            '{{%article}}',
            'recordBy'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-article-recordBy}}',
            '{{%article}}',
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
        // drops foreign key for table `{{%category}}`
        $this->dropForeignKey(
            '{{%fk-article-catId}}',
            '{{%article}}'
        );

        // drops index for column `catId`
        $this->dropIndex(
            '{{%idx-article-catId}}',
            '{{%article}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-article-author}}',
            '{{%article}}'
        );

        // drops index for column `author`
        $this->dropIndex(
            '{{%idx-article-author}}',
            '{{%article}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-article-editor}}',
            '{{%article}}'
        );

        // drops index for column `editor`
        $this->dropIndex(
            '{{%idx-article-editor}}',
            '{{%article}}'
        );

        // drops foreign key for table `{{%publish_states}}`
        $this->dropForeignKey(
            '{{%fk-article-published}}',
            '{{%article}}'
        );

        // drops index for column `published`
        $this->dropIndex(
            '{{%idx-article-published}}',
            '{{%article}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-article-publisher}}',
            '{{%article}}'
        );

        // drops index for column `publisher`
        $this->dropIndex(
            '{{%idx-article-publisher}}',
            '{{%article}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-article-recordBy}}',
            '{{%article}}'
        );

        // drops index for column `recordBy`
        $this->dropIndex(
            '{{%idx-article-recordBy}}',
            '{{%article}}'
        );

        $this->dropTable('{{%article}}');
    }
}
