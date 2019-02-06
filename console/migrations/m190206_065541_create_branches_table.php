<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%branches}}`.
 */
class m190206_065541_create_branches_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%branches}}', [
            'branch_id' => $this->primaryKey(),
            'companies_company_id' => $this->integer()->notNull(),
            'branch_name' => $this->string()->notNull()->unique(),
            'branch_address' => $this->text()->notNull(),
            'branch_created_date' => $this->dateTime(),
            'branch_status' => "ENUM('active', 'inactive')",
        ]);

        // add foreign key for table `companies`
        $this->addForeignKey(
            'fk-branches-companies_company_id',
            'branches',
            'companies_company_id',
            'companies',
            'company_id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%branches}}');
    }
}
