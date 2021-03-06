<?php

namespace app\controllers;

use Yii;
use app\models\Status;
use app\models\StatusSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Relationship;

/**
 * StatusController implements the CRUD actions for Status model.
 */
class StatusController extends Controller
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
     * Lists all Status models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new StatusSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $id = Yii::$app->user->getId();
        $relation= new Relationship();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'friendslist' => $query=$relation->getFriendList($id),
        ]);
    }

    /*public function actionIndex()
    {
        //$id = Yii::$app->user->getId();
        $id = Status::initialize(Yii::$app->user->getId());
        return $this->redirect(['update', 'id' => $id]);

    }*/

    /**
     * Displays a single Status model.
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
     * Creates a new Status model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Status();

        /*$model->id=Yii::$app->user->getId();*/
        $model->created_at= TIME();
        $model->updated_at = TIME();
        $model->user_id = Yii::$app->user->getId();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

                return $this->redirect(['view', 'id' => $model->id]);

        } else {
            $id = Yii::$app->user->getId();
            $relation= new Relationship();
            return $this->render('create', [
                'model' => $model,
                'friendslist' => $query=$relation->getFriendList($id),
            ]);
        }
    }

    /**
     * Updates an existing Status model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $id = Yii::$app->user->getId();
        $relation= new Relationship();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'friendslist' => $query=$relation->getFriendList($id),
            ]);
        }
    }

    /**
     * Deletes an existing Status model.
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
     * Finds the Status model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Status the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Status::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
