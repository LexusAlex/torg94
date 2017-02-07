<?php
$this->title = $model->title;
$this->registerMetaTag(['name' => 'description','content' => 'Госзакупки: ФЗ-44, ФЗ-223, ФЗ-94, государственные закупки, электронные торги и открытый конкурс для госзаказа - '.$model->title]);
?>
<div class="container-news">
    <div class="col-lg-10 pad-n col-md-12 col-sm-12 col-xs-12">
        <div class="wrp-to-one-new">
            <h2><?php echo $model->title;?></h2>
            <div class="time-one-news">
                <span><?php echo date('d/m/Y', strtotime($model->date));?></span>
                <span class="time-blue"><?php echo date('H : i', strtotime($model->date));?></span>
            </div>
            <div class="pluso go-to-networks" data-background="none;" data-options="medium,square,line,horizontal,counter,sepcounter=1,theme=14" data-services="facebook,twitter,vkontakte"></div>
            <p><?php echo $model->annotation;?></p>
            <?php echo \yii\helpers\Html::img(['/upload/'.$model->picture_text],['style'=>'width:100%']);?>



            <?php echo $model->text;?>

            <div class="news-on-this-new">
                <span>новости по теме</span>
                <div class="slider-in-news-news">
                    <?php foreach ($newNews as $news) { ?>
                        <div class="content-of-slide content-of-slide-all-news">
                            <?php echo \yii\helpers\Html::img(['/upload/'.$news->picture_text]);?>
                            <p><a href="<?php echo \yii\helpers\Url::to(['articles/views', 'id' => $news->id]);?>"><?php echo $news->title;?></a></p>
                            <h5><?php echo \yii\helpers\StringHelper::truncateWords($news->annotation, 10, ''); ?></h5>
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
                <a href="<?php echo \yii\helpers\Url::to(['articles/views', 'id' => $news->id]);?>">
                    <div class="content-of-slide content-of-slide-all-news item-of-aside">
                        <?php echo \yii\helpers\Html::img(['/upload/'.$news->picture_text]);?>
                        <h5><?php echo $news->title;?></h5>
                        <p><?php echo \yii\helpers\StringHelper::truncateWords($news->annotation, 10, ''); ?></p>
                    </div>
                </a>
                <?php } ?>
            </div>
        </aside>
    </div>
</div>
