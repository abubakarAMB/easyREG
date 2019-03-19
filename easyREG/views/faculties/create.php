<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\helpers\arrayHelper;
/* @var $this yii\web\View */
/* @var $Departments app\Departmentss\Departments */
/* @var $form ActiveForm */
//`name`, `alias`
?>
<div class="faculties-create">

    <?php $form = ActiveForm::begin(['options'=>['id'=>'faculties-create'],]); ?>
        <?= $form->field($faculties, 'name') ?>
        <?= $form->field($faculties, 'alias') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- department-create -->
