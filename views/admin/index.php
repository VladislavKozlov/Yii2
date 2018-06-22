<?php
use yii\helpers\Url;

/* @var $this yii\web\View */

$this->title = 'Yii Application';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-index">


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

    </div>
</div>
