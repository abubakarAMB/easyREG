<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\widgets\linkpager;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
$this->title ='departments';
$this->params['breadcrumbs'][] = $this->title;
?>
<h1 class="page-header"><?=$this->title?><?=Html::button('Add department?',['value'=>URL::to('create'),'class'=>'btn btn-primary pull-right modalButton', 'id'=>'modalButton']) ?></h1>
<?php if(!empty($departments)): ?>
<div class="well">
    <table class="table table-striped table-bordered">
	 <thead>
	    <th>Name</th>
        <th>Faculty</th>
	    <th>Location</th>
	    <th>Update</th>
	    <th>Delete</th>
     </thead>
     <tbody>
     	<?php foreach ($departments as $department): ?>
		  <tr>
		  	<?php   //SELECT `id`, `location`, `name` FROM `departments` WHERE 1 ?>
		    <td><?php echo $department->name;  ?></td>
            <td><?php echo $department->faculties->name;  ?></td>
		    <td><?php echo $department->location;  ?></td>
		    <td><?=Html::button('edit',['value'=>URL::to(['edit','id'=>$department->id]),'class'=>'btn btn-primary modalButton', 'id'=>'modalButton']) ?></td>
		    <td><?=Html::button('delete',['value'=>URL::to(['delete','id'=>$department->id]),'class'=>'btn btn-danger deleteButton', 'id'=>'deleteButton']) ?></td>
		  </tr>
        <?php endforeach;?>
     </tbody>
   </table>

</div>

<?php else:?>


<div class="well">
    <p>No departments yet!</p>
</div>
<?php endif;?>
<!--Modal window for delete-->
<?php Modal::begin([
   'header'=>'<h2>Departments Info</h2>',
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
