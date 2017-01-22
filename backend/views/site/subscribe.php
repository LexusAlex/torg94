<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Рассылка новостей';
?>
<div class="site-login">
    <h1 class="text-center"><?= Html::encode($this->title) ?></h1>
    <p>Данное сообщение будет разослано на <b><?php echo $count;?></b> адресов</p>
    <div class="row">
        <div class="col-xs-8 col-xs-offset-2">
            <?php $form = ActiveForm::begin(['id' => 'subcribe-form']); ?>

            <?= $form->field($model, 'name')->textInput(['autofocus' => true])->hint('От кого будет отправлено письмо'); ?>

            <?= $form->field($model, 'subject')->textInput()->hint('Тема письма'); ?>

            <?php
            echo $form->field($model, 'htmlBody')->widget(\mihaildev\ckeditor\CKEditor::className(),[
                'editorOptions' => \mihaildev\elfinder\ElFinder::ckeditorOptions(['elfinder'], ['preset' => 'standart', 'inline' => false]),
            ])->hint('Тело сообщения');
            ?>
            <p>Скрипт должнен отработать какое-то время, если этого не произошло, значит письма <b>не были отправлены</b></p>
            <p>Если отправка удачная то будет перенаправление на главную страницу</p>
            <div class="form-group">
                <?= Html::submitButton('Разослать', ['class' => 'btn btn-primary', 'name' => 'subcribe-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
