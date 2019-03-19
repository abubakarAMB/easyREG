<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Courses;
use app\models\Lecturers;
use app\models\Schedules;
use app\helpers\arrayHelper;

/* @var $this yii\web\View */
/* @var $section app\sections\Section */
/* @var $form ActiveForm */
?>
<div class="section-create">

    <?php $form = ActiveForm::begin(['options'=>[
        'id'=>'section-create'],]); ?>

        <?= $form->field($section, 'name') ?>
        <?= $form->field($section, 'course_id')
            ->dropDownList(Courses::find()
                ->select(['code','id'])
                ->indexBy('id')
                ->column(),['prompt'=>'Select Course']
             );
         ?>
        <?= $form->field($section, 'schedule_id')
             ->dropDownList(Schedules::find()
                ->select(['name','id'])
                ->indexBy('id')
                ->column(),['prompt'=>'Select Schedule']
             );
         ?>
        
        <?= $form->field($section, 'lecturer_id')
            ->dropDownList(Lecturers::find()
                ->select(['first_name','id'])
                ->indexBy('id')
                ->column(),['prompt'=>'Select Lecturer']
             );
         ?>
        <?= $form->field($section, 'room') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- section-create -->
