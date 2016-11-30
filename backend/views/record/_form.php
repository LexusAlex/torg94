<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\fileupload\FileUploadUI;
use mihaildev\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model backend\models\Record */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="record-form" style="margin: 0 auto;width: 70%">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date')->widget(\nkovacs\datetimepicker\DateTimePicker::className(), [
        'clientOptions' => [
            'extraFormats' => ['YYYY-MM-DD hh:mm:ss'],
        ],
        'type' => 'datetime',
        'format' => 'yyyy-MM-dd HH:mm:ss',
    ]) ?>

    <?php /*$form->field($model, 'archive')->textInput() */?>

    <?= $form->field($model, 'status')->dropDownList([0 => 'Не опубликован', 1 => 'Опубликован', 2 => 'Черновик']) ?>


    <?php echo $form->field($model, 'picture_text')->textInput(['maxlength' => true]) ?>
    <?php

    if(empty($model->picture_text)){
        echo '<em id="text_text"> Изображение не найдено </em>';
    } else{ ?>
        <img id="text_img" src="<?php echo \yii\helpers\Url::to(\Yii::$app->params['frontendurl']).$model->picture_text;?>" alt="">
    <?php } ?>
    <hr>

    <strong>Загрузить изображение на сервер:</strong>
            <?= FileUploadUI::widget([
                'model' => $model,
                'attribute' => 'picture_annotation',
                'url' => ['record/upload','id' => $model->id],
                'gallery' => false,
                'fieldOptions' => [
                    'accept' => 'image/*'
                ],
                'clientOptions' => [
                    'maxFileSize' => 2000000
                ],
                // ...
                'clientEvents' => [
                    'fileuploaddone' => 'function(e, data) {
                                    console.log(e);
                                    $("#record-picture_text").val("news_pics/" + data.jqXHR.responseJSON.files[0].name);
                                    $("#text_img").attr("src","'.\Yii::$app->params['frontendurl'].'news_pics/" + data.jqXHR.responseJSON.files[0].name);
                                    $("#text_text").html("<strong>Изображение загружено!</strong>");
                                    //console.log();
                                }',
                    'fileuploadfail' => 'function(e, data) {
                                    console.log(e);
                                    console.log(data);
                                }',
                ],
            ]);
            ?>
    <hr>
    <em>Внимание!

    </em>
    <ol>
        <li>После загрузки изображения, имя файла подставится в поле "Изображение к тексту" (корневая папка должна быть news_pics/)</li>
        <li>Загружать по одному изображению</li>
    </ol>
    <?php

    echo $form->field($model, 'annotation')->widget(CKEditor::className(),[
        'editorOptions' => [
            'preset' => 'full', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
            'inline' => false, //по умолчанию false
        ],
    ]);

    echo $form->field($model, 'text')->widget(CKEditor::className(),[
        'editorOptions' => [
            'preset' => 'full', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
            'inline' => false, //по умолчанию false
        ],
    ]);
    ?>


    <?= $form->field($model, 'tid')->dropDownList(\backend\models\Type::find()->select(['title', 'id'])->indexBy('id')->column()) ?>

    <?php /*echo $form->field($model, 'type')->textInput(['maxlength' => true]) */?>
    <?= $form->field($model, 'author')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'link')->textInput(['maxlength' => true]) ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>