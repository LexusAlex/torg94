<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Категории статей';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <p><b>Эти категории относятся только к статьям!</b></p>
    <p><b>Необходимо вручную исправить id записи!</b></p>
    <p>
        <?php //Html::a('Create Category', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'last_record_id',
            [
                'label' => 'Последняя статья в категории',
                //'format' => 'html',
                'value'=>function($data){
                    return \backend\models\Record::find()->where(['id'=> $data->last_record_id])->one()->title;
                },
            ],
            [
                'attribute'=>'',
                'value'=>function($data){
                    return Html::img(\yii\helpers\Url::to('upload/'.\backend\models\Record::find()->where(['id'=> $data->last_record_id])->one()->picture_text, true),[
                        'style' => 'width:100px;'
                    ]);
                },
                'format' => ['raw'],
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
