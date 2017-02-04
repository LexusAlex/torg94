<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Category */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="category-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'last_record_id')->dropDownList(\backend\models\Record::find()->select(['title'])->where(['status'=>1,'tid'=>2])->orderBy('id DESC')->limit(100)->indexBy('id')->column())->hint('Последняя статья в категории'); ?>
    <?php
        echo Html::img(\yii\helpers\Url::to('upload/'.\backend\models\Record::find()->where(['id'=> $model->last_record_id])->one()->picture_text, true),[

        ]);
    ?>

    <div class="form-group">
        <br>
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
