<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Departement */

$this->title = Yii::t('app', 'Create Departement');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Departement'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="departement-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
