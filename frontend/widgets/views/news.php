<?php
foreach ($news as $new){
?>
    <div class="asid-news">
        <a href="<?php echo \yii\helpers\Url::to(['news/index', 'id' => $new['id']]);?>">
            <ul>
                <li>
                    <span><?php echo \Yii::$app->formatter->asDatetime($new['date'], "php:d.m.Y H:i:s");?></span>
                    <h5>/ <?php echo $new['title']?></h5>
                    <p><?php echo \yii\helpers\StringHelper::truncate($new['annotation'], 100, '...'); ?></p>
                </li>
            </ul>
        </a>
    </div>
<?php }?>