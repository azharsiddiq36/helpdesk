<?php

namespace app\controllers;

use app\commands\Auth;
use app\models\Pengaduan;
use app\models\PengaduanSearch;
use Yii;
use yii\web\Controller;
use yii\web\Response;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
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
     * @return string
     */
    public function actionIndex()
    {
        if (Yii::$app->user->isGuest){
            $this->layout = "minimal";
            return $this->render('guest_index');
        }else{
            $this->layout = Auth::getRole();
            return $this->render('index');
        }
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        $this->layout = "minimal";
        if (!Yii::$app->user->isGuest) {
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

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post())
            && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * @return string|Response
     */
    public function actionPengaduan()
    {
        $this->layout = "minimal";
        $model = new Pengaduan();
        $model->tgl_submit = date("Y-m-d");
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('pengaduanFormSubmitted');

            return $this->refresh();
        }
        return $this->render('pengaduan', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionLihat()
    {
        $this->layout = "minimal";
        $searchModel = new PengaduanSearch();
        $dataProvider = $searchModel->searchUmum(Yii::$app->request->queryParams);

        return $this->render('lihat_balasan', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCheck()
    {
        $id = isset($_POST['id']) ? $_POST['id'] : false;
        if ($id) {
            $this->layout = "minimal";
            $model = Pengaduan::findOne(['id_pengaduan' => $id]);
            return $this->render('check', [
                'model' => $model
            ]);
        } else {
            return $this->redirect('index');
        }
    }
}
