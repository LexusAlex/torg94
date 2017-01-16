<?php

namespace frontend\controllers;

use backend\models\Record;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;

class NewsController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $this->layout = 'allNews';

        $records = Record::find()->andWhere(['status'=>1,'tid'=>1])->with(['t'])->orderBy('date DESC');
        $dataProvider = new ActiveDataProvider([
            'query' => $records,
            'pagination' => [
                'pageSize' => 6,
                'pageSizeParam' => false,
                'forcePageParam' => false,
                //'route' => 'front/index'
            ],
        ]);
        $newNews = Record::find()
            ->select(['*'])
            ->andWhere(['status'=>1,'tid'=>1])
            //->andWhere(['!=','id',$id])
            ->orderBy('id DESC')
            ->limit(2)
            ->all();

        return $this->render('index',['dataProvider'=>$dataProvider,'newNews'=>$newNews]);
    }

    public function actionViews($id)
    {
        $this->layout = 'oneNews';

        $model = Record::find()
            ->select(['*'])
            ->andWhere(['id'=>$id,'status'=>1,'tid'=>1])
            ->one();

        $newNews = Record::find()
            ->select(['*'])
            ->andWhere(['status'=>1,'tid'=>1])
            ->andWhere(['!=','id',$id])
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