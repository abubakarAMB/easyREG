<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\data\Pagination;
use yii\filters\VerbFilter;
use app\models\Lga;
use app\models\Pollingunit;


class LgaController extends \yii\web\Controller
{
    public function actionDelete()
    {
        return $this->render('delete');
    }

    public function actionEdit()
    {
        return $this->render('edit');
    }

    public function actionIndex(){
         $lga = new Lga();
          if ($lga->load(Yii::$app->request->post())) {
            // check if the id for the polling unit have been set
            if (isset($lga->lga_id)) {
               //redirect to view page 
                return $this->redirect('view?id='.$lga->lga_id);
            }
        }

        return $this->render('index',['lga'=>$lga]);
        
    }

    public function actionView($id){
        $pollingunits = Pollingunit::find()
        ->select(['uniqueid'])
        ->where(['lga_id'=>$id])
        ->all();
        return $this->render('view',['pollingunits'=>$pollingunits]);
    }
    //get-lga-by-state
    // `uniqueid`, `lga_id`, `lga_name`, `state_id`, `lga_description`
    public function actionGetLgaByState($id){
    
        $lgas = Lga::find()
               ->where(['state_id'=>$id])
               ->all();
        if (!empty($lgas)) {
                 $options = "<option value=''>--select lga --</option>";
                 foreach ($lgas as $lga) {
                     $options .="<option value='".$lga->lga_id."'>".$lga->lga_name."</option>";
                 }
                 echo $options;
        }else{
            echo "<option>no lga</option>";
        }       
        
    }

}
