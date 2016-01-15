<?php
/* @var $tours */

use yii\helpers\Html;

$this->title = 'Tours Catalog';
?>

<h1>Tours Catalog</h1>
<hr />
<div class="row">
    <?php foreach($tours as $tour): ?>
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <?= Html::a($tour->name, ['view', 'id' => $tour->id]) ?>
                    </h3>
                </div>
                <div class="panel-body">
                    <?= $tour->substrDescription() ?>
                </div>
            </div>
        </div>
    <?php endforeach ?>
</div>


