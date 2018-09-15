<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\States;
use app\helpers\arrayHelper;
//`state_id`, `state_name`

/* @var $this yii\web\View */
/* @var $pollingunit app\pollingunits\Pollingunit */
/* @var $form ActiveForm */
//uniqueid`, `lga_id`, `lga_name`, `state_id`, `lga_description`, `entered_by_user`, `date_entered`, `user_ip_address`
$this->title ='View Votes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pollingunit-index">
<div class="well">
       <?php $form = ActiveForm::begin(); ?>
       <?= $form->field($lga, 'state_id')->dropDownList(States::find()
                    ->select(['state_name', 'state_id'])
                    ->indexBy('state_id')
                    ->column(), 
                    [
                        'prompt'=>'Select State',
                        'onchange'=>'
                            $.post("'.Yii::$app->urlManager->createUrl('/lga/get-lga-by-state?id=').'"+$(this).val(), function(data){
                            $("select#lga-lga_id").html(data);
                        });'
                    ], ['class'=>'form-control'])?>

		        <?= $form->field($lga, 'lga_id')
		            ->dropDownList(['prompt'=>'Select Lga'], ['class'=>'form-control'])
		        ?>
            <?= Html::submitButton('View Result', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>
</div>

</div><!-- pollingunit-index -->
