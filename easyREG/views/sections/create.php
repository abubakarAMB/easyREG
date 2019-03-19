<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Courses;
use app\models\Lecturers;
use app\models\Schedules;
use app\helpers\arrayHelper;

/* @var $this yii\web\View */
/* @var $sections app\sectionss\Sections */
/* @var $form ActiveForm */
?>
<div class="sections-create">

    <?php $form = ActiveForm::begin(['options'=>[
        'id'=>'sections-create'],]); ?>

        <?= $form->field($sections, 'name') ?>
        <?= $form->field($sections, 'course_id')
            ->dropDownList(Courses::find()
                ->select(['code','id'])
                ->indexBy('id')
                ->column(),['prompt'=>'Select Course']
             );
         ?>
        <?= $form->field($sections, 'schedule_id')
             ->dropDownList(Schedules::find()
                ->select(['name','id'])
                ->indexBy('id')
                ->column(),['prompt'=>'Select Schedule']
             );
         ?>
        
        <?= $form->field($sections, 'lecturer_id')
            ->dropDownList(Lecturers::find()
                ->select(['first_name','id'])
                ->indexBy('id')
                ->column(),['prompt'=>'Select Lecturer']
             );
         ?>
        <?= $form->field($sections, 'room') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- sections-create -->
