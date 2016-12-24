<?php

namespace frontend\controllers;

use backend\models\Record;
use yii\data\ActiveDataProvider;

class ArticlesController extends \yii\web\Controller
{
    public function actionIndex()
    {
        \Yii::$container->set('yii\widgets\LinkPager', [
            'registerLinkTags'=> true,
            'options' => ['class' => 'pagination'], //ul
            'pageCssClass'=>'pagination__item', // li
            'firstPageCssClass' => 'pagination__item pagination__item_first', //first
            'prevPageCssClass' =>  'pagination__item pagination__item_prev', // prev
            'nextPageCssClass' =>  'pagination__item pagination__item_next', // next
            'lastPageCssClass' =>  'pagination__item pagination__item_last', // last
            'activePageCssClass' => 'pagination__item_current', // active
            'disabledPageCssClass' => 'pagination__item_disabled', // disabled
            'linkOptions' => ['class'=> 'pagination__link'], //a
            'firstPageLabel' => 'Первая',
            'lastPageLabel' => 'Последняя',
            'nextPageLabel' => 'Следующая',
            'prevPageLabel' => 'Предыдущая',
            //'maxButtonCount' => 5,
        ]);
        $records = Record::find()->andWhere(['status'=>1,'tid'=>1])->with(['t'])->orderBy('date DESC');
        $dataProvider = new ActiveDataProvider([
            'query' => $records,
            'pagination' => [
                //'pageSize' => 2,
                'pageSizeParam' => false,
                'forcePageParam' => false,
                //'route' => 'front/index'
            ],
        ]);
        return $this->render('index',['dataProvider'=>$dataProvider]);
    }

}