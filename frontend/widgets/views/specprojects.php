<div class="slider-of-news-big">
    <?php
    foreach ($news as $new){
        ?>
        <div class="content-of-slide content-of-slide-all-news">
                <?php echo \yii\helpers\Html::img(['/upload/'.$new['picture_text']]);?>
                <h5><a href="<?php echo \yii\helpers\Url::to(['specprojects/views', 'id' => $new['id']]);?>"> <?php echo $new['title']?> </a> </h5>
                <p><?php echo \yii\helpers\StringHelper::truncateWords($new['annotation'], 10, '...'); ?></p>
        </div>
    <?php }?>
</div>
