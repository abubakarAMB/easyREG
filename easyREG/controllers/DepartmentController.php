<?php

namespace app\controllers;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\data\Pagination;
use yii\filters\VerbFilter;
use app\models\Departments;



class DepartmentController extends \yii\web\Controller{
    
    public function actionIndex(){
    //check access
        if (Yii::$app->session->get('admin_id')===null) {
          return $this->redirect('../site/index');
      }
        $this->layout = 'admin_layout';
        $query = Departments::find();
        $pagination = new Pagination([
         'defaultPageSize'=>100,
         'totalCount'=>$query->count(),

        ]);
        //`id`, `title`, `description`, `due_date`, `create_date`
        $departments = $query->offset($pagination->offset)
        ->limit($pagination->limit)
        ->all();

        return $this->render('index',['departments'=>$departments,'pagination'=>$pagination]);
    }
    public function actionCreate(){
        //check access
    if (Yii::$app->session->get('admin_id')===null) {
          return $this->redirect('../site/index');
      }
     $this->layout = 'admin_layout';
      $Departments = new Departments();

    if ($Departments->load(Yii::$app->request->post())) {
        if ($Departments->validate()) {
            // form inputs are valid, do something here
            $Departments->save();
                    //send confirmation message 
            Yii::$app->getSession()->setFlash('success','Course Added');
            return $this->redirect('index');
        }
    }elseif (Yii::$app->request->isAjax){
            return $this->renderAjax('create', [
            'Departments' => $Departments,
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
        $Department = Departments::findOne($id);
        if ($Department->load(Yii::$app->request->post())) {
            if ($Department->delete()) {
            //send confirmation message 
            Yii::$app->getSession()->setFlash('success','Department deleted');
            return $this->redirect('index');
            }
        }elseif (Yii::$app->request->isAjax){
                return $this->renderAjax('delete', [
                'Department' => $Department,
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
        $Departments = Departments::findOne($id);
        if ($Departments->load(Yii::$app->request->post())) {
            if ($Departments->validate()) {
                // form inputs are valid, do something here
                if ($Departments->save()) {
                //send confirmation message 
                Yii::$app->getSession()->setFlash('success','Department Updated');
                return $this->redirect('index');
                }
                
            }
        }elseif (Yii::$app->request->isAjax){
                return $this->renderAjax('edit', [
                'Departments' => $Departments,
            ]);
        }else{
                return $this->redirect('index');
            }
    }

    public function actionGetDeptByFaculty($id){
    
        $departments = Departments::find()
               ->where(['faculty_id'=>$id])
               ->all();
        if (!empty($departments)) {
                 $dept = "<option value=''>--select department --</option>";
                 foreach ($departments as $department) {
                     $dept .="<option value='".$department->id."'>".$department->name."</option>";
                 }
                 echo $dept;
        }else{
            echo "<option></option>";
        }       
        
    }

}
