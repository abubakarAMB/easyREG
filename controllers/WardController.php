<?php

namespace app\controllers;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\data\Pagination;
use yii\filters\VerbFilter;
use app\models\Ward;

class WardController extends \yii\web\Controller
{
    public function actionDelete()
    {
        return $this->render('delete');
    }

    public function actionEdit()
    {
        return $this->render('edit');
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionView()
    {
        return $this->render('view');
    }

    //get ward by local government
    //`uniqueid`, `ward_id`, `ward_name`, `lga_id`, `ward_description`, `entered_by_user`, `date_entered`, `user_ip_address`
    public function actionGetWardByLga($id){
    
        $wards = Ward::find()
               ->where(['lga_id'=>$id])
               ->all();
        if (!empty($wards)) {
                 $options = "<option value=''>--select ward --</option>";
                 foreach ($wards as $ward) {
                     $options .="<option value='".$ward->ward_id."'>".$ward->ward_name."</option>";
                 }
                 echo $options;
        }else{
            echo "<option>--no ward --</option>";
        }       
        
    }


}
