<?php
namespace backend\controllers;

use backend\models\Subscribe;
use backend\models\SubscribeForm;
use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;

/**
 * Site controller
 */
class SiteController extends Controller
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
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index','information','subscribe'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],

                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionSubscribe()
    {
        $model = new SubscribeForm();
        $count = Subscribe::find()->where('status = 1')->count();
        $mail = Subscribe::find()->where('status = 1')->all();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $messages = [];
            foreach ($mail as $user) {
                $messages[] = Yii::$app->mailer->compose()
                    ->setFrom(['' => Yii::$app->request->post('SubscribeForm')['name']])
                    ->setTo($user->email)
                    ->setSubject(Yii::$app->request->post('SubscribeForm')['subject'])
                    //->setTextBody('Текст сообщения')
                    ->setHtmlBody(Yii::$app->request->post('SubscribeForm')['htmlBody']);
            }
            Yii::$app->mailer->sendMultiple($messages);
            //return $this->render('subscribe',['model'=> $model, 'count'=>$count]);
            return $this->redirect(['site/index']);
        } else {
            return $this->render('subscribe',['model'=> $model, 'count'=>$count]);
        }

    }
    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionInformation()
    {
        return $this->render('information');
    }
}
