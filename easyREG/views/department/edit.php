<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Faculties;
/* @var $this yii\web\View */
/* @var $Departments app\Departmentss\Departments */
/* @var $form ActiveForm */
?>
<div class="department-create">

    <?php $form = ActiveForm::begin(); ?>
        <?= $form->field($Departments, 'faculty_id')
            ->dropDownList(Faculties::find()
            	->select(['name','id'])
            	->indexBy('id')
            	->column(),['prompt'=>'Select Faculty']
             );
         ?>
        <?= $form->field($Departments, 'location') ?>
        <?= $form->field($Departments, 'name') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Update', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- department-create -->
