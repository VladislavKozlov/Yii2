<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Authors */

$this->title = 'Create Authorss';
$this->params['breadcrumbs'][] = ['label' => 'Authors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="writes-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
