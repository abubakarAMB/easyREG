<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Sections;
use app\helpers\arrayHelper;


/* @var $this yii\web\View */
/* @var $model app\models\Enrollements */
/* @var $form ActiveForm */

$this->title ='Enrollements';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="enrollements-create">
    <h1 class="page-header">Students Enrollement <a href="index" class="btn btn-primary pull-right">View Enrollements</a></h1>
	<div class="well">
        <div class="panel panel-default">
        <div class="panel-body">
            <?php $form = ActiveForm::begin(['options'=>['id'=>'enrollements-create'],]); ?>
            <?= $form->field($enrollements, 'section_id')
                ->dropDownList(Sections::find()
                    ->select(['name','id'])
                    ->indexBy('id')
                    ->column(),['multiple'=>'multiple','selected'=>'selected']
                 );
             ?>   
            <div class="form-group">
                <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
                <?="Make sure to select all courses before clicking on the save button"?>
            </div>
           <?php ActiveForm::end(); ?>
        </div>
        </div>
	</div>
</div><!-- enrollements-create -->
