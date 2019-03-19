<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\widgets\linkpager;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use app\models\Sections;

$this->title ='Enrollement Details';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php if (!empty($enrollement)):?>
<div class="well">
	<div class="row">
		<div class="col-md-6">
		   <div class="panel panel-default">
		   	<!-- admin remarks-->
	   	   <div class="panel-heading">Student Info</div>
	   	   <table class="table table-bordered table-striped">
	   	   	<tbody>
	   	   		<tr><td>Full Name</td><td><?= $enrollement->students->user->full_name ?></td></tr>
	   	   		<tr><td>Email</td><td><?= $enrollement->students->user->email ?></td></tr>
	   	   		<tr><td>Username</td><td><?= $enrollement->students->user->username ?></td></tr>
	   	   		<tr><td>Reg No.</td><td><?=$enrollement->students->school_reg_no  ?></td></tr>
	   	   		<tr><td>Department</td><td><?=$enrollement->students->departments->name  ?></td></tr>
	   	   		<tr><td>Student Type</td><td><?=$enrollement->students->type  ?></td></tr>
	   	   	</tbody>
	   	   </table>
	   	   <div class="panel-body"></div>
           </div>
		</div>
		<div class="col-md-6">
			<!-- admin remarks-->
		   <div class="panel panel-default">
	   	   <div class="panel-heading">Admin Action</div>
	   	   <div class="panel-body">
	   	   	<div class="enrollementdetails-create">
                <?php $form = ActiveForm::begin(['options'=>[
			    	'id'=>'enrollementdetails'],]); ?>
			    	<?= $form->field($enrollementdetails, 'status')->dropDownList(['approved'=>'Approve','declined'=>'Decline'],['prompt'=>'Select status']) ?>
			        <div class="form-group">
			        <?= $form->field($enrollementdetails, 'comment')->textArea(['cols'=>'2']);?>
			            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
			        </div>
			    <?php ActiveForm::end(); ?>

			</div><!-- course-create -->
	   	   </div>
           </div>
		</div>
	</div><!-- end of row-->
</div>
<div class="well">
	<div class="panel panel-default">
	    <div class="panel-heading">
	        <h3>Enrollement Info</h3>
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
	
</div>
<?php else:?>
<?php endif;?>