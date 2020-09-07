<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PengaduanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Pengaduan');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pengaduan-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <p>
    </p>
    <?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_pengaduan',
            [
                'attribute' => 'Departement Tujuan',
                'value' => function ($model) {
                    return \app\models\Departement::findOne($model->id_departement)['nama_departement'];
                }
            ],
            'tgl_submit:date',
            'nama_keluhan',
//            'nama_pengadu',
//            'email_pengadu:email',
//            'telepon_pengadu',
            // 'deskripsi_keluhan',
            'status_keluhan',

            \app\commands\Auth::getRole() == 'admin' ? ['class' => 'yii\grid\ActionColumn'] : [
                'attribute' => 'Aksi',
                'format' => 'raw',
                'value' => function ($model) {
                    if ($model->status_keluhan != 'done') {
                        return Html::a('Balas',
                            ['balas', 'id' => $model->id_pengaduan],
                            ['class' => 'btn btn-md btn-success']);
                    }
                    return Html::a('Detail',
                        ['view-balasan', 'id' => $model->id_pengaduan],
                        ['class' => 'btn btn-md btn-primary']);
                }
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?></div>
