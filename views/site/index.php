<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Booking Tours';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Hi There!</h1>

        <p class="lead">Would you like to view out tours?</p>
        <p><?= Html::a('View Tour List', ['tour/catalog'], ['class' => 'btn btn-lg btn-success']) ?> </p>
    </div>
</div>
