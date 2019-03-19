<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $schedule app\schedules\schedule */
/* @var $form ActiveForm */
?>
<div class="schedule-edit">

    <?php $form = ActiveForm::begin(['options'=>[
    	'id'=>'schedule-edit'],]); ?>

        <?= $form->field($schedule, 'name') ?>
        <?= $form->field($schedule, 'day') ?>
        <?= $form->field($schedule, 'start_time') ?>
        <?= $form->field($schedule, 'end_time') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- schedule-create -->
