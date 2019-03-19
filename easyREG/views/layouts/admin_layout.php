<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
$isStudent = $isAdmin = NULL;
// check if the user is not a guest
if(!Yii::$app->user->isGuest){
        $isStudent = Yii::$app->session->get('student_id');
        $isAdmin = Yii::$app->session->get('admin_id');
    }
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="skin-blue sidebar-mini">
<?php $this->beginBody() ?>
    <div class="wrapper">
        <div class="animationload">
            <div class="osahanloading"></div>
        </div>
        <header class="main-header">    
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top navbar-fixed-top" role="navigation">
                <div class="navbar-header" style="margin-left:-230px !important">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="glyphicon glyphicon-align-justify"></span>
                    </button>
                    <!-- Logo -->
                    <a href="index" class="logo">
                        <!-- mini logo for sidebar mini 50x50 pixels -->
                        <span class="logo-mini"> EasyREG</span>
                        <!-- logo for regular state and mobile devices -->
                        <span class="logo-lg">EasyREG</span>
                    </a>
                </div>
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button" id="nil">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="glyphicon glyphicon-align-justify"></span>
                </a>
                
                <div class="navbar-custom-menu" id="menu_notification">
                    <ul class="nav navbar-nav">
                    <!-- User Account: style can be found in dropdown.less -->
                            <li class="user user-menu"> <?= Html::beginForm(['/site/logout'], 'post')
                                    . Html::submitButton(
                                        'Logout (' . Yii::$app->user->identity->username . ')',
                                        ['class' => 'btn btn-default btn-link logout']
                                    )
                                    . Html::endForm()
                                   ?>
                            </li>
                    <!-- Control Sidebar Toggle Button -->              
                </ul>
            </div>

            
        </nav>
        </header> 
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu">
                    <?php if(isset($isAdmin)){?>
                    <li>
                        <a href="../admin/index">
                            </i><span class="glyphicon glyphicon-time"> Dashboard</span>
                            <!-- <small class="label pull-right bg-red">3</small> -->
                        </a>
                    </li>
                      <li>
                        <a href="../faculties/index">
                            </i><span class="glyphicon glyphicon-home"> Faculties</span>
                            <!-- <small class="label pull-right bg-red">3</small> -->
                        </a>
                    </li>
                    <li>
                        <a href="../department/index">
                            </i><span class="glyphicon glyphicon-home"> Departments</span>
                            <!-- <small class="label pull-right bg-red">3</small> -->
                        </a>
                    </li>
                    <li>
                        <a href="../course/index">
                            </i><span class="glyphicon glyphicon-education"> Courses</span>
                            <!-- <small class="label pull-right bg-red">3</small> -->
                        </a>
                    </li>
                    <li>
                        <a href="../lecturers/index">
                            </i><span class="glyphicon glyphicon-user"> Lecturers</span>
                            <!-- <small class="label pull-right bg-red">3</small> -->
                        </a>
                    </li>   
                     <li>
                        <a href="../schedules/index">
                            </i><span class="glyphicon glyphicon-time"> Schedules</span>
                            <!-- <small class="label pull-right bg-red">3</small> -->
                        </a>
                    </li>   
                    <li>
                        <a href="../sections/index">
                            </i><span class="glyphicon glyphicon-folder-open"> Sections</span>
                            <!-- <small class="label pull-right bg-red">3</small> -->
                        </a>
                    </li> 
                    <?php }elseif(isset($isStudent)){ ?>
                    <li>
                        <a href="../student/index">
                            </i><span class="glyphicon glyphicon-time"> Dashboard</span>
                            <!-- <small class="label pull-right bg-red">3</small> -->
                        </a>
                    </li>
                    <li>
                        <a href="../student/sections">
                            </i><span class="glyphicon glyphicon-folder-open"> Sections</span>
                            <!-- <small class="label pull-right bg-red">3</small> -->
                        </a>
                    </li>
                    <li>
                        <a href="../enrollements/index">
                            </i><span class="glyphicon glyphicon-edit"> Registration</span>
                            <!-- <small class="label pull-right bg-red">3</small> -->
                        </a>
                    </li>
                    <?php } ?>  
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>
        <div id="dashboard_div" class="content-wrapper">       
            <section class="content">
                 <?= Breadcrumbs::widget(['links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],]) ?>
                    <?= Alert::widget() ?>          
                 <?= $content ?>   
            </section>
        </div><!-- /.content-wrapper -->        
        
        <footer class="main-footer">
            <div class="pull-right hidden-xs">
            </div>
            <strong>&copy;EasyREG <?= date('Y') ?><a href=""> </a>.</strong> All rights reserved.
            <span class="pull-right"><strong><?= Yii::powered() ?></strong></span>
        </footer>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
