<?php
/* @var $tour */
/* @var $booking */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use dosamigos\datepicker\DatePicker;
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
            <div class="col-md-12">

                <label class="control-label" for="booking-date">Select Date</label>
                <?php $form = ActiveForm::begin(['id' => 'booking-form']); ?>
                <?= DatePicker::widget([
                    'model' => $booking,
                    'attribute' => 'date',
                    'template' => '{addon}{input}',
                    'clientOptions' => [
                        'autoclose' => true,
                        'startDate' => date_default_timezone_get(),
                        'format' => 'yyyy-mm-dd'
                    ]
                ]);?>
            </div>


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


