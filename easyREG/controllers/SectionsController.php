<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\data\Pagination;
use yii\filters\VerbFilter;
use app\models\Sections;

class SectionsController extends \yii\web\Controller{

    public function actionIndex(){
        //check access
        if (Yii::$app->session->get('admin_id')===null) {
          return $this->redirect('../site/index');
        }
        $this->layout = 'admin_layout';
        $query = Sections::find();
        $pagination = new Pagination([
         'defaultPageSize'=>100,
         'totalCount'=>$query->count(),

        ]);
        //`id`, `title`, `description`, `due_date`, `create_date`
        $sections = $query->orderBy('id DESC')
        ->offset($pagination->offset)
        ->limit($pagination->limit)
        ->all();

        return $this->render('index',['sections'=>$sections,'pagination'=>$pagination]);
    }

    public function actionCreate(){
      //check access
        if (Yii::$app->session->get('admin_id')===null) {
          return $this->redirect('../site/index');
      } 
      $this->layout = 'admin_layout';
      $sections = new Sections();

    if ($sections->load(Yii::$app->request->post())) {
        if ($sections->validate()) {
            // form inputs are valid, do something here
            $sections->save();
                    //send confirmation message 
            Yii::$app->getSession()->setFlash('success','section Added');
            return $this->redirect('index');
        }
    }elseif (Yii::$app->request->isAjax){
            return $this->renderAjax('create', [
            'sections' => $sections,
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
        $section = sections::findOne($id);
        if ($section->load(Yii::$app->request->post())) {
            if ($section->delete()) {
            //send confirmation message 
            Yii::$app->getSession()->setFlash('success','section deleted');
            return $this->redirect('index');
            }
        }elseif (Yii::$app->request->isAjax){
                return $this->renderAjax('delete', [
                'section' => $section,
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
       $section = sections::findOne($id);
        if ($section->load(Yii::$app->request->post())) {
            if ($section->validate()) {
                // form inputs are valid, do something here
                if ($section->save()) {
                //send confirmation message 
                Yii::$app->getSession()->setFlash('success','section Updated');
                return $this->redirect('index');
                }
                
            }
        }elseif (Yii::$app->request->isAjax){
                return $this->renderAjax('edit', [
                'section' => $section,
            ]);
        }else{
                return $this->redirect('index');
            }
    }
}
