
<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\Authors;
use app\models\Books;


$books = Books::find()->all();
$booksItems = ArrayHelper::map($books,'id','name','author');

/* @var $this yii\web\View */
/* @var $model app\models\Authors */
/* @var $form yii\widgets\ActiveForm */
use yii\jui\DatePicker;
?>

<div class="books-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="form-group">

	<?= $form->field($model, 'name')->textInput() ?>

    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>