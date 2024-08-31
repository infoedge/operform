<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%article_display}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%category}}`
 */
class m240811_073705_create_article_display_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%article_display}}', [
            'id' => $this->primaryKey(),
            'catId' => $this->integer()->notNull()->unique(),
            'leadingArticles' => $this->integer()->notNull()->defaultValue(1),
            'cols' => $this->integer()->notNull()->defaultValue(2),
            'articleRows' => $this->integer()->notNull()->defaultValue(2),
            'linkRows' => $this->integer()->notNull()->defaultValue(4),
            'articleOrder' => $this->integer()->notNull()->defaultValue(1),
        ]);

        // creates index for column `catId`
        $this->createIndex(
            '{{%idx-article_display-catId}}',
            '{{%article_display}}',
            'catId'
        );

        // add foreign key for table `{{%category}}`
        $this->addForeignKey(
            '{{%fk-article_display-catId}}',
            '{{%article_display}}',
            'catId',
            '{{%category}}',
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
            '{{%fk-article_display-catId}}',
            '{{%article_display}}'
        );

        // drops index for column `catId`
        $this->dropIndex(
            '{{%idx-article_display-catId}}',
            '{{%article_display}}'
        );

        $this->dropTable('{{%article_display}}');
    }
}
