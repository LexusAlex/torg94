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
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <script type="text/javascript">
            var _gaq = _gaq || [];
            _gaq.push(['_setAccount', 'UA-22336537-1']);
            _gaq.push(['_trackPageview']);

            (function() {
                var ga = document.createElement('script'); ga.type =
                    'text/javascript'; ga.async = true;
                ga.src = ('https:' == document.location.protocol ? 'https://ssl' :
                        'http://www') + '.google-analytics.com/ga.js';
                var s = document.getElementsByTagName('script')[0];
                s.parentNode.insertBefore(ga, s);
            })();
        </script>
        <link rel="alternate" type="application/rss+xml" title="Госзакупки: ФЗ-44, ФЗ-223, ФЗ-94, государственные закупки, электронные торги и открытый конкурс для госзаказа - поговорим об этом неофициально" href="http://torg94.ru/rss"/>
        <?php $this->head() ?>
    </head>
    <body>
    <?php $this->beginBody() ?>
    <header class="header">
        <div class="container">
            <div class="content">
                <div class="header-menu">
                    <ul>
                        <li><a href="<?php echo \yii\helpers\Url::to(['articles/customers']);?>">Заказчику</a></li>
                        <li><a href="<?php echo \yii\helpers\Url::to(['articles/suppliers']);?>">Поставщику</a></li>
                        <li><a href="<?php echo \yii\helpers\Url::to(['articles/44fz']);?>">44-ФЗ</a></li>
                        <li><a href="<?php echo \yii\helpers\Url::to(['articles/223fz']);?>">223-ФЗ</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>

    <div class="container">
        <aside class="aside-right">
            <div class="aside-menu">
                <button class="open_menu"><i class="fa fa-bars" aria-hidden="true" id="button-follow"></i></button>
                <ul id="fix-menu">
                    <li><a href="<?php echo \yii\helpers\Url::to(['articles/purchase']);?>">Закупки</a></li>
                    <li><a href="<?php echo \yii\helpers\Url::to(['articles/services']);?>">Сервисы</a></li>
                    <li><a href="<?php echo \yii\helpers\Url::to(['articles/law']);?>">Закон</a></li>
                    <li><a href="<?php echo \yii\helpers\Url::to(['articles/world']);?>">В мире</a></li>
                    <li><a href="<?php echo \yii\helpers\Url::to(['articles/analytics']);?>">Аналитика</a></li>
                    <li><a href="<?php echo \yii\helpers\Url::to(['site/infographics']);?>">Инфографика</a></li>
                    <li><a href="<?php echo \yii\helpers\Url::to(['articles/events']);?>">Мероприятия</a></li>
                    <li><a href="<?php echo \yii\helpers\Url::to(['specprojects/all']);?>" class="no-bor-b">Спецпроекты</a></li>
                </ul>
                <div class="tec_banner">
                    <a href="http://probusinesstv.ru/programs/248/18277/"><?php echo Html::img(['img/baner_TEC.jpg'],['style' => 'width:100%']);?></a>
                </div>
            </div>
        </aside>

        <aside class="aside-left">
            <h3>НОВОСТИ</h3>
            <?= News::widget(); ?>
            <a href="<?php echo \yii\helpers\Url::to(['news/index ']);?>" class="all-news">Все новости</a>
        </aside>
    </div>
    <main class="main">
        <div class="wrp-to-date">
            <div class="container">
                <div class="content">
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
        </div>
        <div class="wrp-to-logo">
            <div class="container">
                <div class="content">
                    <div class="logo">
                        <a href="<?php echo \yii\helpers\Url::to('/');?>"><?php echo Html::img(['img/logo.png']);?></a>
                        <h1>ГЛАВНОЕ ОБ ЭЛЕКТРОННЫХ ЗАКУПКАХ</h1>
                    </div>
                </div>
            </div>
        </div>
        <?= $content ?>
    </main>
    <footer class="footer">
        <div class="container">
            <div class="social">
                <span>СЛЕДИТЕ ЗА НОВОСТЯМИ:</span>
                <a href="<?php echo \yii\helpers\Url::to(['site/subscribe']);?>"><?php echo \yii\helpers\Html::img(['/img/mail.png'],['width'=>'25','height'=>'25']);?></a>
                <a href="https://www.facebook.com/pages/Torg94ru-%D0%BD%D0%BE%D0%B2%D0%BE%D1%81%D1%82%D0%B8-%D0%B8-%D1%81%D1%82%D0%B0%D1%82%D1%8C%D0%B8-%D0%BE-%D0%B3%D0%BE%D1%81%D0%B7%D0%B0%D0%BA%D1%83%D0%BF%D0%BA%D0%B0%D1%85-%D0%AD%D0%A6%D0%9F-%D1%8D%D0%BB%D0%B5%D0%BA%D1%82%D1%80%D0%BE%D0%BD%D0%BD%D1%8B%D1%85-%D1%82%D0%BE%D1%80%D0%B3%D0%B0%D1%85/179865092066104?sk=wall"><?php echo \yii\helpers\Html::img(['/img/fb.png'],['width'=>'25','height'=>'25']);?></a>
                <a href="https://twitter.com/torg94"><?php echo \yii\helpers\Html::img(['/img/twitter.png'],['width'=>'25','height'=>'25']);?></a>
                <a href="http://torg94.ru/rss"><?php echo \yii\helpers\Html::img(['/img/rss.png'],['width'=>'25','height'=>'25']);?></a>
            </div>
            <div class="sitemap">
                <a href="<?php echo \yii\helpers\Url::to(['site/contacts']);?>">| Контакты |</a>
            </div>
        </div>
    </footer>

    <!-- Modals

     <div class="modal">
        <div class="box-modal col-lg-5 col-md-5 col-sm-6 col-xs-12" id="exampleModalone">
            <div class="box-modal_close arcticmodal-close first-close-item">
              <img src="../img/close.png" alt="">
            </div>
            <div class="content_first">
                  <div class="form-to-connect-modal">
                    <span>Оставьте Ваши данные и мы свяжемся с Вами!</span>
                    <form>
                      <fieldset class="name-input"><input type="text" placeholder="Имя"></fieldset>
                      <fieldset class="name-input-mail"><input type="text" placeholder="E-mail"></fieldset>
                      <fieldset class="name-input-tel"><input type="tel" placeholder="Телефон*" id="phone"></fieldset>
                      <button type="submit" id="reg_form_one-thank">Свяжитесь со мной!</button>
                    </form>
                    <p>Поля помеченные * являются обязательными для заполнения.<br>Мы не передаём Ваши данные третьим лицам</p>
                  </div>
            </div>
        </div>
      </div>
    -->

    <!-- /Modals -->
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