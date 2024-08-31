<?php
use yii\helpers\Url;
$this->title= "Products and Revenue";
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="revenue-default-index">
    <h1><?= Yii::t("app",$this->title) ?></h1>
    <div class="row">
        <div class="col-md-3 d-grid gap-2">
            <a class="btn btn-lg btn-info btn-block" href="<?= Url::toRoute(['product-type/index']) ?>">Product Types</a>
            <a class="btn btn-lg btn-info btn-block" href="<?= Url::toRoute(['packing-types/index']) ?>">Packing Types</a>
            <a class="btn btn-lg btn-info btn-block" href="<?= Url::toRoute(['product-item/index']) ?>">Product Items Types</a>
        </div>
        <div class="col-md-3 d-grid gap-2">
            <a class="btn btn-lg btn-success btn-block" href="<?= Url::toRoute(['price-list/index']) ?>">Price List</a>
            <a class="btn btn-lg btn-success btn-block" href="<?= Url::toRoute(['discount-types/index']) ?>">Discount Types</a>
            <a class="btn btn-lg btn-success btn-block" href="<?= Url::toRoute(['delivery-modes/index']) ?>">Delivery Modes</a>
        </div>
        <div class="col-md-3 d-grid gap-2">
            <a class="btn btn-lg btn-warning btn-block" href="<?= Url::toRoute(['orders/index']) ?>">Orders</a>
            <a class="btn btn-lg btn-warning btn-block" href="<?= Url::toRoute(['order-item/index']) ?>">Order Items</a>
            <a class="btn btn-lg btn-warning btn-block" href="<?= Url::toRoute(['invoices/index']) ?>">Invoices</a>
        </div>
        <div class="col-md-3 d-grid gap-2">
            <a class="btn btn-lg btn-secondary btn-block" href="<?= Url::toRoute(['exchange-rate/index']) ?>">Exchange Rates</a>
            <a class="btn btn-lg btn-secondary btn-block" href="<?= Url::toRoute(['payment-modes/index']) ?>">Payment Modes</a>
            <a class="btn btn-lg btn-secondary btn-block" href="<?= Url::toRoute(['payments/index']) ?>">Payments</a>
        </div>
    </div>
</div>
