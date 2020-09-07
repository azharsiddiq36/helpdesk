<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PengaduanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Lihat Pengaduan');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="uk-container pengaduan-index">

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
                'attribute' => 'Departement',
                'value' => function ($model) {
                    return \app\models\Departement::findOne($model->id_departement)['nama_departement'];
                }
            ],
            'tgl_submit:date',
            'nama_keluhan',

            [
                'attribute' => 'Detail',
                'format' => 'raw',
                'value' => function ($model) {
                    return Html::a('Detail',
                        ['pengaduan/view-balasan', 'id' => $model->id_pengaduan],
                        ['class' => 'btn btn-md btn-success']);
                }
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?></div>
