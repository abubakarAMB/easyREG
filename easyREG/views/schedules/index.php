<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\widgets\linkpager;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
$this->title ='Schedules';
$this->params['breadcrumbs'][] = $this->title;
?>
<h1 class="page-header"><?=$this->title?><?=Html::button('Add schedule?',['value'=>URL::to('create'),'class'=>'btn btn-primary pull-right modalButton', 'id'=>'modalButton']) ?></h1>
<?php if(!empty($Schedules)): ?>
<div class="well">
    <table class="table table-striped table-bordered">
	 <thead>
	    <th>Name</th>
	    <th>Day(s)</th>
	    <th>Start Time</th>
	    <th>End Time</th>
	    <th>Update</th>
	    <th>Delete</th>
     </thead>
     <tbody>
     	<?php foreach ($Schedules as $schedule): ?>
		  <tr>
		  	<?php   //SSELECT `id`, `name`, `day`, `start_time`, `end_time` FROM `schedules` WHERE 1 ?>
		    <td><?php echo $schedule->name;  ?></td>
		    <td><?php echo $schedule->day;  ?></td>
		    <td><?php echo $schedule->start_time;  ?></td>
		    <td><?php echo $schedule->end_time;  ?></td>
		    <td><?=Html::button('edit',['value'=>URL::to(['edit','id'=>$schedule->id]),'class'=>'btn btn-primary modalButton', 'id'=>'modalButton']) ?></td>
		    <td><?=Html::button('delete',['value'=>URL::to(['delete','id'=>$schedule->id]),'class'=>'btn btn-danger deleteButton', 'id'=>'deleteButton']) ?></td>
		  </tr>
        <?php endforeach;?>
     </tbody>
   </table>

</div>

<?php else:?>


<div class="well">
    <p>No Schedules yet!</p>
</div>
<?php endif;?>
<!--Modal window for delete-->
<?php Modal::begin([
   'header'=>'<h2>Schedules Info</h2>',
    'id'=>'visitor_modal',
    'size'=>'modal-lg',
    'clientOptions'=>['backdrop'=>'static','keyboard'=>FALSE],

]);
echo "<div id='modalContent'><div style='text-align:center;'><img src='../img/preloader.gif'></div></div>";
     Modal::end();

 ?>
 <?php //delete  modals?>

<?php Modal::begin([
    'id'=>'delete_modal',
    'size'=>'modal-sm',
    'clientOptions'=>['backdrop'=>'static','keyboard'=>FALSE],

]);
echo "<div id='delete_content'><div style='text-align:center;'><img src='../img/preloader.gif'></div></div>";
     Modal::end();
 ?>
