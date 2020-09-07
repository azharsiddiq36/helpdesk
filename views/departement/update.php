<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Departement */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Departement',
]) . $model->id_departement;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Departement'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_departement, 'url' => ['view', 'id' => $model->id_departement]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="departement-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
