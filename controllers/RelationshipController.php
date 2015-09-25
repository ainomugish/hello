<?php

namespace app\controllers;

use app\models\Profile;
use Yii;
use app\models\Relationship;
use app\models\RelationshipSearch;
use app\models\ProfileSearch;
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
        //$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        //$query = Relationship::find()->where(['user_one_id'=> $id])->orFilterWhere(['user_two_id'=>$id])->andFilterWhere(['status'=>1]);
        //$query = Relationship::find()->where('user_one_id = :id',[':id' => $id])->orWhere('user_two_id = :id',[':id' => $id])->andWhere('status = :one',[':one'=> 1])->all();
        //print_r($query);
        $relation= new Relationship();
/*
        if (!empty($query)) {
            //echo '<ul>';
            foreach ($query as $rel) {
                //print_r($rel);
                $friend = $relation->getFriend($rel);
                //print_r($friend->email);echo '<br>';
            }
        }*/

        return $this->render('index', [
            'friendslist' => $query=$relation->getFriendList($id),
           // 'dataProvider' => $query,
        ]);
    }

    /**
     * friend request
     */

    public function actionFriend($user_two_id)
    {

        //if($model==$this->findModel( $user_two_id))
        $model = new Relationship();//;
        $user_one = Yii::$app->user->id;
        $action_user_id = $user_one;
        $user_two = $user_two_id;

        if ($user_one > $user_two) {
            $temp = $user_one;
            $user_one = $user_two;
            $user_two = $temp;
        }


        $model->user_one_id=$user_one;
        $model->user_two_id=$user_two;
        $model->status= 0;
        $model->action_user_id=$action_user_id;
        if($model->save())
            return $this->redirect('search');

        /*
        $relation= new Relationship();

        $relation;
        return $this->render('search', [
            'friendsearch' => $query,
            'searchModel' => $searchModel,
        ]);*/
    }


    public function actionFriendr()
    {
       /* $relation= new Relationship();
        //$relation->getFriendRequests();

        return $this->render('search', [
            'friendrequests' => $relation->getFriendRequests(),
            // 'dataProvider' => $query,
        ]);*/


    }

    /**
     *search friends
     * @return mixed
     */
    public function actionSearch()
    {

        $searchModel = new ProfileSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $query = $dataProvider->getModels();
        $relation= new Relationship();
        $friendrequests = $relation->getFriendRequests();

        return $this->render('search', [
           'friendsearch' => $query,
            'searchModel' => $searchModel,
            'friendrequests' => $friendrequests,
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
