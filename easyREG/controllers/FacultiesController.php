<?php

namespace app\controllers;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\data\Pagination;
use yii\filters\VerbFilter;
use app\models\Faculties;

class FacultiesController extends \yii\web\Controller{
    public function actionCreate(){
        //check access
        if (Yii::$app->session->get('admin_id')===null) {
              return $this->redirect('../site/index');
          }
         $this->layout = 'admin_layout';
          $faculties = new Faculties();

        if ($faculties->load(Yii::$app->request->post())) {
            if ($faculties->validate()) {
                // form inputs are valid, do something here
                $faculties->save();
                        //send confirmation message 
                Yii::$app->getSession()->setFlash('success','Faculty Added');
                return $this->redirect('index');
            }
        }elseif (Yii::$app->request->isAjax){
                return $this->renderAjax('create', [
                'faculties' => $faculties,
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
        $faculties = Faculties::findOne($id);
        if ($faculties->load(Yii::$app->request->post())) {
            if ($faculties->validate()) {
                // form inputs are valid, do something here
                if ($faculties->save()) {
                //send confirmation message 
                Yii::$app->getSession()->setFlash('success','Faculties Updated');
                return $this->redirect('index');
                }
                
            }
        }elseif (Yii::$app->request->isAjax){
                return $this->renderAjax('edit', [
                'faculties' => $faculties,
            ]);
        }else{
                return $this->redirect('index');
            }
    }

    public function actionIndex(){
        //check access
        if (Yii::$app->session->get('admin_id')===null) {
          return $this->redirect('../site/index');
         }
        $this->layout = 'admin_layout';
        $query = Faculties::find();
        $pagination = new Pagination([
         'defaultPageSize'=>50,
         'totalCount'=>$query->count(),

        ]);
        //`id`, `title`, `description`, `due_date`, `create_date`
        $faculties = $query->offset($pagination->offset)
        ->limit($pagination->limit)
        ->all();

        return $this->render('index',['faculties'=>$faculties,'pagination'=>$pagination]);
    }

}
