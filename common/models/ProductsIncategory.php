<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "products_incategory".
 *
 * @property integer $id
 * @property integer $category_id
 * @property integer $product_id
 */
class ProductsIncategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'products_incategory';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id', 'product_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Category ID',
            'product_id' => 'Product ID',
        ];
    }
}
