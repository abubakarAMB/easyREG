<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\widgets\linkpager;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
$this->title ='Courses Sections';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php if(!empty($sections)): ?>
<div class="well">
	<div class="panel panel-default">
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
		     	<?php foreach ($sections as $section): ?>
				  <tr>
				  	<?php   //SELECT `id`, `name`, `course_id`, `schedule_id`, `lecturer_id`, `room` FROM `sections` WHERE 1` ?>
				  	<td><?= $section->name  ?></td>
				    <td><?=$section->courses->name  ?></td>
				    <td><?=$section->schedules->name.' '.$section->schedules->day  ?></td>
				    <td><?=$section->lecturers->first_name.' '.$section->lecturers->last_name.', '.$section->lecturers->qualification  ?></td>
				    <td><?=$section->room  ?></td>
				  </tr>
		        <?php endforeach;?>
		     </tbody>
		   </table>
		</div>
	</div>
</div>

<?php else:?>


<div class="well">
    <p>No sections yet!</p>
</div>
<?php endif;?>