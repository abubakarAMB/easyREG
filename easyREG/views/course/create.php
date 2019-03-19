<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Departments;
use app\models\Faculties;
use app\helpers\arrayHelper;


/* @var $this yii\web\View */
/* @var $courses app\coursess\Courses */
/* @var $form ActiveForm */
?>
<div class="course-create">

    <?php $form = ActiveForm::begin(['options'=>[
    	'id'=>'course-create'],]); ?>

    <?= $form->field($courses, 'faculty_id')
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
        <?= $form->field($courses, 'department_id')
            ->dropDownList([
                        'prompt'=>'Select department',
                        
                    ], ['class'=>'form-control'])?>
        <?= $form->field($courses, 'name') ?>
        <?= $form->field($courses, 'code') ?>
        <?= $form->field($courses, 'credit') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- course-create -->
