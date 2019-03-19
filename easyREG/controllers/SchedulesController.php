<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\data\Pagination;
use yii\filters\VerbFilter;
use app\models\Schedules;

class SchedulesController extends \yii\web\Controller
{
    public function actionIndex(){
        //check access
        if (Yii::$app->session->get('admin_id')===null) {
          return $this->redirect('../site/index');
        }
        $this->layout = 'admin_layout';
        $query = Schedules::find();
        $pagination = new Pagination([
         'defaultPageSize'=>100,
         'totalCount'=>$query->count(),

        ]);
        //`id`, `title`, `description`, `due_date`, `create_date`
        $Schedules = $query->offset($pagination->offset)
        ->limit($pagination->limit)
        ->all();

        return $this->render('index',['Schedules'=>$Schedules,'pagination'=>$pagination]);
    }
    public function actionCreate(){
     //check access
     if (Yii::$app->session->get('admin_id')===null) {
          return $this->redirect('../site/index');
      }
     $this->layout = 'admin_layout';
      $Schedules = new Schedules();

    if ($Schedules->load(Yii::$app->request->post())) {
        if ($Schedules->validate()) {
            // form inputs are valid, do something here
            $Schedules->save();
                    //send confirmation message 
            Yii::$app->getSession()->setFlash('success','Course Added');
            return $this->redirect('index');
        }
    }elseif (Yii::$app->request->isAjax){
            return $this->renderAjax('create', [
            'Schedules' => $Schedules,
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
        $schedule = Schedules::findOne($id);
        if ($schedule->load(Yii::$app->request->post())) {
            if ($schedule->delete()) {
            //send confirmation message 
            Yii::$app->getSession()->setFlash('success','schedule deleted');
            return $this->redirect('index');
            }
        }elseif (Yii::$app->request->isAjax){
                return $this->renderAjax('delete', [
                'schedule' => $schedule,
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
        $schedule = Schedules::findOne($id);
        if ($schedule->load(Yii::$app->request->post())) {
            if ($schedule->validate()) {
                // form inputs are valid, do something here
                if ($schedule->save()) {
                //send confirmation message 
                Yii::$app->getSession()->setFlash('success','schedule Updated');
                return $this->redirect('index');
                }
                
            }
        }elseif (Yii::$app->request->isAjax){
                return $this->renderAjax('edit', [
                'schedule' => $schedule,
            ]);
        }else{
                return $this->redirect('index');
            }
    }

}
