<?php

/* @var $this yii\web\View */

$this->title = 'Госзакупки: ФЗ-44, ФЗ-223, ФЗ-94, государственные закупки, электронные торги и открытый конкурс для госзаказа - поговорим об этом неофициально';
?>
<div class="infographic-wrp">
    <div class="container">
        <div class="content">
            <div class="infographic">
                <span>инфографика дня</span>
            </div>
            <div class="statistic-wrp">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="statistic">
                        <canvas id="market" width="100" height="100"></canvas>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="statistic">
                        <canvas id="market-two" width="100" height="100"></canvas>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="statistic">
                        <canvas id="market-three" width="100" height="100"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="block-of-news-wrp">
    <div class="container">
        <div class="content">
            <div class="block-of-news">
                <?php foreach ($records as $record){ ?>
                    <div class="col-lg-6 pad-no col-md-6 col-sm-6 col-xs-12">
                        <div class="one-news-position">
                            <a href="<?php echo \yii\helpers\Url::to(['articles/views', 'id' => $record->id]);?>">
                                <?php echo \yii\helpers\Html::img(['/upload/'.$record->picture_text]);?>
                                <div class="only-info">
                                    <span><?php echo \Yii::$app->formatter->asDatetime($record->date, "php:d/m/Y");?></span>
                                    <h4><?php echo $record->cat;?></h4>
                                    <h3><?php echo $record->title;?></h3>
                                    <p><?php echo \yii\helpers\StringHelper::truncate($record->annotation, 100, '...'); ?></p>
                                </div>
                            </a>
                        </div>
                </div>
                <?php } ?>
                <a href="" class="all-news">Все статьи</a>
            </div>
            <div class="special-project">
                <h4>спецпроекты</h4>
            </div>
            <div class="slider-of-news">
                <div class="content-of-slide">
                    <img src="img/first-slide.png" alt="">
                    <p>Министерство УФАС: антимонопольщики показали, как получить новый автомобиль и не нарушить закон о госзакупках</p>
                </div>
                <div class="content-of-slide">
                    <img src="img/ava-news.png" alt="">
                    <p>Министерство УФАС: антимонопольщики показали, как получить новый автомобиль и не нарушить закон о госзакупках</p>
                </div>
                <div class="content-of-slide">
                    <img src="img/first-slide.png" alt="">
                    <p>Министерство УФАС: антимонопольщики показали, как получить новый автомобиль и не нарушить закон о госзакупках</p>
                </div>
                <div class="content-of-slide">
                    <img src="img/ava-news.png" alt="">
                    <p>Министерство УФАС: антимонопольщики показали, как получить новый автомобиль и не нарушить закон о госзакупках</p>
                </div>
                <div class="content-of-slide">
                    <img src="img/first-slide.png" alt="">
                    <p>Министерство УФАС: антимонопольщики показали, как получить новый автомобиль и не нарушить закон о госзакупках</p>
                </div>
            </div>
            <div class="special-project">
                <h4>Наши партнеры</h4>
            </div>
            <div class="partners">
                <div class="col-lg-2 col-lg-offset-1 col-md-2  col-md-offset-1 col-sm-2 col-sm-offset-1 col-xs-offset-1 col-xs-2">
                    <div class="partner-item">
                        <a href=""><img src="img/rbk.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-2  col-sm-2 col-xs-2">
                    <div class="partner-item">
                        <a href=""><img src="img/ria.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                    <div class="partner-item">
                        <a href=""><img src="img/itar.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                    <div class="partner-item">
                        <a href=""><img src="img/tacc.png" alt="" class="imgsize"></a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                    <div class="partner-item">
                        <a href=""><img src="img/rg.png" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>