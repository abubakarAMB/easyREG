<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\Pollingunit;
use app\models\AnnouncedPuResults;
use app\models\Lga;
use yii\data\Pagination;

class PollingunitController extends \yii\web\Controller
{
    public function actionCreate(){

      $polling = new Pollingunit();

     if ($polling->load(Yii::$app->request->post())) {
        if ($polling->validate()) {
            // form inputs are valid, do something here
            return;
        }
    }

    return $this->render('create', [
        'polling' => $polling ,
    ]);

    }

    public function actionEdit()
    {
        return $this->render('edit');
    }

    public function actionIndex(){
        $lga = new Lga();
        $pollingunit = new Pollingunit();
          if ($pollingunit->load(Yii::$app->request->post())) {
            // check if the id for the polling unit have been set
            if (isset($pollingunit->polling_unit_id)) {
                //redirect to view page 
                return $this->redirect('view?id='.$pollingunit->polling_unit_id);
            }
        }

        return $this->render('index',['pollingunit'=>$pollingunit,'lga'=>$lga]);
    
    }
    //`result_id`, `polling_unit_uniqueid`, `party_abbreviation`, `party_score`, `entered_by_user`, `date_entered`, `user_ip_address`
    //view action or polling unit result
    public function actionView($id){
        $query= AnnouncedPuResults::find();
        // init pagination
        $pagination = new Pagination([
         'defaultPageSize'=>10,
         'totalCount'=>$query->count(),

        ]);
        //`id`, `title`, `description`, `due_date`, `create_date`
        $results = $query->where(['polling_unit_uniqueid'=>$id])
        ->orderBy('result_id ASC')
        ->offset($pagination->offset)
        ->limit($pagination->limit)
        ->all();
        //render view
         return $this->render('view',['results'=>$results,'pagination'=>$pagination]);
    }
    
    // get polligunit by ward
    //`uniqueid`, `polling_unit_id`, `ward_id`, `lga_id`, `uniquewardid`, `polling_unit_number`, `polling_unit_name`, `polling_unit_description`, `lat`, `long`, `entered_by_user`, `date_entered`, `user_ip_address`
    public function actionGetPollingByWard($id){
    
        $pollingunits = Pollingunit::find()
               ->where(['ward_id'=>$id])
               ->all();
        if (!empty($pollingunits)) {
                 $options = "<option value=''>--select pollingunit--</option>";
                 foreach ($pollingunits as $pollingunit) {
                     $options .="<option value='".$pollingunit->uniqueid."'>".$pollingunit->polling_unit_name."</option>";
                 }
                 echo $options;
        }else{
            echo "<option>--no Pollingunits --</option>";
        }       
        
    }
}
