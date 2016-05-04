<?php

use yii\db\Migration;

class m160504_142733_catalog extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%catalog}}', [
            'id' => $this->primaryKey(),
            'product_name' => $this->string(65)->notNull()->unique(),
            'product_url' => $this->string(65)->notNull(),
            'product_title' => $this->string(65)->notNull(),
            ], $tableOptions);


    }

    public function down()
    {
        echo "m160504_142733_catalog cannot be reverted.\n";

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
