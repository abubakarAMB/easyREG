<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $Courses app\Coursess\Courses */
/* @var $form ActiveForm */
?>
<div class="Course-delete">
    <h4>This information will be deleted ?</h4>
    <?php $form = ActiveForm::begin(['options'=>['id'=>'Course-delete']]); ?>
          <?= $form->field($Course, 'name') ?>
        <div class="form-group">
            <?= Html::submitButton('Confirm', ['class' => 'btn btn-danger btn-block']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- Courses-create -->
