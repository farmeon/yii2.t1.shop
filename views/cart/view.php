<?
    use yii\helpers\Html;
    use yii\helpers\Url;
    use yii\widgets\ActiveForm;


if(!empty($session['cart'])):?>
    <?php if( Yii::$app->session->hasFlash('success') ): ?>
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php echo Yii::$app->session->getFlash('success'); ?>
        </div>
    <?php endif;?>

    <?php if( Yii::$app->session->hasFlash('error') ): ?>
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php echo Yii::$app->session->getFlash('error'); ?>
        </div>
    <?php endif;?>
    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <th>Фото</th>
                <th>Наименование</th>
                <th>Кол-во</th>
                <th>Цена</th>
                <th>Сумма</th>
                <th><span class="glyphicon glyphicon-remove"><span</th>
            </tr>
            </thead>
            <tbody>
            <?foreach ($session['cart'] as $id => $item):?>
                <tr>
                    <td><?=\yii\helpers\Html::img("@web/images/products/{$item['img']}")?></td>
                    <td><a href="<?=Url::to(['product/view', 'id'=>$id])?>"><?=$item['name']?></a></td>
                    <td><?=$item['qty']?></td>
                    <td><?=$item['price']?></td>
                    <td><?=$item['price'] * $item['qty']?></td>
                    <td><span data-id="<?=$id?>" class="glyphicon glyphicon-remove text-danger del-item"><span</td>
                </tr>
            <?endforeach;?>
            </tbody>
            <tr>
                <td colspan="4">Итого: </td>
                <td><?=$session['cart.qty']?></td>
            </tr>
            <tr>
                <td colspan="4">Сумма: </td>
                <td><?=$session['cart.summ']?></td>
            </tr>
        </table>
    </div>
    <hr>
    <?$form = ActiveForm::begin()?>
        <?=$form->field($order, 'name')?>
        <?=$form->field($order, 'email')?>
        <?=$form->field($order, 'phone')?>
        <?=$form->field($order, 'address')?>
        <?=Html::submitButton('Заказать', ['class' => 'btn btn-success'])?>
    <?$form = ActiveForm::end()?>
<?else:
    echo "Корзина пуста";
endif;
?>