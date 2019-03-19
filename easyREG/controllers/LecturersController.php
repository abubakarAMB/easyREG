<?php

namespace app\controllers;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\data\Pagination;
use yii\filters\VerbFilter;
use app\models\Lecturers;

class LecturersController extends \yii\web\Controller{

    public function actionIndex(){
        //check access
        if (Yii::$app->session->get('admin_id')===null) {
          return $this->redirect('../site/index');
        }
        $this->layout = 'admin_layout';
        $query = Lecturers::find();
        $pagination = new Pagination([
         'defaultPageSize'=>100,
         'totalCount'=>$query->count(),

        ]);
        $Lecturers = $query->orderBy('id ASC')
        ->offset($pagination->offset)
        ->limit($pagination->limit)
        ->all();

        return $this->render('index',['Lecturers'=>$Lecturers,'pagination'=>$pagination]);
    }

    public function actionCreate(){
    //check access
        if (Yii::$app->session->get('admin_id')===null) {
          return $this->redirect('../site/index');
      } 
      $this->layout = 'admin_layout';
      $Lecturers = new Lecturers();

    if ($Lecturers->load(Yii::$app->request->post())) {
        if ($Lecturers->validate()) {
            // form inputs are valid, do something here
            $Lecturers->save();
                    //send confirmation message 
            Yii::$app->getSession()->setFlash('success','lecturer Added');
            return $this->redirect('index');
        }
    }elseif (Yii::$app->request->isAjax){
            return $this->renderAjax('create', [
            'Lecturers' => $Lecturers,
        ]);
    }else{
            return $this->redirect('index');
        }

    }

    // delete actions
    public function actionDelete($id){
        //check access
        if (Yii::$app->session->get('admin_id')===null) {
          return $this->redirect('../site/index');
         } 
        $lecturer = Lecturers::findOne($id);
        if ($lecturer->load(Yii::$app->request->post())) {
            if ($lecturer->delete()) {
            //send confirmation message 
            Yii::$app->getSession()->setFlash('success','lecturer deleted');
            return $this->redirect('index');
            }
        }elseif (Yii::$app->request->isAjax){
                return $this->renderAjax('delete', [
                'lecturer' => $lecturer,
            ]);
        }else{
                return $this->redirect('index');
            }
    }

    public function actionEdit($id){
       //check access
        if (Yii::$app->session->get('admin_id')===null) {
          return $this->redirect('../site/index');
       }
       $lecturer = Lecturers::findOne($id);
        if ($lecturer->load(Yii::$app->request->post())) {
            if ($lecturer->validate()) {
                // form inputs are valid, do something here
                if ($lecturer->save()) {
                //send confirmation message 
                Yii::$app->getSession()->setFlash('success','lecturer Updated');
                return $this->redirect('index');
                }
                
            }
        }elseif (Yii::$app->request->isAjax){
                return $this->renderAjax('edit', [
                'lecturer' => $lecturer,
            ]);
        }else{
                return $this->redirect('index');
            }
    }

    

}
