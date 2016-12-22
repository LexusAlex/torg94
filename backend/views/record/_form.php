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
    <div class="row">
        <div class="col-xs-6 col-xs-offset-3">
            <em>Благодаря структуре старого сайта мы вынужнены ее придерживаться и здесь</em>
            <hr>
            <strong>Обязательные поля</strong>
            <ol>
                <li>Заголовок</li>
                <li>Дата и время</li>
                <li>Аннотация к публикации</li>
                <li>Текст к публикации</li>
            </ol>
        </div>
    </div>
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true])->hint('Заголовок публикации до 255 символов'); ?>

    <?= $form->field($model, 'date')->widget(\nkovacs\datetimepicker\DateTimePicker::className(), [
        'clientOptions' => [
            'extraFormats' => ['YYYY-MM-DD hh:mm:ss'],
            'useCurrent' => true
        ],
        'type' => 'datetime',
        'format' => 'yyyy-MM-dd HH:mm:ss',
    ])->hint('Дата и время в формате YYYY-MM-DD hh:mm:ss для отображения на сайте - выбрать справа из календаря'); ?>

    <?php /*$form->field($model, 'archive')->textInput() */?>

    <?= $form->field($model, 'status')->dropDownList([0 => 'Не опубликован', 1 => 'Опубликован', 2 => 'Черновик'])->hint('Статус публикации - по умолчанию Не опубликован <br> Для создания отложенной публикации выбрать Черновик');  ?>


    <?php echo $form->field($model, 'picture_text')->textInput(['maxlength' => true])->hint('Изображение - по умолчанию Null <br> Внимание! <br> Загружать по одному изображению <br> При обновлении проверить что путь до файла поменялся') ?>
    <?php

    if(empty($model->picture_text)){
        echo '<em id="text_text"> Изображение не загружено </em>';
    } else{ ?>
        <img id="text_img" src="<?php echo \yii\helpers\Url::to(\Yii::$app->params['frontendurl']).$model->picture_text;?>" alt="">
    <?php } ?>
    <hr>

    <strong>Загрузить изображение на сервер:</strong>
            <?= FileUploadUI::widget([
                'model' => $model,
                'attribute' => 'picture_annotation',
                'url' => ['record/upload','id' => $model->id],
                'gallery' => true,
                'fieldOptions' => [
                    'accept' => 'image/*'
                ],
                'clientOptions' => [
                    'maxFileSize' => 2000000
                ],
                // ...
                'clientEvents' => [
                    'fileuploaddone' => 'function(e, data) {
                                    //console.log(e);
                                    $("#record-picture_text").val("news_pics/" + data.jqXHR.responseJSON.files[0].name);
                                    $("#text_img").attr("src","'.\Yii::$app->params['frontendurl'].'news_pics/" + data.jqXHR.responseJSON.files[0].name);
                                    $("#text_text").html("<strong style=\"color:green;font-size:1.5em\">Изображение загружено!</strong>");
                                    //console.log();
                                }',
                    'fileuploadfail' => 'function(e, data) {
                                    console.log(e);
                                    console.log(data);
                                }',
                ],
            ]);
            ?>
    <?php

    echo $form->field($model, 'annotation')->widget(CKEditor::className(),[
        'editorOptions' => [
            'preset' => 'full', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
            'inline' => false, //по умолчанию false
        ],
    ])->hint('Аннотация к публикации');

    echo $form->field($model, 'text')->widget(CKEditor::className(),[
        'editorOptions' => [
            'preset' => 'full', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
            'inline' => false, //по умолчанию false
        ],
    ])->hint('Текст публикации');
    ?>


    <?= $form->field($model, 'tid')->dropDownList(\backend\models\Type::find()->select(['title', 'id'])->indexBy('id')->column())->hint('Тип публикации <br> При выборе типа Статья можно выбрать категорию'); ?>

    <?= $form->field($model, 'categoryArray')->checkboxList(
        \backend\models\Category::find()->select(['name', 'id'])->indexBy('id')->column(),
        ['class'=>'checkbox']
    )->hint('Добавьте или обновите категории статьи');
    ?>
    <?php /*echo $form->field($model, 'type')->textInput(['maxlength' => true]) */?>
    <?php //$form->field($model, 'author')->textInput(['maxlength' => true]) ?>

    <?php //$form->field($model, 'link')->textInput(['maxlength' => true]) ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>