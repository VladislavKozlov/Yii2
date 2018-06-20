
<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $searchModel app\models\BooksSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Books';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="books-index">

       <p class="lead">My Admin</p>

    <div class="body-content">
        <div class="panel panel-default">
            <div class="panel-heading"><a href="<?=Url::toRoute(['/admin/index']);?>" >Menu Admin</a></div>
            <div class="panel-body">
            <a href="<?=Url::toRoute(['/books/index']);?>" >Books</a>
            </div>
            <div class="panel-body">
            <a href="<?=Url::toRoute(['/authors/index']);?>" >Authors</a>
            </div>
           	<div class="panel-body">
            REST API
            </div>
        </div>

    <div class="row new">

    <h1><?= Html::encode($this->title) ?></h1>
   
    <p> 
       <?= Html::a('Create Book', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            [
                'attribute'=>'name',
                'label'=>'Author',
                'format'=>'text', 
                'value' => 'authors.name'
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); 

     echo $this->render('_search', ['model' => $searchModel]); ?>

</div>
</div>
</div>