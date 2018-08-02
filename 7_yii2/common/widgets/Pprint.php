<?php

namespace common\widgets;

use yii\bootstrap\Widget;
use yii\helpers\Html;

class Pprint extends Widget
{
	public $data;

    /**
     * {@inheritdoc}
     */
    public function run()
    {
    	return Html::tag('pre', print_r($this->data, 1));
    }
}
