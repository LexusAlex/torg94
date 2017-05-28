<?php
namespace frontend\controllers;

use backend\models\Category;
use backend\models\Record;
use backend\models\Subscribe;
use frontend\models\SubscribeForm;
use Yii;
use yii\base\InvalidParamException;
use yii\helpers\VarDumper;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;

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
                'only' => ['logout', 'signup','contact','about'],
                'rules' => [
                    [
                        'actions' => ['logout','signup','contacts','about'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'allow' => false,
                    ]
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
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {

        $categories = Category::find()->where('id in (5,6,7,8,9,10)')->orderBy('name desc')->all();
        $records = [];
        foreach ($categories as $id=>$item){
            $records[] = Record::find()->where(['id'=>$item->last_record_id])->with('categories')->one();
            $records[$id]->cat = $item->name;
        }
        return $this->render('index',['records'=>$records]);
    }

    /**
     * Logs in a user.
     *
     * @return mixed
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

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContacts()
    {

        return $this->render('contacts');
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    public function actionInfographics() {

        $this->layout = 'graphics';

        $newNews = Record::find()
            ->select(['*'])
            ->andWhere(['status'=>1,'tid'=>1])
            //->andWhere(['!=','id',$id])
            ->orderBy('id DESC')
            ->limit(2)
            ->all();

        return $this->render('infographics',['newNews'=>$newNews]);
    }

    public function actionSubscribe()
    {
        $model = new SubscribeForm();
        $subscribe = new Subscribe();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $subscribe->email = Yii::$app->request->post('SubscribeForm')['email'];
            $subscribe->status = 1;
            $subscribe->save();
            Yii::$app->session->setFlash('success', 'Вы были успешно подписаны');
            return $this->render('subscribe',['model'=> $model,]);
        } else {
            return $this->render('subscribe',['model'=> $model,]);
        }

    }

    public function actionUnsubscribe()
    {
        $model = new SubscribeForm();
        $subscribe = new Subscribe();
        if ($model->load(Yii::$app->request->post())) {
                $email = Subscribe::find()->where(['email'=>Yii::$app->request->post('SubscribeForm')['email']])->one();
            if (!empty($email)) {
                $email->delete();
                Yii::$app->session->setFlash('success', 'Вы были успешно отписаны');
                return $this->render('unsubscribe',['model'=> $model,]);
            } else {
                Yii::$app->session->setFlash('danger', 'Ваш email не существует');
                return $this->render('unsubscribe',['model'=> $model,]);
            }

            //return $this->redirect(['site/index']);
        } else {
            return $this->render('unsubscribe',['model'=> $model,]);
        }

    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    /*public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }*/

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    /*public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password was saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }*/
}
