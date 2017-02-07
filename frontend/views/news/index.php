<?php
$this->title = 'Все новости';
$this->registerMetaTag(['name' => 'description','content' => 'Госзакупки: ФЗ-44, ФЗ-223, ФЗ-94, государственные закупки, электронные торги и открытый конкурс для госзаказа - Все новости']);
?>
<div class="container-news">
    <div class="all-news-blue-wrp">
        <div class="container-news">
            <h1>Все новости</h1>
        </div>
    </div>
    <div class="col-lg-10 pad-n col-md-12">
        <div class="block-of-news block-of-news-all-news">
            <?php
            /* @var $this yii\web\View */


            echo \yii\widgets\ListView::widget([
                'dataProvider' => $dataProvider,
                'itemView' => '@frontend/views/news/_records',
                //'summary' => '<div>Показано {count} из {totalCount} Страница {page} из {pageCount}</div>',
                'summary' => false,
                'summaryOptions' => [
                    'tag' => 'span',
                    'class' => 'my-summary'
                ],
                //'emptyText' => 'Список пуст',
            ]);

            ?>
        </div>
        <div class="special-project">
            <h4>спецпроекты</h4>
        </div>

    </div>


    <div class="col-lg-2">
        <aside class="aside-right-all-news">
            <div class="aside-body-all-news">
                <?php foreach ($newNews as $news) { ?>
                <a href="<?php echo \yii\helpers\Url::to(['news/views', 'id' => $news->id]);?>">
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
