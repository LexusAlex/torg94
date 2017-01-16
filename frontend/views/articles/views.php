<?php
$this->title = $model->title;
$this->registerMetaTag(['name' => 'description','content' => 'Госзакупки: ФЗ-44, ФЗ-223, ФЗ-94, государственные закупки, электронные торги и открытый конкурс для госзаказа - '.$model->title]);
?>
<div class="container-news">
    <div class="col-lg-10 pad-n col-md-12 col-sm-12 col-xs-12">
        <div class="wrp-to-one-new">
            <h2><?php echo $model->title;?></h2>
            <div class="time-one-news">
                <span><?php echo Yii::$app->formatter->asDate($model->date, 'php:d/m/yy'); ?></span>
                <span class="time-blue"><?php echo Yii::$app->formatter->asDate($model->date, 'php:h : i'); ?></span>
            </div>
            <?php echo \yii\helpers\Html::img(['/upload/'.$model->picture_text]);?>

            <p><?php echo $model->annotation;?></p>
            <div class="pluso go-to-networks" data-background="none;" data-options="medium,square,line,horizontal,counter,sepcounter=1,theme=14" data-services="facebook,twitter,vkontakte"></div>
            <?php echo $model->text;?>

            <div class="news-on-this-new">
                <span>новости по теме</span>
                <div class="slider-in-news-news">
                    <?php foreach ($newNews as $news) { ?>
                        <div class="content-of-slide content-of-slide-all-news">
                            <?php echo \yii\helpers\Html::img(['/upload/'.$news->picture_text]);?>
                            <h5><?php echo $news->title;?></h5>
                            <p><?php echo \yii\helpers\StringHelper::truncateWords($news->annotation, 10, ''); ?></p>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <p class="after-slider-right"></p>

        </div>
        <div class="special-project">
            <h4>спецпроекты</h4>
        </div>

    </div>


    <div class="col-lg-2">
        <aside class="aside-right-all-news">
            <div class="aside-body-all-news">
                <?php foreach ($newNews as $news) { ?>
                    <div class="content-of-slide content-of-slide-all-news item-of-aside">
                        <?php echo \yii\helpers\Html::img(['/upload/'.$news->picture_text]);?>
                        <h5><?php echo $news->title;?></h5>
                        <p><?php echo \yii\helpers\StringHelper::truncateWords($news->annotation, 10, ''); ?></p>
                    </div>
                <?php } ?>
            </div>
        </aside>
    </div>
</div>
