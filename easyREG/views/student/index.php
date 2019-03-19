<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
$this->title='Student Dashboard';
?>
<h1 class="page-header">Student Dashboard</h1>
<div class="well">
	<div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="glyphicon glyphicon-envelope fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">Sections are open for registration</div>
                                </div>
                            </div>
                        </div>
                        <a href="../enrollements/index">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="glyphicon glyphicon-arrow-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
     </div>
</div>
