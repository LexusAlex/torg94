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
                    <li><a href="<?php echo \yii\helpers\Url::to(['articles/purchase']);?>">ЗАКУПКИ</a></li>
                    <li><a href="<?php echo \yii\helpers\Url::to(['articles/services']);?>">СЕРВИСЫ</a></li>
                    <li><a href="<?php echo \yii\helpers\Url::to(['articles/law']);?>">ЗАКОН</a></li>
                    <li><a href="<?php echo \yii\helpers\Url::to(['articles/world']);?>">В МИРЕ</a></li>
                    <li><a href="<?php echo \yii\helpers\Url::to(['articles/analytics']);?>">АНАЛИТИКА</a></li>
                    <li><a href="">ИНФОГРАФИКА</a></li>
                    <li><a href="<?php echo \yii\helpers\Url::to(['articles/events']);?>">МЕРОПРИЯТИЯ</a></li>
                    <li><a href="" class="no-bor-b">СПЕЦПРОЕКТЫ</a></li>
                </ul>
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
                                <span class="time"><?php echo date('H : i : s');?></span>
                            </div>
                        </div>
                        <div class="subscription">
                            <a href="">подписаться</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="wrp-to-logo">
            <div class="container">
                <div class="content">
                    <div class="logo">
                        <a href=""><?php echo Html::img(['img/logo.png']);?></a>
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
                <a href=""><img src="img/mail.png" alt="" width="25" height="25"></a>
                <a href=""><img src="img/fb.png" alt="" width="25" height="25"></a>
                <a href=""><img src="img/twitter.png" alt="" width="25" height="25"></a>
                <a href=""><img src="img/rss.png" alt="" width="25" height="25"></a>
            </div>
            <div class="sitemap">
                <a href="">| КАРТА САЙТА |</a>
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
    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>