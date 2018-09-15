<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\widgets\linkpager;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
$this->title ='results';
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Lgas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?php if(!empty($pollingunits)):?>
<div class="well">
    <table class="table table-bordered table-hover">
	 <thead>
        <th>Party</th>
	 	<th>No of Votes</th>
     </thead>
     <tbody>
     	<?php foreach ($pollingunits as $pollingunit): ?>
            <?php
            $results = array(); 
            $parties = array_column($pollingunit->announcedPuResults, "party_abbreviation");
            $scores = array_column($pollingunit->announcedPuResults, "party_score");
            $unique_parties = array_unique($parties);
            foreach ($unique_parties as $party) {
            	$this_keys = array_keys($parties, $party);
            	$score = array_sum(array_intersect_key($scores, array_combine($this_keys, $this_keys)));
            	$results[] = array("party"=>$party,"score"=>$score);
            }
            ?>
            <?php foreach ($results as $result): ?>
            <tr>
            	<td><?=$result['party'] ?></td>
            	<td><?=$result['score'] ?></td>
            </tr>
            <?php endforeach;?>
        <?php endforeach;?>
  
     </tbody>
   </table>

</div>

<?php else:?>


<div class="well">
    <p>No results yet!</p>
</div>
<?php endif;?>