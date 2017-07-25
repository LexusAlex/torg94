<?php

/* @var $this yii\web\View */

$this->title = 'Госзакупки: ФЗ-44, ФЗ-223, ФЗ-94, государственные закупки, электронные торги и открытый конкурс для госзаказа - поговорим об этом неофициально';
$this->registerMetaTag(['name' => 'description','content' => "В июле 2005 года вступил в силу Федеральный закон №94. (ФЗ 94) регламентирующий госзакупки. С 2012 года действует закон ФЗ-223, а с января 2014 на смену 94-ФЗ пришел закон о контрактной системе (ФЗ-44). Данный сайт создан для того, чтобы его посетители получили законодательную информацию по участию в госторгах, узнали новости и ознакомились с полезными статьями, были в курсе изменений в Федеральном законодательстве (ФЗ-44, ФЗ-223), а также узнали информацию о получении электронной подписи (ЭП). "]);
$this->registerMetaTag(['name' => 'keywords','content' => "223-ФЗ, 44-ФЗ, Закупки, Заказчикам, Поставщикам, Госзакупки, ФЗ-44, ФЗ-223, ФЗ-94, государственные закупки, электронные торги, тендеры"]);

$this->registerMetaTag(['property' => 'og:title','content' => "Госзакупки: ФЗ-44, ФЗ-223, ФЗ-94, государственные закупки, электронные торги и открытый конкурс для госзаказа - поговорим об этом неофициально"]);
$this->registerMetaTag(['property' => 'og:description','content' => "В июле 2005 года вступил в силу Федеральный закон №94. (ФЗ 94) регламентирующий госзакупки. С 2012 года действует закон ФЗ-223, а с января 2014 на смену 94-ФЗ пришел закон о контрактной системе (ФЗ-44). Данный сайт создан для того, чтобы его посетители получили законодательную информацию по участию в госторгах, узнали новости и ознакомились с полезными статьями, были в курсе изменений в Федеральном законодательстве (ФЗ-44, ФЗ-223), а также узнали информацию о получении электронной подписи (ЭП)."]);
$this->registerMetaTag(['property' => "og:url", 'content' => \yii\helpers\Url::base(true)]);
?>
<div class="infographic-wrp">
    <div class="container">
        <div class="content">
            <div class="infographic">
                <span>Прямая линия</span>
            </div>
            <div class="statistic-wrp">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="statistic">
                        <h1 style="color: white;font-size: 19px; line-height: 29px;margin-top: 18px">"ГОРЯЧАЯ ЛИНИЯ"</h1>
                        <p style="color: white;font-size: 14px; line-height: 25px">
                            С 25 по 30 июля задайте вопрос <b>генеральному директору</b> электронной торговой площадки ТЭК-Торг <b>ДМИТРИЮ СЫТИНУ</b> в рамках горячей линии Т94.
                        </p>
                        <p style="color: white;font-size: 14px; line-height: 25px">
                            Ответы на ваши вопросы будут опубликованы на Т94 во вторник 1 августа.
                        </p>
                        <!--<canvas id="market" width="100" height="100"></canvas>-->
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="statistic" style="margin: 0">
                        <a href="<?php echo \yii\helpers\Url::to(['site/airline']);?>" title="Задать вопрос Дмитрию Сытину">
                        <?php echo \yii\helpers\Html::img(['/img/speak_small.jpg'],['alt'=> '','width'=>'160','height'=>'240']);?>
                        </a>
                       <!-- <canvas id="market-three" width="100" height="100"></canvas>-->
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
                <?php foreach ($record as $rec){ ?>
                    <div class="col-lg-6 pad-no col-md-6 col-sm-6 col-xs-12">
                        <div class="one-news-position">
                            <a href="<?php echo \yii\helpers\Url::to(['articles/views', 'id' => $rec->id]);?>">
                                <?php echo \yii\helpers\Html::img(['/upload/'.$rec->picture_text],['alt'=> $rec->title]);?>
                                <div class="only-info">
                                    <span><?php echo \Yii::$app->formatter->asDatetime($rec->date, "php:d/m/Y");?></span>
                                    <h4><?php echo $rec->cat;?></h4>
                                    <h3><?php echo $rec->title;?></h3>
                                    <p><?php echo \yii\helpers\StringHelper::truncateWords($rec->annotation, 7, ''); ?></p>
                                </div>
                            </a>
                        </div>
                </div>
                <?php } ?>
                <a style="padding-top: 30px" href="<?php echo \yii\helpers\Url::to(['articles/index']);?>" class="all-news">Все статьи</a>
            </div>
            <div class="special-project">
                <h4>спецпроекты</h4>
            </div>
            <?= \frontend\widgets\Specprojects::widget(); ?>
            <div class="special-project">
                <h4>Наши партнеры</h4>
            </div>
            <div class="partners">
                <div class="col-lg-2 col-lg-offset-1 col-md-2  col-md-offset-1 col-sm-2 col-sm-offset-1 col-xs-offset-1 col-xs-2">
                    <div class="partner-item">
                        <a href="http://www.rbc.ru/"><?php echo \yii\helpers\Html::img(['/img/rbk.png']);?></a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-2  col-sm-2 col-xs-2">
                    <div class="partner-item">
                        <a href="http://www.ria.ru/"><?php echo \yii\helpers\Html::img(['/img/ria.png']);?></a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                    <div class="partner-item">
                        <a href="http://tass.ru/"><?php echo \yii\helpers\Html::img(['/img/itar.png']);?></a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                    <div class="partner-item">
                        <a href="http://tass.ru/"><?php echo \yii\helpers\Html::img(['/img/tacc.png'],['class'=>'imgsize']);?></a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                    <div class="partner-item">
                        <a href="https://rg.ru/"><?php echo \yii\helpers\Html::img(['/img/rg.png']);?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>