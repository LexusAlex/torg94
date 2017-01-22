<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Подписаться на рассылку новостей';
?>
<div class="block-of-news-wrp" style="height: 1000px">
    <div class="container">
        <div class="content">
            <div class="">
                <?= \common\widgets\Alert::widget() ?>
                <h1 class="text-center"><?= Html::encode($this->title) ?></h1>
                <div class="col-xs-12">
                    <div class="one-news-position">
                        <div class="alert alert">
                            <?php $form = ActiveForm::begin(['id' => 'subcribe-form']); ?>

                            <?= $form->field($model, 'email')->textInput(['autofocus' => true])->hint('Ваш адрес электронной почты'); ?>

                            <div class="form-group">
                                <?= Html::submitButton('Подписаться', ['class' => 'btn btn-primary', 'name' => 'subcribe-button']) ?>
                            </div>

                            <?php ActiveForm::end(); ?>

                        </div>
                        <p>Чтобы отписаться нажмите <a style="float: none" href="<?php echo \yii\helpers\Url::to(['site/unsubscribe']); ?>">здесь</a></p>
                    </div>
                </div>
        </div>
    </div>
</div>

