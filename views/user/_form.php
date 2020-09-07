<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form row">

    <?php $form = ActiveForm::begin(); ?>
    <div class="col-md-4">
        <?= $form->field($model, 'nip')->textInput() ?>

        <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>
    </div>
    <div class="col-md-4">
        <?= $form->field($model, 'nama_staff')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'id_departement')->dropDownList(
            \yii\helpers\ArrayHelper::map(
                \app\models\Departement::find()->all(),
                'id_departement',
                'nama_departement'
            ),
            ['prompt' => 'Pilih Departement']
        ) ?>

        <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-md-4">
        <?= $form->field($model, 'telepon')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'role')->dropDownList(
            ['admin' => 'Admin', 'staff' => 'Staff',],
            ['prompt' => 'Pilih Hak Akses']
        ) ?>

        <div class="form-group">
            <?= Html::submitButton(
                "&nbsp;<span class='fa fa-save'></span>&nbsp;".($model->isNewRecord ?
                        Yii::t('app', 'Create') :
                        Yii::t('app', 'Update')),
                    ['class' => $model->isNewRecord ? 'btn btn-lg btn-block  btn-success' : 'btn btn-lg btn-block btn-primary']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>
