<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Задать вопрос Дмитрию Сытину';
?>
<div class="block-of-news-wrp" style="height: 1000px">
    <div class="container">
        <div class="content">
            <div class="">
                <?= \common\widgets\Alert::widget() ?>
                <h1 style="margin-top: 15px;" class="text-center"><?= Html::encode($this->title) ?></h1>
                <div class="col-xs-4 col-xs-push-4">
                    <?php echo \yii\helpers\Html::img(['/img/speak_small.jpg'],['style'=>'text-align:center','alt'=> '','width'=>'160','height'=>'240']);?>
                </div>
                <div class="col-xs-12">
                    <div class="one-news-position">
                        <div class="alert alert">
                            <?php $form = ActiveForm::begin(['id' => 'subcribe-form']); ?>

                            <?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>

                            <?= $form->field($model, 'text')->textarea(['rows'=> 10]) ?>

                            <div class="form-group" style="text-align: center">
                                <?= Html::submitButton('Задать вопрос', ['class' => 'btn btn-lg btn-primary', 'name' => 'button']) ?>
                            </div>

                            <?php ActiveForm::end(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

