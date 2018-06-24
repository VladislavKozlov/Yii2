<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use app\models\Books;
use app\models\Authors;
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $searchModel app\models\AuthorsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Authors';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="writes-index">

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
            <a href="<?=Url::toRoute(['/rest/index']);?>" >REST API</a>
            </div>
        </div>

    <div class="row new">

    <h1><?= Html::encode($this->title) ?></h1>
    
    <p>
        <?= Html::a('Create Authors', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name:ntext',
			[
				'label'=>'count books',
                'format'=>'integer', 
				'value' => function ($data) {
					$author_id = $data->id;
                   return Authors::countBooks($author_id);
                },
            ],
            
            ['class' => 'yii\grid\ActionColumn']
        ],
    ]); ?>
    
<?php  echo $this->render('_search', ['model' => $searchModel]); ?>
 

</div>
</div>
</div>

