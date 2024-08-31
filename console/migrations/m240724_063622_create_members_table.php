<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%members}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 * - `{{%country}}`
 * - `{{%towns}}`
 * - `{{%industry}}`
 * - `{{%job_titles}}`
 * - `{{%user}}`
 * - `{{%user}}`
 */
class m240724_063622_create_members_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%members}}', [
            'id' => $this->primaryKey(),
            'userId' => $this->integer()->unique()->notNull(),
            'surname' => $this->string(15)->notNull(),
            'otherNames' => $this->string(30),
            'gender' => $this->string(2)->notNull(),
            'dob' => $this->date()->notNull(),
            'countryId' => $this->integer()->notNull(),
            'townId' => $this->integer()->notNull(),
            'phoneNo' => $this->string(20)->notNull()->unique(),
            'email' => $this->string(100)->notNull()->unique(),
            'industryId' => $this->integer()->notNull(),
            'jobTitleId' => $this->integer()->notNull(),
            'interests' => $this->string(100)->notNull(),
            'recordBy' => $this->integer()->notNull(),
            'recordDate' => $this->timestamp()->notNull(),
            'updatedBy' => $this->integer(),
            'updateDate' => $this->datetime(),
        ]);

        // creates index for column `userId`
        $this->createIndex(
            '{{%idx-members-userId}}',
            '{{%members}}',
            'userId'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-members-userId}}',
            '{{%members}}',
            'userId',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `countryId`
        $this->createIndex(
            '{{%idx-members-countryId}}',
            '{{%members}}',
            'countryId'
        );

        // add foreign key for table `{{%country}}`
        $this->addForeignKey(
            '{{%fk-members-countryId}}',
            '{{%members}}',
            'countryId',
            '{{%country}}',
            'id',
            'CASCADE'
        );

        // creates index for column `townId`
        $this->createIndex(
            '{{%idx-members-townId}}',
            '{{%members}}',
            'townId'
        );

        // add foreign key for table `{{%towns}}`
        $this->addForeignKey(
            '{{%fk-members-townId}}',
            '{{%members}}',
            'townId',
            '{{%towns}}',
            'id',
            'CASCADE'
        );

        // creates index for column `industryId`
        $this->createIndex(
            '{{%idx-members-industryId}}',
            '{{%members}}',
            'industryId'
        );

        // add foreign key for table `{{%industry}}`
        $this->addForeignKey(
            '{{%fk-members-industryId}}',
            '{{%members}}',
            'industryId',
            '{{%industry}}',
            'id',
            'CASCADE'
        );

        // creates index for column `jobTitleId`
        $this->createIndex(
            '{{%idx-members-jobTitleId}}',
            '{{%members}}',
            'jobTitleId'
        );

        // add foreign key for table `{{%job_titles}}`
        $this->addForeignKey(
            '{{%fk-members-jobTitleId}}',
            '{{%members}}',
            'jobTitleId',
            '{{%job_titles}}',
            'id',
            'CASCADE'
        );

        // creates index for column `recordBy`
        $this->createIndex(
            '{{%idx-members-recordBy}}',
            '{{%members}}',
            'recordBy'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-members-recordBy}}',
            '{{%members}}',
            'recordBy',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `updatedBy`
        $this->createIndex(
            '{{%idx-members-updatedBy}}',
            '{{%members}}',
            'updatedBy'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-members-updatedBy}}',
            '{{%members}}',
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
        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-members-userId}}',
            '{{%members}}'
        );

        // drops index for column `userId`
        $this->dropIndex(
            '{{%idx-members-userId}}',
            '{{%members}}'
        );

        // drops foreign key for table `{{%country}}`
        $this->dropForeignKey(
            '{{%fk-members-countryId}}',
            '{{%members}}'
        );

        // drops index for column `countryId`
        $this->dropIndex(
            '{{%idx-members-countryId}}',
            '{{%members}}'
        );

        // drops foreign key for table `{{%towns}}`
        $this->dropForeignKey(
            '{{%fk-members-townId}}',
            '{{%members}}'
        );

        // drops index for column `townId`
        $this->dropIndex(
            '{{%idx-members-townId}}',
            '{{%members}}'
        );

        // drops foreign key for table `{{%industry}}`
        $this->dropForeignKey(
            '{{%fk-members-industryId}}',
            '{{%members}}'
        );

        // drops index for column `industryId`
        $this->dropIndex(
            '{{%idx-members-industryId}}',
            '{{%members}}'
        );

        // drops foreign key for table `{{%job_titles}}`
        $this->dropForeignKey(
            '{{%fk-members-jobTitleId}}',
            '{{%members}}'
        );

        // drops index for column `jobTitleId`
        $this->dropIndex(
            '{{%idx-members-jobTitleId}}',
            '{{%members}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-members-recordBy}}',
            '{{%members}}'
        );

        // drops index for column `recordBy`
        $this->dropIndex(
            '{{%idx-members-recordBy}}',
            '{{%members}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-members-updatedBy}}',
            '{{%members}}'
        );

        // drops index for column `updatedBy`
        $this->dropIndex(
            '{{%idx-members-updatedBy}}',
            '{{%members}}'
        );

        $this->dropTable('{{%members}}');
    }
}
