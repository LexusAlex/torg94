<div class="one-news-position position-of-news-all-news">
    <a href="<?php echo \yii\helpers\Url::to(['articles/views', 'id' => $model->id]);?>">
        <?php echo \yii\helpers\Html::img(['/upload/'.$model->picture_text]);?>
        <div class="only-info">
            <span><?php echo Yii::$app->formatter->asDate($model->date, 'php:d/m/yy'); ?></span>
            <h3><?php echo $model->title;?></h3>
            <p><?php echo \yii\helpers\StringHelper::truncateWords($model->annotation, 10, ''); ?></p>
        </div>
    </a>
</div>