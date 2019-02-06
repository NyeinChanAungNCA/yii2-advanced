<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%departments}}`.
 */
class m190206_065600_create_departments_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%departments}}', [
            'department_id' => $this->primaryKey(),
            'companies_company_id' => $this->integer()->notNull(),
            'branches_branch_id' => $this->integer()->notNull(),
            'department_name' => $this->string()->notNull()->unique(),
            'department_created_date' => $this->dateTime(),
            'department_status' => "ENUM('active', 'inactive')",
        ]);

        // add foreign key for table `companies`
        $this->addForeignKey(
            'fk-departments-companies_company_id',
            'departments',
            'companies_company_id',
            'companies',
            'company_id',
            'CASCADE'
        );
        // add foreign key for table `branches`
        $this->addForeignKey(
            'fk-departments-branches_branch_id',
            'departments',
            'branches_branch_id',
            'branches',
            'branch_id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%departments}}');
    }
}
