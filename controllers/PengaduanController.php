<?php

namespace app\controllers;

use app\commands\Auth;
use Yii;
use app\models\Pengaduan;
use app\models\PengaduanSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PengaduanController implements the CRUD actions for Pengaduan model.
 */
class PengaduanController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return Auth::behaviors([
            'deny' => function ($rule, $action) {
                $this->redirect(['site/login']);
            },
        ]);
    }

    /**
     * Lists all Pengaduan models.
     * @return mixed
     */
    public function actionIndex()
    {
        $this->layout = Auth::getRole();
        $searchModel = new PengaduanSearch();
        $dataProvider =
            Auth::getRole() == 'admin' ? $searchModel->search(Yii::$app->request->queryParams) :
                $searchModel->searchStaff(
                    Yii::$app->request->queryParams,
                    Yii::$app->user->identity->id_departement
                );

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Pengaduan model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $this->layout = Auth::getRole();
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Displays a single Pengaduan model.
     * @param integer $id
     * @return mixed
     */
    public function actionViewBalasan($id)
    {
        if (Yii::$app->user->isGuest) {
            $this->layout = "minimal";
            return $this->render('guest_view_balasan', [
                'model' => $this->findModel($id),
            ]);
        } else {
            $this->layout = Auth::getRole();
            return $this->render('view_balasan', [
                'model' => $this->findModel($id),
            ]);
        }
    }

    /**
     * Creates a new Pengaduan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $this->layout = Auth::getRole();
        $model = new Pengaduan();
        $model->tgl_submit = date("Y-m-d");
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_pengaduan]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Pengaduan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $this->layout = Auth::getRole();
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_pengaduan]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Pengaduan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionBalas($id)
    {
        $this->layout = Auth::getRole();
        $model = $this->findModel($id);
        $model->status_keluhan = "done";
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view-balasan', 'id' => $model->id_pengaduan]);
        } else {
            return $this->render('balas', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Pengaduan model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->layout = Auth::getRole();
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Pengaduan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Pengaduan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Pengaduan::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
