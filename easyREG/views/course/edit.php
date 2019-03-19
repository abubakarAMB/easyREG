<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Departments;
use app\models\Faculties;
use app\helpers\arrayHelper;


/* @var $this yii\web\View */
/* @var $course app\courses\Course */
/* @var $form ActiveForm */
?>
<div class="course-create">

    <?php $form = ActiveForm::begin(['options'=>[
        'id'=>'course-create'],]); ?>

    <?= $form->field($course, 'faculty_id')
                    ->dropDownList(Faculties::find()
                    ->select(['name', 'id'])
                    ->indexBy('id')
                    ->column(), 
                    [
                        'prompt'=>'Select Faculty',
                        'onchange'=>'
                            $.post("'.Yii::$app->urlManager->createUrl('/department/get-dept-by-faculty?id=').'"+$(this).val(), function(data){
                            $("select#courses-department_id").html(data);
                        });'
                    ], ['class'=>'form-control'])?>
        <?= $form->field($course, 'department_id')
            ->dropDownList([
                        'prompt'=>'Select department',
                        
                    ], ['class'=>'form-control'])?>
        <?= $form->field($course, 'name') ?>
        <?= $form->field($course, 'code') ?>
        <?= $form->field($course, 'credit') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- course-create -->
