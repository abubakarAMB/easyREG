<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\data\Pagination;
use yii\filters\VerbFilter;
use app\models\Enrollements;
use app\models\EnrollementDetails;


class AdminController extends \yii\web\Controller{
    // defining behaiviours
     public function behaviors(){
       return [
         'access'=>[
            'class'=> AccessControl::className(),
            'only'=>['index','enrollementdetails','profile','settings'],
             'rules'=>[
                [
                  'actions'=>['index','enrollementdetails','profile','settings'],
                  'allow'=>true,
                  'roles'=>['@'],

             ],
           ],
         ]
       ];


     }
    public function actionIndex()
    {
        $this->layout = 'admin_layout';
        $query = Enrollements::find();
        $pagination = new Pagination([
         'defaultPageSize'=>100,
         'totalCount'=>$query->count(),

        ]);
        //`id`, `title`, `description`, `due_date`, `create_date`
        $enrollements = $query->orderBy('id ASC')
        ->offset($pagination->offset)
        ->limit($pagination->limit)
        ->all();

        return $this->render('index',['enrollements'=>$enrollements,'pagination'=>$pagination]);
    }

    public function actionProfile()
    {  $this->layout = 'admin_layout';
        return $this->render('profile');
    }

    public function actionSettings()
    {
        return $this->render('settings');
    }

    public function actionEnrollementdetails($id){ 
         $this->layout = 'admin_layout';
         $enrollement = Enrollements::findOne($id);
         // updating enrollement Entries

           $enrollementdetails = new EnrollementDetails();
            if ($enrollementdetails->load(Yii::$app->request->post())) {
                if ($enrollementdetails->validate()) {
                    // form inputs are valid, do something here
                    $enrollementdetails->enrollement_id = $id; 
                    $enrollementdetails->save();
                            //send confirmation message 
                    Yii::$app->getSession()->setFlash('success','Enrollement Updated!');
                    return $this->redirect('index');
                }
            }
         //render view
         return $this->render('enrollementdetails',[
                'enrollement' => $enrollement, 'enrollementdetails' => $enrollementdetails,
            ]);
        
        
    }

}
