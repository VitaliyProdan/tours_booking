<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Tour */

$this->title = $model->name;
//$this->params['breadcrumbs'][] = ['label' => 'Tours', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tour-view">
    <h1><?= Html::encode($this->title) ?></h1>
    <hr />
    <?php if(!empty(Yii::$app->session->getFlash('success'))): ?>
    <div class="alert alert-success" role="alert">
        <?= Yii::$app->session->getFlash('success'); ?>
    </div>
    <?php endif ?>
    <?php if (!Yii::$app->user->isGuest): ?>
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <?php endif ?>

    <p><?= $model->description ?></p>

    <?= Html::a('Make a Reservation', ['booking/create', 'id' => $model->id], ['class' => 'btn btn-warning']) ?>

</div>
