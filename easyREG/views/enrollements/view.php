<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<div class="enrollement-view">
 <?php if(!empty($details)): ?>
	<div class="well">
		<?php //SELECT `id`, `enrollement_id`, `comment`, `status` FROM `enrollement_details` WHERE 1 ?>
	<table class="table table-striped table-bordered table-hover">
		<tbody>
			<tr>
				<td>Status</td>
				<td><?=$details->status; ?></td>
			</tr>
			<tr>
				<td>Comment</td>
				<td><?=$details->comment; ?></td>
			</tr>
		</tbody>
	</table>
		
	</div>
<?php endif;?>
<div class="alert alert-info"><p><?=$status?></p></div>
</div>