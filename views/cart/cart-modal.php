<?php

if(!empty($session['cart'])):?>

<div class="table-responsive">
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>Фото</th>
                <th>Наименование</th>
                <th>Кол-во</th>
                <th>Цена</th>
                <th><span class="glyphicon glyphicon-remove"><span</th>
            </tr>
        </thead>
        <tbody>
            <?foreach ($session['cart'] as $id => $item):?>
                <tr>
                    <td><?=\yii\helpers\Html::img("@web/images/products/{$item['img']}")?></td>
                    <td><?=$item['name']?></td>
                    <td><?=$item['qty']?></td>
                    <td><?=$item['price']?></td>
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

<?else:
    echo "Корзина пуста";
endif;