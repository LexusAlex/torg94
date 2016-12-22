<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\RecordSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="record-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'date') ?>

    <?= $form->field($model, 'archive') ?>

    <?= $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'author') ?>

    <?php // echo $form->field($model, 'link') ?>

    <?php // echo $form->field($model, 'picture_annotation') ?>

    <?php // echo $form->field($model, 'picture_text') ?>

    <?php // echo $form->field($model, 'annotation') ?>

    <?php // echo $form->field($model, 'text') ?>

    <?php // echo $form->field($model, 'tid') ?>

    <?php // echo $form->field($model, 'type') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>