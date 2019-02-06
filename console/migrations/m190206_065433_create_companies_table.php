<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%companies}}`.
 */
class m190206_065433_create_companies_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%companies}}', [
            'company_id' => $this->primaryKey(),
            'company_name' => $this->string()->notNull()->unique(),
            'company_email' => $this->string()->notNull()->unique(),
            'company_address' => $this->text()->notNull(),
            'company_created_date' => $this->dateTime(),
            'company_status' => "ENUM('active', 'inactive')",//$this->ENUM('active', 'inactive'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%companies}}');
    }
}
