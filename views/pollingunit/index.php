<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Pollingunit */
/* @var $form ActiveForm */
?>
<div class="pollingunit-index">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'polling_unit_id') ?>
        <?= $form->field($model, 'ward_id') ?>
        <?= $form->field($model, 'lga_id') ?>
        <?= $form->field($model, 'uniquewardid') ?>
        <?= $form->field($model, 'polling_unit_description') ?>
        <?= $form->field($model, 'date_entered') ?>
        <?= $form->field($model, 'polling_unit_number') ?>
        <?= $form->field($model, 'polling_unit_name') ?>
        <?= $form->field($model, 'entered_by_user') ?>
        <?= $form->field($model, 'user_ip_address') ?>
        <?= $form->field($model, 'lat') ?>
        <?= $form->field($model, 'long') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- pollingunit-index -->
