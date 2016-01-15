<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Tour */

$this->title = 'Booking # '. $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Bookings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="booking-view">
    <h1> <?= $this->title ?></h1>
    <hr />
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><?= Html::encode($model->tour->name) ?></h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <?php foreach($model->encodedResults as $result) : ?>
                    <div class="col-md-6">
                        <strong class="pull-right"><?= $result->field ?> :</strong>
                    </div>
                    <div class="col-md-6">
                        <?= $result->value ?>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>
</div>
