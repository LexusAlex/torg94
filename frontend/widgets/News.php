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

    /**
     * @return string
     */
    public function run()
    {
        $news = Record::find()->where(['status'=> 1,'tid'=> 1])->with(['t','categories'])->andWhere('date <= NOW() + INTERVAL 2 HOUR')->orderBy('date DESC')->asArray()->limit(5)->all();
        //var_dump($news[0]['date'] <= date('Y-m-d H:i:s',time()));

        return $this->render('news',['news'=>$news]);
    }
}