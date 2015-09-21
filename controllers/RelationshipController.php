<?php

namespace app\controllers;

use Yii;
use app\models\Relationship;
use app\models\RelationshipSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RelationshipController implements the CRUD actions for Relationship model.
 */
class RelationshipController extends Controller
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
     * Lists all Relationship models.
     * @return mixed
     */
    public function actionIndex()
    {
        $id = Yii::$app->user->getId();
        $searchModel = new RelationshipSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams,$id);


        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    /**
     * Displays a single Relationship model.
     * @param integer $user_one_id
     * @param integer $user_two_id
     * @return mixed
     */
    public function actionView($user_one_id, $user_two_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($user_one_id, $user_two_id),
        ]);
    }

    /**
     * Creates a new Relationship model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Relationship();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'user_one_id' => $model->user_one_id, 'user_two_id' => $model->user_two_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Relationship model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $user_one_id
     * @param integer $user_two_id
     * @return mixed
     */
    public function actionUpdate($user_one_id, $user_two_id)
    {
        $model = $this->findModel($user_one_id, $user_two_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'user_one_id' => $model->user_one_id, 'user_two_id' => $model->user_two_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Relationship model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $user_one_id
     * @param integer $user_two_id
     * @return mixed
     */
    public function actionDelete($user_one_id, $user_two_id)
    {
        $this->findModel($user_one_id, $user_two_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Relationship model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $user_one_id
     * @param integer $user_two_id
     * @return Relationship the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($user_one_id, $user_two_id)
    {
        if (($model = Relationship::findOne(['user_one_id' => $user_one_id, 'user_two_id' => $user_two_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
