<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $poling app\polings\Pollingunit */
/* @var $form ActiveForm */
?>
<div class="pollingunit-index">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($poling, 'polling_unit_id') ?>
        <?= $form->field($poling, 'ward_id') ?>
        <?= $form->field($poling, 'lga_id') ?>
        <?= $form->field($poling, 'uniquewardid') ?>
        <?= $form->field($poling, 'polling_unit_description') ?>
        <?= $form->field($poling, 'date_entered') ?>
        <?= $form->field($poling, 'polling_unit_number') ?>
        <?= $form->field($poling, 'polling_unit_name') ?>
        <?= $form->field($poling, 'entered_by_user') ?>
        <?= $form->field($poling, 'user_ip_address') ?>
        <?= $form->field($poling, 'lat') ?>
        <?= $form->field($poling, 'long') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- pollingunit-index -->
