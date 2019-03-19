<?php
namespace app\controllers;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\data\Pagination;
use yii\filters\VerbFilter;
use app\models\Courses;

class CourseController extends \yii\web\Controller{
    // defining behaiviours
     public function behaviors(){
       return [
         'access'=>[
            'class'=> AccessControl::className(),
            'only'=>['create','edit','index','view'],
             'rules'=>[
                [
                  'actions'=>['create','edit','index','view'],
                  'allow'=>true,
                  'roles'=>['@'],

             ],
           ],
         ]
       ];


     }
    public function actionCreate(){ 
      //check if the user is admin
      if (Yii::$app->session->get('admin_id')===null) {
          return $this->redirect('../site/index');
      }
      $this->layout = 'admin_layout';
          $courses = new Courses();

        if ($courses->load(Yii::$app->request->post())) {
            if ($courses->validate()) {
                // form inputs are valid, do something here
                $courses->save();
                        //send confirmation message 
                Yii::$app->getSession()->setFlash('success','Course Added');
                return $this->redirect('index');
            }
        }
            return $this->renderAjax('create', [
            'courses' => $courses,
        ]);
  

    }

    // delete actions
    public function actionDelete($id){
        if (Yii::$app->session->get('admin_id')===null) {
          return $this->redirect('../site/index');
      }
        $Course = Courses::findOne($id);
        if ($Course->load(Yii::$app->request->post())) {
            if ($Course->delete()) {
            //send confirmation message 
            Yii::$app->getSession()->setFlash('success','Course deleted');
            return $this->redirect('index');
            }
        }elseif (Yii::$app->request->isAjax){
                return $this->renderAjax('delete', [
                'Course' => $Course,
            ]);
        }else{
                return $this->redirect('index');
            }
    }

    public function actionEdit($id){
        if (Yii::$app->session->get('admin_id')===null) {
          return $this->redirect('../site/index');
      }
       $course = Courses::findOne($id);
        if ($course->load(Yii::$app->request->post())) {
            if ($course->validate()) {
                // form inputs are valid, do something here
                if ($course->save()) {
                //send confirmation message 
                Yii::$app->getSession()->setFlash('success','Course Updated');
                return $this->redirect('index');
                }
                
            }
        }elseif (Yii::$app->request->isAjax){
                return $this->renderAjax('edit', [
                'course' => $course,
            ]);
        }else{
                return $this->redirect('index');
            }
    }

    public function actionIndex(){
      if (Yii::$app->session->get('admin_id')===null) {
          return $this->redirect('../site/index');
      }
         $this->layout = 'admin_layout';
        $query = Courses::find();
        $pagination = new Pagination([
         'defaultPageSize'=>100,
         'totalCount'=>$query->count(),

        ]);
        //`id`, `title`, `description`, `due_date`, `create_date`
        $courses = $query->orderBy('id DESC')
        ->offset($pagination->offset)
        ->limit($pagination->limit)
        ->all();

        return $this->render('index',['courses'=>$courses,'pagination'=>$pagination]);
    }

}
