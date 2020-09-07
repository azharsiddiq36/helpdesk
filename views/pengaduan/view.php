<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Pengaduan */

$this->title = $model->id_pengaduan;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Pengaduan'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pengaduan-view">

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id_pengaduan], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id_pengaduan], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_pengaduan',
            'nama_pengadu',
            'email_pengadu:email',
            'telepon_pengadu',
            'nama_keluhan',
            'deskripsi_keluhan',
            'status_keluhan',
            'tgl_submit',
            [
                'label' => 'Departement Tujuan',
                'value' => \app\models\Departement::findOne($model->id_departement)->nama_departement
            ],
        ],
    ]) ?>

</div>
