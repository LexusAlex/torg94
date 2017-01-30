<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Record */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Records', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="record-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title:html',
            //'date:datetime',
            [
                'attribute'=>'date',
                'value' => date("d.m.Y H:i:s", strtotime($model->date)),
                //'format' => ['datetime', 'php:d F Y G:i:s']
            ],
            //'archive',
            'status',
            'author',
            'link',
            //'picture_annotation',
            [
                'attribute'=>'picture_text',
                'value'=>\yii\helpers\Url::to('upload/'.$model->picture_text, true),
                'format' => ['image'],
            ],
            'annotation:html',
            'text:html',
            'tid',
            //'type',
        ],
    ]) ?>

</div>