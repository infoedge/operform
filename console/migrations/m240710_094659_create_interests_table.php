<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%interests}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%interest_groups}}`
 * - `{{%user}}`
 */
class m240710_094659_create_interests_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%interests}}', [
            'id' => $this->primaryKey(),
            'interestGroupId' => $this->integer()->defaultValue(0),
            'interestName' => $this->string(30)->notNull(),
            'startDate' => $this->date()->notNull(),
            'endDate' => $this->date(),
            'recordBy' => $this->integer()->notNull(),
            'recordDate' => $this->timestamp()->notNull(),
        ]);

        // creates index for column `interestGroupId`
        $this->createIndex(
            '{{%idx-interests-interestGroupId}}',
            '{{%interests}}',
            'interestGroupId'
        );

        // add foreign key for table `{{%interest_groups}}`
        $this->addForeignKey(
            '{{%fk-interests-interestGroupId}}',
            '{{%interests}}',
            'interestGroupId',
            '{{%interest_groups}}',
            'id',
            'CASCADE'
        );

        // creates index for column `recordBy`
        $this->createIndex(
            '{{%idx-interests-recordBy}}',
            '{{%interests}}',
            'recordBy'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-interests-recordBy}}',
            '{{%interests}}',
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
        // drops foreign key for table `{{%interest_groups}}`
        $this->dropForeignKey(
            '{{%fk-interests-interestGroupId}}',
            '{{%interests}}'
        );

        // drops index for column `interestGroupId`
        $this->dropIndex(
            '{{%idx-interests-interestGroupId}}',
            '{{%interests}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-interests-recordBy}}',
            '{{%interests}}'
        );

        // drops index for column `recordBy`
        $this->dropIndex(
            '{{%idx-interests-recordBy}}',
            '{{%interests}}'
        );

        $this->dropTable('{{%interests}}');
    }
}
