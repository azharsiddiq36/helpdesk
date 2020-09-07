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
        <?= $form->field($model, 'nama_keluhan')->textInput(['readOnly' => true, 'maxlength' => true]) ?>
        <?= $form->field($model, 'deskripsi_keluhan')->textarea(['rows'=>5,'readOnly' => true, 'maxlength' => true]) ?>
    </div>
    <div class="col-md-6">
        <?= $form->field($model, 'pesan_balasan')->textarea(['rows'=>6, 'maxlength' => true]) ?>
        <div class="form-group">
            <i class="pull-left"><?='Tanggal pengaduan : '.$model->tgl_submit?></i>
            <?= Html::submitButton(Yii::t('app', 'Kirim Balasan'),
                ['class' => 'btn btn-primary pull-right']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
