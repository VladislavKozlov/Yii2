<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Authors */

$this->title = 'Update Authors:';
$this->params['breadcrumbs'][] = ['label' => 'Writers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="authors-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
