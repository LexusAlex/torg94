<?php
foreach ($news as $k=>$new){
?>
    <div class="asid-news <?php if($k == 4){ echo 'last-news';}?>">
        <a href="<?php echo \yii\helpers\Url::to(['news/views', 'id' => $new['id']]);?>">
            <ul>
                <li>
                    <span><?php echo date('d.m.Y H:i', strtotime($new['date']));?></span>
                    <h5>/ <?php echo $new['title']?></h5>
                    <p><?php echo \yii\helpers\StringHelper::truncateWords($new['annotation'], 7, '...'); ?></p>
                </li>
            </ul>
        </a>
    </div>
<?php }?>