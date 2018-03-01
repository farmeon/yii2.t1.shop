<li>
    <a href="<?=\yii\helpers\Url::to(['brand/view', 'id'=>$category['id']])?>">
        <?=$category['name'];?>
        <span class="pull-right">(<?=$category['brandProductCount']?>)</span>
    </a>
</li>
