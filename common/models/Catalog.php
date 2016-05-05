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
 * @property string $product_description
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
            [['product_name'], 'required'],
            [['product_description'], 'string'],
            [['product_name', 'product_url'], 'string', 'max' => 65],
            [['product_title'], 'string', 'max' => 255],
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
            'product_description' => 'Product Description',
        ];
    }
}
