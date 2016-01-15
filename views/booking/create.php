<?php
/* @var $tour */
/* @var $booking */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
$this->title = 'Booking ' . $tour->name ;
?>

<h1><?= $this->title ?></h1>
<hr />
<p><?= $tour->description ?></p>

<div class="row">

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Please Fill The Form</h3>
        </div>
        <div class="panel-body">
            <?php $form = ActiveForm::begin(['id' => 'booking-form']); ?>
            <?php foreach($tour->customFields as $field): ?>
                <div class="col-sm-12">
                    <?= $form->field($field, "$field->id")->textInput(['maxlength' => true, 'value' => ''])->label($field->name) ?>
                </div>
            <?php endforeach ?>
            <?= Html::submitButton('Submit', ['class' => 'btn btn-success btn-lg']) ?>
            <?php ActiveForm::end(); ?>
        </div>
    </div>


</div>


