<?php

namespace backend\controllers;

use Yii;
use backend\models\Record;
use backend\models\RecordSearch;
use yii\filters\AccessControl;
use yii\helpers\FileHelper;
use yii\helpers\Json;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * RecordController implements the CRUD actions for Record model.
 */
class RecordController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'allow' => false,
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Record models.
     * @return mixed
     */
    public function actionIndex()
    {
        \Yii::$container->set('yii\widgets\LinkPager', [
            'registerLinkTags'=> true,
            'firstPageLabel' => 'Первая',
            'lastPageLabel' => 'Последняя',
            //'nextPageLabel' => 'Следующая',
            //'prevPageLabel' => 'Предыдущая',
            //'maxButtonCount' => 5,
        ]);
        $searchModel = new RecordSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Record model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Record model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Record();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Record model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Record model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Record model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Record the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Record::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionUpload()
    {
        $model = new Record();
        if (!$model) {
            throw new NotFoundHttpException(Yii::t('app', 'Page not found'));
        }

        $imageFile = UploadedFile::getInstance($model,'picture_annotation');
        $directory = \Yii::getAlias('@frontend/web/upload/news_pics') . DIRECTORY_SEPARATOR;
        if (!is_dir($directory)) {
            mkdir($directory);
        }
        if ($imageFile) {
            $uid = uniqid(time(), true);
            $fileName = $uid . '.' . $imageFile->extension;
            $filePath = $directory . $fileName;

            if ($imageFile->saveAs($filePath)) {
                //$model->picture_text = 'news_pics/';
                //$model->update();
                $path = '/upload/news_pics' . DIRECTORY_SEPARATOR . $fileName;
                return Json::encode([
                    "files" => [[
                        "name" => $fileName,
                        "size"=> $imageFile->size,
                        "url" => $path,
                        "thumbnailUrl" => $path,
                        "deleteUrl" => 'image-delete?name=' . $fileName,
                        "deleteType" => "POST"
                    ]]
                ]);
            }
        }
        return '';
    }

    /*public function actionImageDelete($name)
    {
        $directory = \Yii::getAlias('@frontend/web/upload/news_pics') . DIRECTORY_SEPARATOR . Yii::$app->session->id;
        if (is_file($directory . DIRECTORY_SEPARATOR . $name)) {
            unlink($directory . DIRECTORY_SEPARATOR . $name);
        }
        $files = FileHelper::findFiles($directory);
        $output = [];
        foreach ($files as $file){
            $path = '/upload/news_pics' . Yii::$app->session->id . DIRECTORY_SEPARATOR . basename($file);
            $output['files'][] = [
                'name' => basename($file),
                'size' => filesize($file),
                "url" => $path,
                "thumbnailUrl" => $path,
                "deleteUrl" => 'image-delete?name=' . basename($file),
                "deleteType" => "POST"
            ];
        }
        return Json::encode($output);
    }*/
}