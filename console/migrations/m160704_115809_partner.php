<?php

use yii\db\Migration;

class m160704_115809_partner extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%partner}}', [
            'id' => $this->primaryKey(),
            'partner_name' => $this->string(65)->notNull()->unique(),
            'partner_info' => $this->text(),
        ], $tableOptions);

    }

    public function down()
    {
        echo "m160704_115809_partner cannot be reverted.\n";

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
