<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Departments;
use app\helpers\arrayHelper;


/* @var $this yii\web\View */
/* @var $lecturer app\lecturers\lecturer */
/* @var $form ActiveForm */
//SELECT `id`, `first_name`, `last_name`, `qualification`, `rank`, `type`, `department_id` FROM `lecturer` WHERE 1 
?>
<div class="lecturer-edit">

    <?php $form = ActiveForm::begin(['options'=>[
    	'id'=>'course-create'],]); ?>
        <?= $form->field($lecturer, 'department_id')
            ->dropDownList(Departments::find()
            	->select(['name','id'])
            	->indexBy('id')
            	->column(),['prompt'=>'Select Department']
             );
         ?>
        <?= $form->field($lecturer, 'first_name') ?>
        <?= $form->field($lecturer, 'last_name') ?>
        <?= $form->field($lecturer, 'qualification') ?>
        <?= $form->field($lecturer, 'rank') ?>
         <?= $form->field($lecturer, 'type')->dropDownList([
         	'Full Time'=>'Full Time',
         	'Visiting'=>'Visiting'
         ],['prompt'=>'Select Type']); ?>
    
        <div class="form-group">
            <?= Html::submitButton('Update', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- course-create -->
