<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\widgets\linkpager;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
$this->title ='results';
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Polling Units'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?php if(!empty($results)):?>
<div class="well">
    <table class="table table-bordered table-hover">
	 <thead>
        <th>Party</th>
	 	<th>No of Votes</th>
     </thead>
     <tbody>
     	<?php foreach ($results as $result): ?>
		  <tr>
            <td><?= $result->party_abbreviation  ?></td>
		  	<td><?= $result->party_score  ?></td>
		  </tr>
        <?php endforeach;?>
     </tbody>
   </table>

</div>

<?php else:?>


<div class="well">
    <p>No results yet!</p>
</div>
<?php endif;?>
<?= LinkPager::widget(['pagination'=>$pagination])?>