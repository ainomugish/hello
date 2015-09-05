<?php

namespace app\controllers;

use app\models\Mobile;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use Endroid\QrCode\QrCode;
use RobThree\Auth\TwoFactorAuth;

class SiteController extends Controller
{

public $text= 'http://google.co.ug';
public $size= 200;
public $padding =10;

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
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

    public function actionSay($target = 'World')
    {
        return $this->render('say', ['target' => $target]);
    }
    public function actionQrcode()
    {
        if(isset($_GET['text'])) {

            $size = isset($_GET['size']) ? (int)$_GET['size'] : 200;
            $padding= isset($_GET['padding']) ? $_GET['padding'] : 10;
            //ob_start();
            $qr = new QrCode();
            $qr->setText($_GET['text']);
            $qr->setSize($size);
            $qr->setPadding($padding);
            //ob_get_contents()
            //header ('Content-Type: image/png');
            $qr->render();
            return $this->render('_qr');//,array('text'=>$qr->render,'size'=> $size));

        }
        return $this->render('login');
    }

    public function actionIndex()
    {
        //$tfa = new TwoFactorAuth('MobiSquid');
        //$secret = $tfa->createSecret();
        //$response = Yii::$app->response;
        //$response->data = ['tfa' => $tfa,'secret' => $secret];
        return $this->render('index');
        /*return \Yii::createObject([
            'class' => 'yii\web\Response',
            'format' => \yii\web\Response::FORMAT_JSON,
            'data' => [
                'tfa' => $tfa,
                'secret' => $secret,
            ],
        ]);*/
    }

    public function actionVerify()
    {
        $tfa = new TwoFactorAuth('MobiSquid', 6, 30, 'sha256');
        $result = $tfa->verifyCode($_SESSION['secret'], $_POST['verification']);
        if($result){
            return $this->redirect('/site/login', 301);
            //Yii::$app->response->redirect('/site/login', 302)->send();use any where else besides action
        }
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');


            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }
    public function actionMobile()
    {
        $model = new Mobile();
        if ($model->load(Yii::$app->request->post())) {
            Yii::$app->session->setFlash('contactFormSubmitted');
            $mob=$model->mobile;
            //echo Url::to(['site/qrcode', 'text' => '55kjnbhh', 'size' => 300,'padding' => 10]);

            $this->redirect(\Yii::$app->urlManager->createUrl("site/qrcode?text=$mob",302));
        }
        return $this->render('mobile', [
            'model' => $model,
        ]);
    }

    public function actionAbout()
    {
        return $this->render('about');
    }
}
