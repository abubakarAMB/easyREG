<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use app\helpers\arrayHelper;
use yii\web\Controller;
use yii\web\Response;
use yii\data\Pagination;
use yii\filters\VerbFilter;
use app\models\Enrollements;
use app\models\EnrollementDetails;
use app\models\Sections;



class EnrollementsController extends \yii\web\Controller{
    // defining behaiviours
     public function behaviors(){
       return [
         'access'=>[
            'class'=> AccessControl::className(),
            'only'=>['create','edit','index','delete'],
             'rules'=>[
                [
                  'actions'=>['create','edit','index','delete'],
                  'allow'=>true,
                  'roles'=>['@'],

             ],
           ],
         ]
       ];
    }
    public function actionIndex(){
        $this->layout = 'admin_layout';
        $query = Enrollements::find();
        $pagination = new Pagination([
         'defaultPageSize'=>100,
         'totalCount'=>$query->count(),

        ]);
        //`id`, `title`, `description`, `due_date`, `create_date`
        $enrollements = $query->offset($pagination->offset)
        ->limit($pagination->limit)
         ->where(['student_id'=>Yii::$app->user->identity->id])
        ->all();

        return $this->render('index',['enrollements'=>$enrollements,'pagination'=>$pagination]);
    }

    public function actionCreate(){
      $this->layout = 'admin_layout';
      $exists = Enrollements::find()->where(['student_id'=>Yii::$app->user->identity->id])->exists();
      if ($exists) {
          Yii::$app->getSession()->setFlash('danger','You cannot enrollement into courses kindly edit or delete!');
          return $this->redirect('index');
      }
      $enrollements = new Enrollements();
      if ($enrollements->load(Yii::$app->request->post())) {
        if ($enrollements->validate()) {
            // form inputs are valid, do something here
            $sections_id = implode(",",$enrollements->section_id);
            $enrollements->section_id = $sections_id; 
            $enrollements->save();
                    //send confirmation message 
            Yii::$app->getSession()->setFlash('success','Course Added');
            return $this->redirect('index');
        }
       }
    
            return $this->render('create', [
            'enrollements' => $enrollements,
        ]);

      }
   // delete actions
    public function actionDelete($id){
        
        $Enrollement = Enrollements::findOne($id);
        if ($Enrollement->load(Yii::$app->request->post())) {
            if ($Enrollement->delete()) {
            //send confirmation message 
            Yii::$app->getSession()->setFlash('success','Registration deleted');
            return $this->redirect('index');
            }
        }elseif (Yii::$app->request->isAjax){
                return $this->renderAjax('delete', [
                'Enrollement' => $Enrollement,
            ]);
        }else{
                return $this->redirect('index');
            }
    }

   // View actions
    public function actionView($id){
         $details = EnrollementDetails::find()
         ->where(['enrollement_id'=>$id])
         ->one();
         if (!empty($details) && Yii::$app->request->isAjax) {
          return $this->renderAjax('view', [
                'details' => $details,'status' => 'registration reviewed!',
            ]);         
        }else{
              return $this->renderAjax('view', [
                'status' => 'your registration is pending',
            ]);   
        }
    }

    public function actionEdit($id)
    {
        $Enrollements = Enrollements::findOne($id);
        if ($Enrollements->load(Yii::$app->request->post())) {
            if ($Enrollements->validate()) {
                // form inputs are valid, do something here
                if ($Enrollements->save()) {
                //send confirmation message 
                Yii::$app->getSession()->setFlash('success','Department Updated');
                return $this->redirect('index');
                }
                
            }
        }elseif (Yii::$app->request->isAjax){
                return $this->renderAjax('edit', [
                'Enrollements' => $Enrollements,
            ]);
        }else{
                return $this->redirect('index');
            }
    }

}
