<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "catalog".
 *
 * @property integer $id
 * @property string $product_name
 * @property string $product_url
 * @property string $product_title
 */
class Catalog extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'catalog';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_name', 'product_url', 'product_title'], 'required'],
            [['product_name', 'product_url', 'product_title'], 'string', 'max' => 65],
            [['product_name'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_name' => 'Product Name',
            'product_url' => 'Product Url',
            'product_title' => 'Product Title',
        ];
    }
}
