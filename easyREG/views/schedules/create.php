<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $Schedules app\Scheduless\Schedules */
/* @var $form ActiveForm */
?>
<div class="schedules-create">

    <?php $form = ActiveForm::begin(['options'=>[
    	'id'=>'schedules-create'],]); ?>

        <?= $form->field($Schedules, 'name') ?>
        <?= $form->field($Schedules, 'day') ?>
        <?= $form->field($Schedules, 'start_time') ?>
        <?= $form->field($Schedules, 'end_time') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- schedules-create -->
