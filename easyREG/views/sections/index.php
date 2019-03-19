<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\widgets\linkpager;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
$this->title ='sections';
$this->params['breadcrumbs'][] = $this->title;
?>
<h1 class="page-header" >sections<?=Html::button('Add section?',['value'=>URL::to('create'),'class'=>'btn btn-primary pull-right modalButton', 'id'=>'modalButton']) ?></h1>
<?php if(!empty($sections)): ?>
<div class="well">
    <table class="table table-striped table-bordered table-hover">
	 <thead>
	 	<th>Name</th>
	    <th>Course</th>
	    <th>Schedule</th>
	    <th>Lecturer</th>
	    <th>Room</th>
	    <th>Update</th>
	    <th>Delete</th>
     </thead>
     <tbody>
     	<?php foreach ($sections as $section): ?>
		  <tr>
		  	<?php   //SELECT `id`, `name`, `course_id`, `schedule_id`, `lecturer_id`, `room` FROM `sections` WHERE 1` ?>
		  	<td><?= $section->name  ?></td>
		    <td><?=$section->courses->name  ?></td>
		    <td><?=$section->schedules->name.' '.$section->schedules->day  ?></td>
		    <td><?=$section->lecturers->first_name.' '.$section->lecturers->last_name.', '.$section->lecturers->qualification  ?></td>
		    <td><?=$section->room  ?></td>
		    <td><?=Html::button('edit',['value'=>URL::to(['edit','id'=>$section->id]),'class'=>'btn btn-primary modalButton', 'id'=>'modalButton']) ?></td>
		    <td><?=Html::button('delete',['value'=>URL::to(['delete','id'=>$section->id]),'class'=>'btn btn-danger deleteButton', 'id'=>'deleteButton']) ?></td>
		  </tr>
        <?php endforeach;?>
     </tbody>
   </table>

</div>

<?php else:?>


<div class="well">
    <p>No sections yet!</p>
</div>
<?php endif;?>
<!--Modal window for delete-->
<?php Modal::begin([
   'header'=>'<h2>section Info</h2>',
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