<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\widgets\linkpager;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
$this->title ='Courses';
$this->params['breadcrumbs'][] = $this->title;
?>
<h1 class="page-header" >Courses<?=Html::button('Add Course?',['value'=>URL::to('create'),'class'=>'btn btn-primary pull-right modalButton', 'id'=>'modalButton']) ?></h1>
<?php if(!empty($courses)): ?>
<div class="well">
    <table class="table table-striped table-bordered table-hover">
	 <thead>
        <th>Faculty</th>
	 	<th>Department</th>
	    <th>Name</th>
	    <th>Code</th>
	    <th>Credits</th>
	    <th>Update</th>
	    <th>Delete</th>
     </thead>
     <tbody>
     	<?php foreach ($courses as $course): ?>
		  <tr>
            <td><?php echo $course->faculties->name;  ?></td>
		  	<td><?php echo $course->departments->name;  ?></td>
		    <td><?php echo $course->name;  ?></td>
		    <td><?php echo $course->code;  ?></td>
		    <td><?php echo $course->credit;  ?></td>
		    <td><?=Html::button('edit',['value'=>URL::to(['edit','id'=>$course->id]),'class'=>'btn btn-primary modalButton', 'id'=>'modalButton']) ?></td>
		    <td><?=Html::button('delete',['value'=>URL::to(['delete','id'=>$course->id]),'class'=>'btn btn-danger deleteButton', 'id'=>'deleteButton']) ?></td>
		  </tr>
        <?php endforeach;?>
     </tbody>
   </table>

</div>

<?php else:?>


<div class="well">
    <p>No courses yet!</p>
</div>
<?php endif;?>
<!--Modal window for delete-->
<?php Modal::begin([
   'header'=>'<h2>Course Info</h2>',
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