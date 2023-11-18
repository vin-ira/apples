<?php

namespace backend\controllers;

use app\models\Margins;
use app\models\Suppliers;
use app\models\supprodcnt;
use app\models\SupprodcntSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * StoreController implements the CRUD actions for supprodcnt model.
 */
class StoreController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all supprodcnt models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new SupprodcntSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single supprodcnt model.
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
     * Creates a new supprodcnt model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new supprodcnt();

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
     * Updates an existing supprodcnt model.
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
     * Deletes an existing supprodcnt model.
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

    public function actionCreatePriceSale()
    {
        /** @var Supprodcnt[] $supprodcnt */
        $supprodcnt = Supprodcnt::find()
            ->all();

        foreach ($supprodcnt as $supprodcntone) {
            /** @var Supprodcnt $supprodcntone */

            $curmargins = Margins::find()
                ->leftJoin('sup_mar', 'sup_mar.id_m = margins.id')
                ->andWhere('sup_mar.id_s = '. $supprodcntone->id_s)
            ->all();

            foreach ($curmargins as $curmargin) {
                /** @var Margins $curmargin */
                if ($supprodcntone->price_min >= $curmargin->price_min && $supprodcntone->price_min <= $curmargin->price_max) {
                    $supprodcntone->price_sale = $supprodcntone->price_min + $supprodcntone->price_min * $curmargin->part;

                    $supprodcntone->save();
                }
            }
        }

        return $this->redirect('index');
    }

    /**
     * Finds the supprodcnt model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id Идентификатор
     * @return supprodcnt the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = supprodcnt::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
