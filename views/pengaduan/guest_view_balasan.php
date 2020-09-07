<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Pengaduan */

$this->title = "Detail Pesan Balasan";
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Pengaduan'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="uk-container pengaduan-view">
    <h2 class="uk-h3 tm-heading-fragment uk-text-center">
        <?=$this->title?>
    </h2>
    <dl class="uk-description-list uk-description-list-divider">
        <dt>Nama Keluhan</dt>
        <dd><?=$model->nama_keluhan?></dd>
        <dt>Tanggal Pengaduan</dt>
        <dd><?= $model->tgl_submit ?></dd>
        <dt>Departement</dt>
        <dd><?= \app\models\Departement::findOne($model->id_departement)->nama_departement ?></dd>
        <dt>Deskripsi</dt>
        <dd><?= $model->deskripsi_keluhan ?></dd>
        <dt>Balasan</dt>
        <dd><?= $model->pesan_balasan ?></dd>
    </dl>
</div>