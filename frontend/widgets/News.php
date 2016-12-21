<?php

namespace frontend\widgets;

use backend\models\Record;
use yii\base\Widget;
use yii\helpers\Html;

class News extends Widget
{
    public $message;

    public function init()
    {
        parent::init();

    }

    public function run()
    {
        $news = Record::find()->where(['status'=> 1,'tid'=> 1])->with(['t'])->orderBy('date DESC')->asArray()->limit(5)->all();

        return $this->render('news',['news'=>$news]);
    }
}