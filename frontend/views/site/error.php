<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = 'Страница не найдена - Ошибка 404';
?>
<div class="block-of-news-wrp">
    <div class="container">
        <div class="content">
            <div class="">
                <div class="col-xs-12">
                    <div class="one-news-position">
                        <div class="alert alert-danger">
                            Страница не найдена - Ошибка 404
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 hidden-xs hidden-md">
                    <div class="">
                        <a href="<?php echo \yii\helpers\Url::to(['/']);?>">Перейти на главную</a>
                        <br>
                        <br>
                        <a href="<?php echo \yii\helpers\Url::to(['news/index']);?>">Новости о закупках</a>
                        <br>
                        <br>
                        <a href="<?php echo \yii\helpers\Url::to(['articles/law']);?>">Законы о закупках</a>
                        <br>
                        <br>
                        <a href="<?php echo \yii\helpers\Url::to(['articles/analytics']);?>">Аналитика закупок</a>
                        <br>
                        <br>
                        <a href="<?php echo \yii\helpers\Url::to(['articles/suppliers']);?>">Поставщику</a>
                        <br>
                        <br>
                        <a href="<?php echo \yii\helpers\Url::to(['articles/customers']);?>">Заказчику</a>

                    </div>
                </div>
                <div class="col-xs-12 hidden-xs hidden-md">
                    <div class="one-news-position">

                    </div>
                </div>
                <div class="col-xs-12 hidden-xs hidden-md">
                    <div class="one-news-position">

                    </div>
                </div>
                <div class="col-xs-12 hidden-xs hidden-md">
                    <div class="one-news-position">

                    </div>
                </div>
                <div class="col-xs-12 hidden-xs">
                    <div class="one-news-position">

                    </div>
                </div>
            </div>


        </div>
    </div>
</div>