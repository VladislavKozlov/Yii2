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

        <div class="row new">

          <h1>REST API  (use Postman)</h1>

            <table class="table">
              <thead>
              </thead>
              <tbody>
                <tr>
     		<th scope="row"><a href="<?php echo('http://'.$_SERVER['HTTP_HOST'].'/yii2basic/api/v1/books/list'); ?> " >GET /yii2basic/api/v1/books/list</a></th>
                </tr>
                <tr>
                  <th scope="row"><a href="<?php echo('http://'.$_SERVER['HTTP_HOST'].'/yii2basic/api/v1/books/1'); ?> " >GET /yii2basic/api/v1/books/1</th>
                </tr>
                <tr>
                  <th scope="row">POST /yii2basic/api/v1/books/update/1</th>
                </tr>
                <tr>
                  <th scope="row">DELETE /yii2basic/api/v1/books/1</th>
                </tr>
              </tbody>
            </table>
        </div>

    </div>
	
</div>
