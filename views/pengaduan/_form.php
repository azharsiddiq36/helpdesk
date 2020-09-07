<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Pengaduan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pengaduan-form row">
    <?php $form = ActiveForm::begin(); ?>

    <div class="col-md-6">
        <?= $form->field($model, 'nama_pengadu')->textInput(['readOnly' => true, 'maxlength' => true]) ?>

        <?= $form->field($model, 'email_pengadu')->textInput(['readOnly' => true, 'maxlength' => true]) ?>

        <?= $form->field($model, 'telepon_pengadu')->textInput(['readOnly' => true, 'maxlength' => true]) ?>

        <?= $form->field($model, 'id_departement')->dropDownList(
            \yii\helpers\ArrayHelper::map(
                \app\models\Departement::find()->all(),
                'id_departement',
                'nama_departement'
            ),
            ['prompt' => 'Pilih Departement']
        ) ?>
        <?= $form->field($model, 'nama_keluhan')->textInput(['readOnly' => true, 'maxlength' => true]) ?>

    </div>
    <div class="col-md-6">

        <?= $form->field($model, 'deskripsi_keluhan')->textarea(['rows'=>5,'readOnly' => true, 'maxlength' => true]) ?>

        <?= $form->field($model, 'status_keluhan')->dropDownList(
            ['open' => 'Open', 'on progress' => 'On Progress', 'done' => 'Done',],
            ['prompt' => 'Pilih Status keluhan']
        ) ?>

        <?= $form->field($model, 'tgl_submit')->textInput(['readOnly' => true,]) ?>


        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
