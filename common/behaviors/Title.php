<?php

namespace common\behaviors;

use yii;
use yii\base\Behavior;
use yii\db\ActiveRecord;

class Title extends Behavior {

    public $in_attribute = 'product_name';
    public $out_attribute = 'product_title';


    public function events()
    {
       return [
        ActiveRecord::EVENT_BEFORE_VALIDATE => 'getTitle',
        ];
    }


    public function getTitle() {
        if (empty($this->owner->{$this->out_attribute})) {
            $this->owner->{$this->out_attribute} = $this->owner->{$this->in_attribute};
        }



    }


}