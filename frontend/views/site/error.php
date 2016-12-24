<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>
<div class="block-of-news-wrp">
    <div class="container">
        <div class="content">
            <div class="">
                <div class="col-xs-12">
                    <div class="one-news-position">
                        <div class="alert alert-danger">
                            <?= nl2br(Html::encode($message)) ?>
                        </div>
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