<?php

namespace frontend\controllers;

use backend\models\Category;
use backend\models\Record;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;

class ArticlesController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $this->layout = 'allNews';

        $records = Record::find()->andWhere(['status'=>1,'tid'=>2])->with(['t'])->orderBy('date DESC');
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
            ->andWhere(['status'=>1,'tid'=>2])
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
            ->andWhere(['id'=>$id,'status'=>1,'tid'=>2])
            ->one();

        $newNews = Record::find()
            ->select(['*'])
            ->andWhere(['status'=>1,'tid'=>2])
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

    public function actionCustomers()
    {
        $this->layout = 'allNews';

        $records = Category::findOne(1)->getRecords()->andWhere(['status'=>1,'tid'=>2])->orderBy('date DESC');

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
            ->andWhere(['status'=>1,'tid'=>2])
            //->andWhere(['!=','id',$id])
            ->orderBy('id DESC')
            ->limit(2)
            ->all();

        return $this->render('customers',['dataProvider'=>$dataProvider,'newNews'=>$newNews]);
    }
    public function actionSuppliers()
    {
        $this->layout = 'allNews';

        $records = Category::findOne(2)->getRecords()->andWhere(['status'=>1,'tid'=>2])->orderBy('date DESC');

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
            ->andWhere(['status'=>1,'tid'=>2])
            //->andWhere(['!=','id',$id])
            ->orderBy('id DESC')
            ->limit(2)
            ->all();

        return $this->render('suppliers',['dataProvider'=>$dataProvider,'newNews'=>$newNews]);
    }

    public function action44fz()
    {
        $this->layout = 'allNews';

        $records = Category::findOne(3)->getRecords()->andWhere(['status'=>1,'tid'=>2])->orderBy('date DESC');

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
            ->andWhere(['status'=>1,'tid'=>2])
            //->andWhere(['!=','id',$id])
            ->orderBy('id DESC')
            ->limit(2)
            ->all();

        return $this->render('44fz',['dataProvider'=>$dataProvider,'newNews'=>$newNews]);
    }

    public function action223fz()
    {
        $this->layout = 'allNews';

        $records = Category::findOne(4)->getRecords()->andWhere(['status'=>1,'tid'=>2])->orderBy('date DESC');

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
            ->andWhere(['status'=>1,'tid'=>2])
            //->andWhere(['!=','id',$id])
            ->orderBy('id DESC')
            ->limit(2)
            ->all();

        return $this->render('223fz',['dataProvider'=>$dataProvider,'newNews'=>$newNews]);
    }

    public function actionPurchase()
    {
        $this->layout = 'allNews';

        $records = Category::findOne(9)->getRecords()->andWhere(['status'=>1,'tid'=>2])->orderBy('date DESC');

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
            ->andWhere(['status'=>1,'tid'=>2])
            //->andWhere(['!=','id',$id])
            ->orderBy('id DESC')
            ->limit(2)
            ->all();

        return $this->render('purchase',['dataProvider'=>$dataProvider,'newNews'=>$newNews]);
    }

    public function actionServices()
    {
        $this->layout = 'allNews';

        $records = Category::findOne(10)->getRecords()->andWhere(['status'=>1,'tid'=>2])->orderBy('date DESC');

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
            ->andWhere(['status'=>1,'tid'=>2])
            //->andWhere(['!=','id',$id])
            ->orderBy('id DESC')
            ->limit(2)
            ->all();

        return $this->render('services',['dataProvider'=>$dataProvider,'newNews'=>$newNews]);
    }

    public function actionLaw()
    {
        $this->layout = 'allNews';

        $records = Category::findOne(5)->getRecords()->andWhere(['status'=>1,'tid'=>2])->orderBy('date DESC');

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
            ->andWhere(['status'=>1,'tid'=>2])
            //->andWhere(['!=','id',$id])
            ->orderBy('id DESC')
            ->limit(2)
            ->all();

        return $this->render('law',['dataProvider'=>$dataProvider,'newNews'=>$newNews]);
    }

    public function actionWorld()
    {
        $this->layout = 'allNews';

        $records = Category::findOne(6)->getRecords()->andWhere(['status'=>1,'tid'=>2])->orderBy('date DESC');

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
            ->andWhere(['status'=>1,'tid'=>2])
            //->andWhere(['!=','id',$id])
            ->orderBy('id DESC')
            ->limit(2)
            ->all();

        return $this->render('world',['dataProvider'=>$dataProvider,'newNews'=>$newNews]);
    }

    public function actionAnalytics()
    {
        $this->layout = 'allNews';

        $records = Category::findOne(7)->getRecords()->andWhere(['status'=>1,'tid'=>2])->orderBy('date DESC');

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
            ->andWhere(['status'=>1,'tid'=>2])
            //->andWhere(['!=','id',$id])
            ->orderBy('id DESC')
            ->limit(2)
            ->all();

        return $this->render('analytics',['dataProvider'=>$dataProvider,'newNews'=>$newNews]);
    }

    public function actionEvents()
    {
        $this->layout = 'allNews';

        $records = Category::findOne(11)->getRecords()->andWhere(['status'=>1,'tid'=>2])->orderBy('date DESC');

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
            ->andWhere(['status'=>1,'tid'=>2])
            //->andWhere(['!=','id',$id])
            ->orderBy('id DESC')
            ->limit(2)
            ->all();

        return $this->render('events',['dataProvider'=>$dataProvider,'newNews'=>$newNews]);
    }


}