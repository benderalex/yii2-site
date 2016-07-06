<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "categories".
 *
 * @property integer $id
 * @property string $category_name
 * @property string $category_url
 * @property string $page_title
 * @property string $category_title
 */
class Categories extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'categories';
    }

    public static function listAll($keyField = 'id', $valueField = 'category_name', $asArray = true)
    {
        $query = static::find();
        if ($asArray) {
            $query->select([$keyField, $valueField])->asArray();
        }

        return ArrayHelper::map($query->all(), $keyField, $valueField);
    }




    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_name'], 'required'],
            [['category_name', 'category_url', 'page_title', 'category_title'], 'string', 'max' => 65],
            [['category_name'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_name' => 'Category Name',
            'category_url' => 'Category Url',
            'page_title' => 'Page Title',
            'category_title' => 'Category Title',
        ];
    }


    public function getProducts()
    {
        return $this->hasMany(Catalog::className(),['id' => 'product_id'])
            ->viaTable('products_in_category',['category_id' => 'id']);
    }


    public function behaviors()
    {
        return [
            'setURLTranslitIfEmpty' => [
                'class' => 'common\behaviors\Slug',
                'in_attribute' => 'category_name',
                'out_attribute' => 'category_url',
                'translit' => true
            ],

            'setPageTitleIfEmpty' => [
                'class' => 'common\behaviors\Title',
                'in_attribute' => 'category_name',
                'out_attribute' => 'page_title',
            ],

            'setCategoryTitleIfEmpty' => [
                'class' => 'common\behaviors\Title',
                'in_attribute' => 'category_name',
                'out_attribute' => 'category_title',
            ],
        ];

    }


}
