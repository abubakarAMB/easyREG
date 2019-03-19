<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\widgets\linkpager;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use app\models\Sections;

$this->title ='Enrollements';
$this->params['breadcrumbs'][] = $this->title;
?>
<h1 class="page-header" >Enrollements<a href="create" class="btn btn-primary pull-right">Enroll into courses</a><a href="../student/sections" class="btn btn-success pull-right">View Sections</a></h1>
<?php if(!empty($enrollements)): ?>
<div class="well">
	<?php foreach ($enrollements as $enrollement): ?>
	<div class="panel panel-default">
		<div class="panel-heading">
         <?=Html::button('delete registration',['value'=>URL::to(['delete','id'=>$enrollement->id]),'class'=>'btn btn-danger deleteButton', 'id'=>'deleteButton']) ?><?=Html::button('View Status',['value'=>URL::to(['view','id'=>$enrollement->id]),'class'=>'btn btn-primary deleteButton', 'id'=>'deleteButton']) ?>
		</div>
			<div class="panel-body">
				    <table class="table table-striped table-bordered table-hover">
					 <thead>
					 	<th>Name</th>
					    <th>Course</th>
					    <th>Schedule</th>
					    <th>Lecturer</th>
					    <th>Room</th>
				     </thead>
				     <tbody>

				     	<?php $enrollementNumber = explode(',', $enrollement->section_id)    ?>
				     	<?php foreach ($enrollementNumber as $number): 
					            $sections = Sections::find()
					                  ->where(['id'=>$number])
					                  ->all();
				          ?>
				         <?php foreach ($sections as $section):?>   
						  <tr>
							  	<td><?= $section->name  ?></td>
							    <td><?=$section->courses->name  ?></td>
							    <td><?=$section->schedules->name.' '.$section->schedules->day  ?></td>
							    <td><?=$section->lecturers->first_name.' '.$section->lecturers->last_name.', '.$section->lecturers->qualification  ?></td>
							    <td><?=$section->room  ?></td>
						  </tr>
						  <?php endforeach;?>
				        <?php endforeach;?>
				     </tbody>
				   </table>
		       </div>
	</div>
	<?php endforeach;?>
</div>

<?php else:?>


<div class="well">
    <p>Not enrolled!</p>
</div>
<?php endif;?>
<!--Modal window for delete-->
<?php Modal::begin([
   'header'=>'<h2>enrollement Info</h2>',
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