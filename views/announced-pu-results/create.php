<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Pollingunit;
use app\models\Party;
use app\helpers\arrayHelper;
//`state_id`, `state_name`

/* @var $this yii\web\View */
/* @var $pollingr app\pollingrs\AnnouncedPuResults */
/* @var $form ActiveForm */
?>
<div class="announced-pu-results-create">
    <div class="well">
    <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($pollingr, 'polling_unit_uniqueid')->dropDownList(Pollingunit::find()
                    ->select(['polling_unit_name', 'uniqueid'])
                    ->indexBy('uniqueid')
                    ->column(), 
                    [
                        'prompt'=>'Select Pollingunit',
                    ], ['class'=>'form-control'])?>
            <table class="table">
                <tbody>
                    <?php foreach ($parties as $party): ?>
                    <tr>
                        <td><?= $form->field($pollingr, 'party_abbreviation[]')->textInput(['readonly'=> true,'value' => $party->partyname]) ?></td>
                        <td><?= $form->field($pollingr, 'party_score[]') ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?= $form->field($pollingr, 'entered_by_user') ?>
        
            <div class="form-group">
                <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
            </div>
        <?php ActiveForm::end(); ?>    

    </div>
</div><!-- announced-pu-results-create -->
