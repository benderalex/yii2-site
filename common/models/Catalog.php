<?php

namespace common\models;

use Yii;
use zxbodya\yii2\galleryManager\GalleryBehavior;

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

    public $product_category = [];

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
            [['category_list'], 'safe'],
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
            'product_category' => 'Категория ',
        ];
    }


    public function getCategories()
    {
        return $this->hasMany(Categories::className(),['id' => 'category_id'])
                    ->viaTable('products_in_category',['product_id' => 'id']);
    }



    public function behaviors()
    {
        return [
            [
                'class' => \common\behaviors\ManyHasManyBehavior::className(),
                'relations' => [
                    'categories' => 'category_list',
                ],
            ],
            

            'slug' => [
                'class' => 'common\behaviors\Slug',
                'in_attribute' => 'product_name',
                'out_attribute' => 'product_url',
                'translit' => true
            ],

            'title' => [
                'class' => 'common\behaviors\Title',
                'in_attribute' => 'product_name',
                'out_attribute' => 'product_title',
            ],

            'galleryBehavior' => [
                'class' => GalleryBehavior::className(),
                'type' => 'catalog',
                'extension' => 'jpg',
                'directory' => '/var/www/html/yii2-site/uploads/',
                'url' => '/uploads',
                'versions' => [
                    'small' => function ($img) {
                        /** @var \Imagine\Image\ImageInterface $img */
                        return $img
                            ->copy()
                            ->thumbnail(new \Imagine\Image\Box(200, 200));
                    },
                    'medium' => function ($img) {
                        /** @var Imagine\Image\ImageInterface $img */
                        $dstSize = $img->getSize();
                        $maxWidth = 800;
                        if ($dstSize->getWidth() > $maxWidth) {
                            $dstSize = $dstSize->widen($maxWidth);
                        }
                        return $img
                            ->copy()
                            ->resize($dstSize);
                    },
                ]
            ],

        ];
    }
}
