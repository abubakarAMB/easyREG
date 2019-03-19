<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $lecturers app\lecturerss\lecturers */
/* @var $form ActiveForm */
?>
<div class="lecturer-delete">
    <h4>This information will be deleted ?</h4>
    <?php $form = ActiveForm::begin(['options'=>['id'=>'lecturer-delete']]); ?>
          <?= $form->field($lecturer, 'first_name') ?>
        <div class="form-group">
            <?= Html::submitButton('Confirm', ['class' => 'btn btn-danger btn-block']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- lecturers-create -->
