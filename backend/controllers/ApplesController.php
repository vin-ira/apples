<?php

namespace backend\controllers;

use backend\models\Apples;
use backend\models\ApplesSearch;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * ApplesController implements the CRUD actions for Apples model.
 */
class ApplesController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'access' => [
                    'class' => AccessControl::class,
                    'rules' => [
                        [
                            'allow' => true,
                            'roles' => ['@'],
                        ],
                    ],
                ],
                'verbs' => [
                    'class' => VerbFilter::class,
                    'actions' => [
                        'delete' => ['POST'],
                        'eat' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Apples models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ApplesSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Apples model.
     * @param int $id Идентификатор
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Apples model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Apples();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Apples model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id Идентификатор
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Apples model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id Идентификатор
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * @return \yii\web\Response
     */
    public function actionGenerate()
    {
        Apples::generate();

        return $this->redirect(['index']);
    }

    /**
     * @param $id
     *
     * @return false|\yii\web\Response
     *
     * @throws NotFoundHttpException
     */
    public function actionFall($id)
    {
        $model = $this->findModel($id);

        if ($model->fall()) {
            return $this->redirect('index');
        }

        return false;
    }

    /**
     * @return string|\yii\web\Response
     *
     * @throws BadRequestHttpException
     * @throws NotFoundHttpException
     */
    public function actionEat()
    {
        if (\Yii::$app->request->isPost) {
            $id = (int)\Yii::$app->request->post('id');
            $percent = (int)\Yii::$app->request->post('percent');

            $model = $this->findModel($id);

            if ($model->eat($percent)) {
                return $this->redirect('index');
            }

            return 'Нельзя откусить больше '. ($model->size_percent * 100) .'%!';
        }

        throw new BadRequestHttpException();
    }

    /**
     * Finds the Apples model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id Идентификатор
     * @return Apples the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Apples::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
