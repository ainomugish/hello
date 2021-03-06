<?php

namespace app\controllers;

use app\models\User;
use app\models\UserContact;
use app\models\UserM;
use Yii;
use app\models\Chat;
use app\models\UserSetting;
use app\models\UserSettingSearch;
use app\models\ChatSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Relationship;


/**
 * ChatController implements the CRUD actions for Chat model.
 */
class ChatController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Chat models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ChatSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $id = Yii::$app->user->getId();
        $relation= new Relationship();


        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'friendslist' => $query=$relation->getFriendList($id),
        ]);
    }


    public function actionSendChat() {
        if (!empty($_POST)) {
            echo \sintret\chat\ChatRoom::sendChat($_POST);
        }
    }

    /**
     * Displays a single Chat model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {


//        print_r($user);

        $searchModel = new UserSettingSearch();
        $setting = $searchModel->search(Yii::$app->request->queryParams);
        $query = UserSetting::find();//One(['user_id'=>$id]);

        //$setting= $query->all();
        return $this->render('view', [
            'model' => $this->findModel($id),'setting' => $setting,
        ]);
    }

    /**
     * Creates a new Chat model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Chat();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Chat model.
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
     * Deletes an existing Chat model.
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
     * Finds the Chat model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Chat the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Chat::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
