<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\widgets\linkpager;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
$this->title ='Lecturers';
$this->params['breadcrumbs'][] = $this->title;
?>
<h1 class="page-header" >Lecturers<?=Html::button('Add Lecturer?',['value'=>URL::to('create'),'class'=>'btn btn-primary pull-right modalButton', 'id'=>'modalButton']) ?></h1>
<?php if(!empty($Lecturers)): ?>
<div class="well">
    <table class="table table-striped table-bordered table-hover">
	 <thead>
	 	<th>Department</th>
	    <th>Name</th>
	    <th>Qualification</th>
	    <th>Rank</th>
	    <th>Type</th>
	    <th>Update</th>
	    <th>Delete</th>
     </thead>
     <tbody>
     	<?php foreach ($Lecturers as $Lecturer): ?>
		  <tr>
		  	<?php   //SELECT `id`, `first_name`, `last_name`, `qualification`, `rank`, `type`, `department_id` FROM `lecturers` WHERE 1 ?>
		  	<td><?=$Lecturer->departments->name ?></td>
		    <td><?= $Lecturer->first_name.' '.$Lecturer->last_name  ?></td>
		    <td><?= $Lecturer->qualification  ?></td>
		    <td><?= $Lecturer->rank  ?></td>
		    <td><?=$Lecturer->type  ?></td>
		    <td><?=Html::button('edit',['value'=>URL::to(['edit','id'=>$Lecturer->id]),'class'=>'btn btn-primary modalButton', 'id'=>'modalButton']) ?></td>
		    <td><?=Html::button('delete',['value'=>URL::to(['delete','id'=>$Lecturer->id]),'class'=>'btn btn-danger deleteButton', 'id'=>'deleteButton']) ?></td>
		  </tr>
        <?php endforeach;?>
     </tbody>
   </table>

</div>

<?php else:?>


<div class="well">
    <p>No Lecturers yet!</p>
</div>
<?php endif;?>
<!--Modal window for delete-->
<?php Modal::begin([
   'header'=>'<h2>Lecturer Info</h2>',
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