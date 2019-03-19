<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\widgets\linkpager;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use yii\widgets\ActiveForm;


$this->title ='Admin dashboard';
$this->params['breadcrumbs'][] = $this->title;
?>
<h1 class="page-header"><?=$this->title?></h1>
<div class="well">
   <!-- /.row -->
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="glyphicon glyphicon-book fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">Courses!</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left"><a href="../course/index">View Details</a></span>
                                <span class="pull-right"><i class="glyphicon glyphicon-arrow-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="glyphicon glyphicon-user fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div>Users</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left"><a href="../course/index">View Details</a></span>
                                <span class="pull-right"><i class="glyphicon glyphicon-arrow-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-warning">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="glyphicon glyphicon-home fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div>Departments</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left"><a href="../course/index">View Details</a></span>
                                <span class="pull-right"><i class="glyphicon glyphicon-arrow-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="glyphicon glyphicon-folder-open fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div>Sections</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="glyphicon glyphicon-arrow-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /.row -->	
    
</div>
<div class="well">
	<div class="panel panel-red">
	    <div class="panel-heading">
	        <h3>Pending Course Registration</h3>
	    </div>
	    <div class="panel-body">
	      <?php if(!empty($enrollements)): ?>
            <table class="table table-striped table-bordered table-hover">
			 <thead>
			 	<th>Name</th>
			    <th>Matric Number</th>
			    <th>Department</th>
			    <th>View</th>
		     </thead>
		     <tbody>
			<?php foreach ($enrollements as $enrollement): ?>
		     <?php if (empty($enrollement->enrollementDetails->enrollement_id)): ?>
		     	  <tr>
					  	<td><?= $enrollement->students->user->full_name ?></td>
					    <td><?=$enrollement->students->school_reg_no  ?></td>
					    <td><?=$enrollement->students->departments->name  ?></td>
					    <td><a class="btn btn-primary btn-small" href="enrollementdetails?id=<?php echo $enrollement->id; ?>"><span class="glyphicon glyphicon-eye-open"></span></a></td> 
				  </tr>
		     <?php endif; ?>
		     <?php endforeach;?>
		     </tbody>
		   </table>
		   
		<?php else:?>
		    <p>No enrollements yet!</p>
		<?php endif;?>	
	    </div>
</div>
	
</div>