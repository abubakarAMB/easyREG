<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\widgets\linkpager;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
$this->title ='Faculties';
$this->params['breadcrumbs'][] = $this->title;
?>
<h1 class="page-header"><?=$this->title?><?=Html::button('Add Faculty',['value'=>URL::to('create'),'class'=>'btn btn-primary pull-right modalButton', 'id'=>'modalButton']) ?></h1>
<?php if(!empty($faculties)): ?>
<div class="well">
    <table class="table table-striped table-bordered">
	 <thead>
	    <th>Name</th>
	    <th>Alias</th>
	    <th>Update</th>
     </thead>
     <tbody>
     	<?php foreach ($faculties as $faculty): ?>
		  <tr>
		  	<?php   //`name`, `alias` ?>
		    <td><?php echo $faculty->name;  ?></td>
		    <td><?php echo $faculty->alias;  ?></td>
		    <td><?=Html::button('edit',['value'=>URL::to(['edit','id'=>$faculty->id]),'class'=>'btn btn-primary modalButton', 'id'=>'modalButton']) ?></td>
		  </tr>
        <?php endforeach;?>
     </tbody>
   </table>

</div>

<?php else:?>


<div class="well">
    <p>No faculties yet!</p>
</div>
<?php endif;?>
<!--Modal window for delete-->
<?php Modal::begin([
   'header'=>'<h2>faculties Info</h2>',
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
