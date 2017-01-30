<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\RecordSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Публикации';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="record-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать публикацию', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'title',
                'format' => 'html',
                'content'=>function($data){
                    return \yii\helpers\StringHelper::truncate($data->title, 80,'...');
                },
            ],
            [
                'attribute'=>'date',
                'content' => function($data){
                    return date("d-m-Y H:i:s", strtotime($data->date));
                },
                //'format' => ['datetime', 'php:d F Y G:i:s']
            ],
            //'archive',
            [
                'attribute' => 'status',
                'filter' => [0 => 'Не опубликован', 1 => 'Опубликован', 2 => 'Черновик'],
                //'format' => 'boolean',
                'content'=>function($data){
                    $res = '';
                    if ($data->status == 0) {
                        $res = '<span class="label label-danger">Не опубликован</span>';
                    } elseif ($data->status == 1) {
                        $res = '<span class="label label-success">Опубликован</span>';
                    } else {
                        $res = '<span class="label label-default">Черновик</span>';;
                    }
                    return $res;
                }
            ],
            [
                'attribute' => 'tid',
                'filter' => \backend\models\Type::find()->select(['title', 'id'])->indexBy('id')->column(),
                'value' => 'type.title',
                'content'=>function($data){
                    $res = '';
                    if ($data->tid == 1) {
                        $res = 'Новости';
                    } elseif ($data->tid == 2) {
                        $res = 'Статьи';
                    } elseif ($data->tid == 3) {
                        $res = 'Законы';
                    } elseif ($data->tid == 9) {
                        $res = 'Спецпроекты';
                    } else {
                        $res = '';
                    }
                    return $res;
                }
            ],
            // 'author',
            // 'link',
            /*[
                'label' => 'picture_annotation',
                'format' => 'raw',
                'value' => function($data){
                    return Html::img(\yii\helpers\Url::to('@web/'.$data->picture_annotation),[
                        'alt'=>'yii2 - картинка в gridview',
                        'style' => 'width:15px;'
                    ]);
                },
            ],*/
            /*[
                'label' => 'picture_text',
                'format' => 'raw',
                'value' => function($data){
                    if (!empty($data->picture_text)){
                        return Html::img(\yii\helpers\Url::to('http://tasks.loc/pictures/'.$data->picture_text),['style' => 'width:125px;']);
                    }
                    return '';
                },
            ],*/
            // 'annotation:ntext',
            // 'text:ntext',
            // 'type',
            [
                'label' => 'Категории',
                'format' => 'html',
                'value'=>function($data){
                    return implode('<br>', \yii\helpers\ArrayHelper::map($data->categories, 'id', 'name'));
                },
                'visible'=> (Yii::$app->request->get('RecordSearch')['tid'] == 2) ? true : false
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);?>
    <?php Pjax::end(); ?>
</div>