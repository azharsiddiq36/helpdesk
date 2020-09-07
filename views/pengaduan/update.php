<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pengaduan */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Pengaduan',
]) . $model->id_pengaduan;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Pengaduan'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_pengaduan, 'url' => ['view', 'id' => $model->id_pengaduan]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="pengaduan-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
