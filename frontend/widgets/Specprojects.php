<?php

namespace frontend\widgets;

use backend\models\Record;
use yii\base\Widget;
use yii\helpers\Html;

class Specprojects extends Widget
{
    public $message;

    public function init()
    {
        parent::init();

    }

    /**
     * @return string
     */
    public function run()
    {
        $news = Record::find()->where(['status'=> 1,'tid'=> 9])->with(['t','categories'])->orderBy('date DESC')->asArray()->limit(5)->all();

        return $this->render('specprojects',['news'=>$news]);
    }
}