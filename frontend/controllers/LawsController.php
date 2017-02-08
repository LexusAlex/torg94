<?php

namespace frontend\controllers;

use backend\models\Record;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;

class LawsController extends \yii\web\Controller
{

    public function actionViews($id)
    {
        $this->layout = 'oneNews';

        $model = Record::find()
            ->select(['*'])
            ->andWhere(['id'=>$id,'status'=>1,'tid'=>3])->andWhere('date <= NOW() + INTERVAL 2 HOUR')
            ->one();

        $newNews = Record::find()
            ->select(['*'])
            ->andWhere(['status'=>1,'tid'=>1])
            ->andWhere('date <= NOW() + INTERVAL 2 HOUR')
            //->andWhere(['!=','id',$id])
            ->orderBy('id DESC')
            ->limit(4)
            ->all();

        if ($model !== null) {
            return $this->render('views',['model'=>$model,'newNews'=>$newNews]);
        } else {
            throw new NotFoundHttpException(\Yii::t('app', 'The requested article does not exist.'));
        }
    }

}