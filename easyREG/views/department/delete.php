<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $Departments app\Departmentss\Departments */
/* @var $form ActiveForm */
?>
<div class="department-delete">
    <h4>This information will be deleted ?</h4>
    <?php $form = ActiveForm::begin(['options'=>['id'=>'department-delete']]); ?>
          <?= $form->field($Department, 'name') ?>
        <div class="form-group">
            <?= Html::submitButton('Confirm', ['class' => 'btn btn-danger btn-block']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- Departments-create -->
