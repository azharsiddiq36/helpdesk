<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = $model->nip;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'User'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

    <p>
        <?php if (\app\commands\Auth::getRole() == 'admin') { ?>
            <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->nip], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->nip], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                    'method' => 'post',
                ],
            ]);
        } ?>

    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'nip',
            'username',
            'password',
            'nama_staff',
            [
                'label' => 'Departement',
                'value' => \app\models\Departement::findOne($model->id_departement)->nama_departement
            ],
            'email:email',
            'telepon',
            'role',
        ],
    ]) ?>

</div>
