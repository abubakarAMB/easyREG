<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $schedules app\scheduless\schedules */
/* @var $form ActiveForm */
?>
<div class="schedule-delete">
    <h4>This information will be deleted ?</h4>
    <?php $form = ActiveForm::begin(['options'=>['id'=>'schedule-delete']]); ?>
          <?= $form->field($schedule, 'name') ?>
        <div class="form-group">
            <?= Html::submitButton('Confirm', ['class' => 'btn btn-danger btn-block']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- schedules-create -->
