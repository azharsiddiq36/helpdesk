<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="uk-container">
    <div class="uk-grid-match uk-child-width-1-3@m" uk-grid  data-uk-scrollspy="cls: uk-animation-slide-bottom; repeat: true; delay: 150">
        <div></div>
        <div>
            <h1 data-uk-scrollspy="cls: uk-animation-slide-left; repeat: true; delay: 150"><span uk-icon="icon: sign-in; ratio: 2.5"></span>&nbsp;<?= Html::encode($this->title) ?></h1>
            <p>Silahkan Isi Username & Password login:</p>
            <?php $form = ActiveForm::begin([
                'id' => 'login-form',
            ]); ?>

            <?= $form->field($model, 'username')->textInput(['class'=>'uk-input input-lg form-control']) ?>

            <?= $form->field($model, 'password')->passwordInput(['class'=>'uk-input input-lg form-control',]) ?>

            <?= $form->field($model, 'rememberMe')->checkbox(['class'=>'uk-checkbox']) ?>

            <?= Html::submitButton('Login',
                ['class' => 'uk-button uk-button-default uk-width-1-1 uk-button-large uk-button-primary',
                    'name' => 'login-button']
            ) ?>
        </div>
        <div></div>
    </div>
    <?php ActiveForm::end(); ?>
</div>
