<?php

/* @var $this \yii\web\View */
/* @var $content string */

use frontend\assets\AppAsset;
use yii\helpers\Html;
use frontend\widgets\News;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <?php $this->head() ?>
    </head>
    <body>
    <?php $this->beginBody() ?>

    <header class="header">
        <div class="container-news">
            <div class="header-menu header-menu-all-news">
                <ul>
                    <li><a href="<?php echo \yii\helpers\Url::to(['articles/customers']);?>">Заказчику</a></li>
                    <li><a href="<?php echo \yii\helpers\Url::to(['articles/suppliers']);?>">Поставщику</a></li>
                    <li><a href="<?php echo \yii\helpers\Url::to(['articles/44fz']);?>">44-ФЗ</a></li>
                    <li><a href="<?php echo \yii\helpers\Url::to(['articles/223fz']);?>">223-ФЗ</a></li>
                </ul>

            </div>
            <div class="secondary-menu">
                <button class="open_menu-all-news"><i class="fa fa-bars" aria-hidden="true" id="button-follow"></i></button>
                <ul>
                    <li><a href="<?php echo \yii\helpers\Url::to(['articles/purchase']);?>">Закупки</a></li>
                    <li><a href="<?php echo \yii\helpers\Url::to(['articles/services']);?>">Сервисы</a></li>
                    <li><a href="<?php echo \yii\helpers\Url::to(['articles/law']);?>">Закон</a></li>
                    <li><a href="<?php echo \yii\helpers\Url::to(['articles/world']);?>">В мире</a></li>
                    <li><a href="<?php echo \yii\helpers\Url::to(['articles/analytics']);?>">Аналитика</a></li>
                    <li><a href="<?php echo \yii\helpers\Url::to(['site/infographics']);?>">Инфографика</a></li>
                    <li><a href="<?php echo \yii\helpers\Url::to(['articles/events']);?>">Мероприятия</a></li>
                    <li><a href="<?php echo \yii\helpers\Url::to(['specprojects/all']);?>" class="no-bor-b">Спецпроекты</a></li>
                </ul>
            </div>
        </div>
    </header>


    <main class="main">
        <div class="wrp-to-date">
            <div class="container-news">
                <div class="pad-around">
                    <div class="col-lg-4">
                        <div class="time-s-date">
                            <span><?php echo date('d/m/Y');?></span>
                            <!--<span class="time"><?php /*echo date('H : i : s');*/?></span>-->
                        </div>
                    </div>
                    <div class="subscription">
                        <a href="<?php echo \yii\helpers\Url::to(['site/subscribe']);?>">подписаться</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="wrp-to-logo">
            <div class="container-news">
                <div class="logo">
                    <a href="<?php echo \yii\helpers\Url::to('/');?>"><?php echo Html::img(['img/logo.png']);?></a>
                    <h1 class="about-bye-all-news">ГЛАВНОЕ ОБ ЭЛЕКТРОННЫХ ЗАКУПКАХ</h1>
                </div>
            </div>
        </div>


        <div class="block-of-news-wrp">
            <?= $content ?>
            <div class="container pad-n">
                <div class="col-lg-10 pad-n">
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

    </main>

    <footer class="footer">
        <div class="container">
            <div class="social">
                <span>СЛЕДИТЕ ЗА НОВОСТЯМИ:</span>
                <a href="<?php echo \yii\helpers\Url::to('site/subscribe');?>"><?php echo \yii\helpers\Html::img(['/img/mail.png'],['width'=>'25','height'=>'25']);?></a>
                <a href="https://www.facebook.com/pages/Torg94ru-%D0%BD%D0%BE%D0%B2%D0%BE%D1%81%D1%82%D0%B8-%D0%B8-%D1%81%D1%82%D0%B0%D1%82%D1%8C%D0%B8-%D0%BE-%D0%B3%D0%BE%D1%81%D0%B7%D0%B0%D0%BA%D1%83%D0%BF%D0%BA%D0%B0%D1%85-%D0%AD%D0%A6%D0%9F-%D1%8D%D0%BB%D0%B5%D0%BA%D1%82%D1%80%D0%BE%D0%BD%D0%BD%D1%8B%D1%85-%D1%82%D0%BE%D1%80%D0%B3%D0%B0%D1%85/179865092066104?sk=wall"><?php echo \yii\helpers\Html::img(['/img/fb.png'],['width'=>'25','height'=>'25']);?></a>
                <a href="https://twitter.com/torg94"><?php echo \yii\helpers\Html::img(['/img/twitter.png'],['width'=>'25','height'=>'25']);?></a>
                <!--<a href=""><img src="img/rss.png" alt="" width="25" height="25"></a>-->
            </div>
            <div class="sitemap">
                <a href="">| КАРТА САЙТА |</a>
            </div>
        </div>
    </footer>
    <noindex>
        <!-- Yandex.Metrika counter -->
        <script src="//mc.yandex.ru/metrika/watch.js" type="text/javascript"></script>
        <script type="text/javascript">
            try { var yaCounter1072868 = new Ya.Metrika({id:1072868,
                webvisor:true,
                clickmap:true,
                trackLinks:true,
                accurateTrackBounce:true});
            } catch(e) { }
        </script>
        <noscript><div><img src="//mc.yandex.ru/watch/1072868" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
        <!-- /Yandex.Metrika counter -->
    </noindex>
    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>