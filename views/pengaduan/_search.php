<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PengaduanSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pengaduan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_pengaduan') ?>

    <?= $form->field($model, 'nama_pengadu') ?>

    <?= $form->field($model, 'email_pengadu') ?>

    <?= $form->field($model, 'telepon_pengadu') ?>

    <?= $form->field($model, 'nama_keluhan') ?>

    <?php // echo $form->field($model, 'deskripsi_keluhan') ?>

    <?php // echo $form->field($model, 'status_keluhan') ?>

    <?php // echo $form->field($model, 'tgl_submit') ?>

    <?php // echo $form->field($model, 'id_departement') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
