<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Categories;
use zxbodya\yii2\galleryManager\GalleryManager;
use dosamigos\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model common\models\Catalog */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="catalog-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'product_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'product_url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'product_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'product_description')->widget(CKEditor::className(), [ 'preset' => 'basic' ]) ?>

    <?= $form->field($model, 'category_list')->dropDownList(Categories::listAll(), ['multiple' => true]) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>


    <?php

    if ($model->isNewRecord) {
        echo 'Не могу загрузить изображения для нового товара.';
    } else {
        echo GalleryManager::widget(
            [
                'model' => $model,
                'behaviorName' => 'galleryBehavior',
                'apiRoute' => 'catalog/galleryApi'
            ]
        );
    }

    ?>




    <?php ActiveForm::end(); ?>

</div>
