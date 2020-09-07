<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pengaduan */

$this->title = Yii::t('app', 'Balas {modelClass}: ', [
    'modelClass' => 'Pengaduan',
]) . $model->id_pengaduan;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Pengaduan'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_pengaduan, 'url' => ['view', 'id' => $model->id_pengaduan]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Balas');
?>
<div class="pengaduan-balas">

<!--    <h1>--><?//= Html::encode($this->title) ?><!--</h1>-->

    <?= $this->render('_form_balas', [
        'model' => $model,
    ]) ?>

</div>
