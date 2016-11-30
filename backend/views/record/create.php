<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Record */

$this->title = 'Создать публикацию';
$this->params['breadcrumbs'][] = ['label' => 'Records', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="record-create">

    <h1><?= Html::encode($this->title) ?></h1>
    <div class="row">
        <div class="col-xs-6 col-xs-offset-3">
            <strong>Порядок создания публикации:</strong>
            <ol>
                <li>Вписать заголовок публикации</li>
                <li>Выбрать дату публикации</li>
                <li>Выбрать статус публикации(Не опубликован,опубликован или черновик)</li>
                <li>Загрузить изображение на сервер, нажав на кнопку "Добавив файлы", далее нажать загрузить в области с изображением</li>
                <li>Поле "Изображение к тексту" должно заполнится и внизу появится надпись "Изображение загружено!"</li>
                <li>Заполнить "Аннотация к публикации" и "Текст публикации"</li>
                <li>Выбрать "Тип публикации"</li>
                <li>Остальные поля необязательны к заполнению</li>
            </ol>
        </div>
    </div>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>