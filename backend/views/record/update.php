<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Record */

$this->title = 'Обновить публикацию: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Records', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="record-update">

    <h1><?= Html::encode($this->title) ?></h1>
    <div class="row">
        <div class="col-xs-6 col-xs-offset-3">
            <strong>Порядок обновления публикации:</strong>
            <br>
            <em>здесь все интуитивно понятно, думаю стоит прояснить несколько моментов связанных с загрузкой файлов</em>
            <ol>
                <li>При обновлении изображения нажать "Добавить файлы" в поле с изображением нажать "Загрузить", путь и изображение должны поменятся на ваше загруженное</li>
                <li>Если по каким-то причинм путь до изображения не обновился, нужно вписать его вручную</li>
            </ol>
        </div>
    </div>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>