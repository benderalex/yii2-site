<?php

use yii\db\Migration;

class m160704_092350_products_in_category extends Migration
{
    public function up()
    {

        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('products_in_category', [
            'product_id' => "MEDIUMINT(8)",
            'category_id' => "MEDIUMINT(8)",
        ]);
        $this->createIndex('index_product_id_category_id', 'products_in_category', ['product_id', 'category_id']);



    }

    public function down()
    {
        echo "m160704_092350_products_in_category cannot be reverted.\n";

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
