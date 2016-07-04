<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Catalog */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Catalogs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="catalog-view">

    <h1><?= Html::encode($this->title) ?></h1>




    <?php
    foreach($model->getBehavior('galleryBehavior')->getImages() as $image) {
        echo Html::img($image->getUrl('small'));
        echo $image->getUrl('small');
    }


    ?>




</div>
