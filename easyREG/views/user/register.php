<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Departments;
use app\models\Faculties;
use app\helpers\arrayHelper;
/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form ActiveForm */

$this->title = 'Register';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-register well">
    <div class="panel panel-default">
        <div class="panel-body">
        <?php $form = ActiveForm::begin(['options'=>['id'=>'user-register','enableAjaxValidation' => true]]); ?>
            <?= $form->errorSummary($user) ?>
            <?= $form->field($user, 'full_name') ?>
            <?= $form->field($student, 'school_reg_no') ?>
 <?= $form->field($student, 'faculty_id')
                    ->dropDownList(Faculties::find()
                    ->select(['name', 'id'])
                    ->indexBy('id')
                    ->column(), 
                    [
                        'prompt'=>'Select Faculty',
                        'onchange'=>'
                            $.post("'.Yii::$app->urlManager->createUrl('/department/get-dept-by-faculty?id=').'"+$(this).val(), function(data){
                            $("select#students-dept_id").html(data);
                        });'
                    ], ['class'=>'form-control'])?>
        <?= $form->field($student, 'dept_id')
            ->dropDownList([
                        'prompt'=>'Select department',
                        
                    ], ['class'=>'form-control'])?>
            <?= $form->field($student, 'type')->dropDownList(['Full-Time'=>'Full-Time','Part Time'=>'Part-Time'],['prompt'=>'Select status']); ?>
            <?= $form->field($user, 'email') ?>
            <?= $form->field($user, 'username') ?>
            <?= $form->field($user, 'password')->passwordInput(); ?>
            <?= $form->field($user, 'password_repeate')->passwordInput(); ?>
        
            <div class="form-group">
                <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
            </div>
        <?php ActiveForm::end(); ?>
       </div>
    </div>

</div><!-- user-register -->
