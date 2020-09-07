<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Pengaduan */

$this->title = Yii::t('app', 'Form Pengaduan');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Pengaduan'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="uk-container">
    <div class="col-md-2"></div>
    <div class="keluhan-form col-md-8">
        <h2 class="uk-margin-small-top" data-uk-scrollspy="cls: uk-animation-slide-left; repeat: true; delay: 100"><span uk-icon="icon: mail; ratio: 2.5"></span>&nbsp;Form Pengaduan</h2>
        <?php if (Yii::$app->session->hasFlash('pengaduanFormSubmitted')): ?>

            <div class="alert alert-success"  data-uk-scrollspy="cls: uk-animation-slide-up; repeat: true; delay: 150">
                Terimakasih. Form Pengaduan anda telah terkirim dan akan segera kami proses
            </div>
        <?php endif; ?>
        <?php $form = ActiveForm::begin(); ?>
        <div class="row">
            <div class="col-md-6"  data-uk-scrollspy="cls: uk-animation-slide-left; repeat: true; delay: 200">
                <?= $form->field($model, 'id_departement')->dropDownList(
                    \yii\helpers\ArrayHelper::map(
                        \app\models\Departement::find()->all(),
                        'id_departement',
                        'nama_departement'
                    ),
                    ['class' => 'uk-input input-lg form-control', 'prompt' => 'Pilih Departement']
                ) ?>

                <?= $form->field($model, 'nama_pengadu')->textInput(['class' => 'uk-input input-lg form-control', 'maxlength' => true]) ?>

                <?= $form->field($model, 'email_pengadu')->textInput(['class' => 'uk-input input-lg form-control', 'maxlength' => true]) ?>

                <?= $form->field($model, 'telepon_pengadu')->textInput(['class' => 'uk-input input-lg form-control', 'maxlength' => true]) ?>
            </div>
            <div class="col-md-6" data-uk-scrollspy="cls: uk-animation-slide-right; repeat: true; delay: 170">

                <?= $form->field($model, 'nama_keluhan')->textInput(['class' => 'uk-input input-lg form-control', 'maxlength' => true]) ?>

                <?= $form->field($model, 'deskripsi_keluhan')->textarea(['class' => 'uk-input input-lg form-control', 'rows' => '3', 'maxlength' => true]) ?>
                <div>
                    <?= Html::submitButton(Yii::t('app', 'Kirim') . ' <i class="fa fa-paper-plane"></i>',
                        ['class' => 'uk-button uk-button-default uk-button-large uk-width-1-1 uk-button-primary']) ?>
                </div>
            </div>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
    <div class="col-md-2"></div>
</div>
