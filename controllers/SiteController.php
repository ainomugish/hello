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
use app\models\RelationshipSearch;

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

    /**
     * Search friend Relationships.
     * @return mixed
     */
    public function actionSearch()
    {
        $searchModel = new RelationshipSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionIndex()
    {
        //$tfa = new TwoFactorAuth('MobiSquid');
        //$secret = $tfa->createSecret();
        //$response = Yii::$app->response;
        //$response->data = ['tfa' => $tfa,'secret' => $secret];

        //return $this->render('index',['th'=>$th,]);
        if(Yii::$app->user->isGuest) {
            $th = ' ';
            return $this->render('index',['th'=>$th]);
        } else {
            $id = Yii::$app->user->getId();
            //$url = Url::to(['profile/view', 'id' => $id]);
            //$vw= new ProfileController;
            //$this->render($url);
            $this->redirect(array('profile/view', 'id' => $id));
            //$this->redirect(<contoroller>/<action>)
		}
        /*return \Yii::createObject([
            'class' => 'yii\web\Response',
            'format' => \yii\web\Response::FORMAT_JSON,
            'data' => [
                'tfa' => $tfa,
                'secret' => $secret,
            ],
        ]);*/
    }



    public function actionChat1()
    {
        return $this->render('chat1');

    }

    public function actionVerify($verification)
    {
        //Yii::$app->controller->enableCsrfValidation = true;
        $tfa = new TwoFactorAuth('MobiSquid', 6, 30, 'sha256');
        $secret = null;
        $secret = Yii::$app->session->get('secret');
        if($secret != null) {

                $result = $tfa->verifyCode($secret, $verification);
                if ($result) {
                    return $this->redirect('/site/login', 301);
                    //Yii::$app->response->redirect('/site/login', 302)->send();use any where else besides action
                } else {
                    $th = 'Invalid code scanned';
                    return $this->render('index', ['th' => $th,]);
                }


        }else{
            $this->view->params['error'] = '';
            $th = 'No Secret';
            return $this->render('index', ['th' => $th,]);
        }
    }

    public function actionSendChat() {
        if (!empty($_POST)) {
            echo \sintret\chat\ChatRoom::sendChat($_POST);
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

    public function actionProfile()
    {
        return $this->render('profile');
    }

    public function actionCreate()
    {
        $model = new Status();

        if ($model->load(Yii::$app->request->post())) {
            $model->created_at = time();
            $model->updated_at = time();
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $id = Yii::$app->user->getId();
            $relation= new Relationship();
            return $this->render('create', [
                'model' => $model,
                'friendslist' => $query=$relation->getFriendList($id),
            ]);
        }
    }

    public function actionMessage()
    {

        $content= "no current emails to view";
        Yii::$app->mailer->compose(['html'=>'message'],['content'=>$content]) // a view rendering result becomes the message body here
        ->setFrom('from@domain.com')
            ->setTo('to@domain.com')
            ->setSubject('Message subject')
            ->send();

        return $this->render('message');

    }
    public function actionNotification()
    {
        return $this->render('notification');
    }
}
