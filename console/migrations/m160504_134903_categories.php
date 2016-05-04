<?php

use yii\db\Migration;

class m160504_134903_categories extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%categories}}', [
            'id' => $this->primaryKey(),
            'category_name' => $this->string(65)->notNull()->unique(),
            'category_url' => $this->string(65)->notNull(),
            'page_title' => $this->string(65)->notNull(),
            'category_title' => $this->string(65)->notNull(),
            ], $tableOptions);

    }

    public function down()
    {
        echo "m160504_134903_categories cannot be reverted.\n";

        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
