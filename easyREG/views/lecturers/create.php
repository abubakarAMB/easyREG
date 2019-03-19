<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Departments;
use app\helpers\arrayHelper;


/* @var $this yii\web\View */
/* @var $Lecturers app\Lecturerss\Lecturers */
/* @var $form ActiveForm */
//SELECT `id`, `first_name`, `last_name`, `qualification`, `rank`, `type`, `department_id` FROM `lecturers` WHERE 1 
?>
<div class="lecturers-create">

    <?php $form = ActiveForm::begin(['options'=>[
    	'id'=>'course-create'],]); ?>
        <?= $form->field($Lecturers, 'department_id')
            ->dropDownList(Departments::find()
            	->select(['name','id'])
            	->indexBy('id')
            	->column(),['prompt'=>'Select Department']
             );
         ?>
        <?= $form->field($Lecturers, 'first_name') ?>
        <?= $form->field($Lecturers, 'last_name') ?>
        <?= $form->field($Lecturers, 'qualification') ?>
        <?= $form->field($Lecturers, 'rank') ?>
         <?= $form->field($Lecturers, 'type')->dropDownList([
         	'Full Time'=>'Full Time',
         	'Visiting'=>'Visiting'
         ],['prompt'=>'Select Type']); ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- course-create -->
