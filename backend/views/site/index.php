<?php

/* @var $this yii\web\View */

$this->title = 'Backend Torg94.ru';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Backend Torg94.ru</h1>

        <p class="lead">Административная часть</p>

        <p><a class="btn btn-default" href="<?php echo \yii\helpers\Url::toRoute('record/create')?>">Создать публикацию</a>
        <a class="btn btn-default" href="<?php echo \yii\helpers\Url::toRoute('record/index')?>">Все публикации</a></p>
    </div>

</div>
