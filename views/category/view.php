<?php

/* @var $this yii\web\View */
use yii\helpers\Html;

?>
    <section id="advertisement">
		<div class="container">
            <?=Html::img('@web/images/shop/1.jpg')?>
		</div>
	</section>
	<section>
		<div class="container">
			<div class="row">
                <div class="col-sm-3">
                    <div class="left-sidebar">
                        <h2>Category</h2>
                        <ul class="catalog category-products">
                            <?=app\components\MenuWidget::widget(['tpl' => 'menu']);?>
                        </ul>
                        <div class="brands_products"><!--brands_products-->
                            <h2>Brands</h2>
                            <div class="brands-name">
                                <ul class="nav nav-pills nav-stacked">
                                    <?=app\components\BrandWidget::widget(['tpl' => 'brand_ul']);?>
                                </ul>
                            </div>
                        </div><!--/brands_products-->

                        <div class="price-range"><!--price-range-->
                            <h2>Price Range</h2>
                            <div class="well text-center">
                                <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
                                <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
                            </div>
                        </div><!--/price-range-->

                        <div class="shipping text-center"><!--shipping-->
                            <img src="images/home/shipping.jpg" alt="" />
                        </div><!--/shipping-->

                    </div>
                </div>

				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center"><?=$category->name?></h2>
                        <?if(!empty($products)):?>
                            <?foreach ($products as $product){?>
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <?=Html::img("@web/images/products/{$product->img}", ['alt'=> $product->name])?>
                                                <h2><?=$product->price?></h2>
                                                <p><a href="<?=\yii\helpers\Url::to(['product/view', 'id' => $product->id])?>"><?=$product->name?></a></p>
                                                <a  data-id="<?=$product->id?>" class="btn btn-fefault add-to-cart cart">
                                                    <i class="fa fa-shopping-cart"></i>
                                                    Add to cart
                                                </a>
                                            </div>
                                            <!--<div class="product-overlay">
                                                <div class="overlay-content">
                                                    <h2><?=$product->price?></h2>
                                                    <p><?=$product->name?></p>
                                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                                </div>
                                            </div>-->
                                            <?
                                            if($product->new){
                                                echo Html::img("@web/images/home/new.png",['class'=> 'new']);
                                            }
                                            if($product->sale){
                                                echo Html::img("@web/images/home/sale.png",['class'=> 'new']);
                                            }
                                            ?>
                                        </div>
                                        <div class="choose">
                                            <ul class="nav nav-pills nav-justified">
                                                <li><a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                                <li><a href=""><i class="fa fa-plus-square"></i>Add to compare</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            <?}?>
                            <div class="clearfix"></div>
                            <?echo \yii\widgets\LinkPager::widget(['pagination' => $pages])?>
                        <?endif;?>
					</div><!--features_items-->
				</div>
			</div>
		</div>
	</section>