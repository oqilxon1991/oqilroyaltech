
<div class="col-sm-3 col-md-3">
    <?php if (!empty($undercat) ): ?>
        <div class="weight">
            <div class="title">
                <h2>Категории </h2>
            </div>
            <div class="product-categories">
                <ul>
                    <?php foreach ($undercat as $ucat): ?>
                    <li><a href="<?= \yii\helpers\Url::to(['category/view', 'id' => $ucat['id']])?>"><?= $ucat->name;?> <span><i class="fa fa-angle-right" aria-hidden="true"></i></span></a></li>
                    <?php endforeach;?>
                </ul>
            </div>
        </div>

    <?php endif;?>
     <!--<div class="weight">
        <div class="title">
            <h2>Categories </h2>
        </div>
        <div class="product-categories">
            <ul>
                <li><a href="#">Laptop & Computer   <span><i class="fa fa-angle-right" aria-hidden="true"></i></span></a></li>
                <li><a href="#">Accessories    <span><i class="fa fa-angle-right" aria-hidden="true"></i></span></a></li>
                <li><a href="#">Gaming   <span><i class="fa fa-angle-right" aria-hidden="true"></i></span></a></li>
                <li><a href="#">Mac Computers   <span><i class="fa fa-angle-right" aria-hidden="true"></i></span></a></li>
                <li><a href="#">Ultrabooks  <span><i class="fa fa-angle-right" aria-hidden="true"></i></span></a></li>
                <li><a href="#">Printers & Ink   <span><i class="fa fa-angle-right" aria-hidden="true"></i></span></a></li>
            </ul>
        </div>
    </div>-->
    <div class="weight">
        <div class="title">
            <h2>Фильтры </h2>
        </div>
        <div class="filter-outer">
            <?php if (!empty($brands) ): ?>
            <div class="brands">
                <h3>Бренды </h3>
                <ul>
                <?php foreach ($brands as $brand): ?>
                    <li><a href="<?= \yii\helpers\Url::to(['category/view', 'id' => $brand['id']])?>"><?= $brand->name;?> <span>(7) </span></a></li>
                    <?php endforeach;?>
                </ul>
            </div>
            <?php endif;?>

            <!--<h3>Цвета </h3>
            <div class="button-slider">
                <div class="btn-group">
                    <div class="btn btn-default">
                        <p>Цена:  <strong>$ <span id="sliderValue">100.0 </span></strong> -  <strong>$ <span id="sliderValue2">1.700.00 </span></strong>  </p>
                        <input id="bootstrap-slider" data-slider-min="1" data-slider-max="1700" data-slider-step="1" data-slider-value="100" type="text" />
                        <div class="valueLabelblck">Filter </div>
                    </div>
                </div>
            </div>-->

            <!--<div>
                Цена: <input type="text" placeholder="от" class="left-cost"> - <input type="text" placeholder="до" class="left-cost">
            </div>-->
            <!-- End of Bootstrap Pricing Slider by ZsharE -->
            <?php if (!empty($color) ): ?>
            <div class="color">
                <h3>Цвета </h3>
                <ul>
                    <?php foreach ($color as $data): ?>
                    <li><a href="<?= \yii\helpers\Url::to(['category/view', 'id' => $data['id']])?>" style="background: <?=$data->color?> none repeat scroll 0 0;"><span></span></a></li>
                    <?php endforeach;?>
                </ul>
            </div>
            <?php endif;?>
            <!--<div class="size">
                <h3>Size </h3>
                <ul>
                    <li><a href="#">L  </a></li>
                    <li><a href="#">M  </a></li>
                    <li><a href="#">S  </a></li>
                    <li><a href="#">XL </a></li>
                    <li><a href="#">XXL </a></li>
                </ul>
            </div>-->
        </div>
    </div>

</div>