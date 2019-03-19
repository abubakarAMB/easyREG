<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\User;
use app\models\Students;
class UserController extends \yii\web\Controller
{
    public function actionLogin()
    {
        return $this->render('login');
    }

    public function actionRegister(){
       $user = new User();
       $student = new Students();
          //ajax validation message
        if (Yii::$app->request->isAjax) {
        	Yii::$app->response->format = Response::FORMAT_JSON;
        	return ActiveForm::validate($user);
        }
	    if ($user->load(Yii::$app->request->post()) && $student->load(Yii::$app->request->post())) {
	    	// check validation for user fields
	        if ($user->validate()) {
	            // begin transaction
	            $transaction = Yii::$app->db->beginTransaction();
	            $success = $user->save(false);
	            $student->user_id = $user->id;
	            if ($student->save()) {
	            	$transaction->commit();
	            	Yii::$app->getSession()->setFlash('success','Successful!');
	                return $this->redirect('../site/index');
	            }else{
	            	$transaction->rollBack();
	            } 
	            

	        }
	    }

	    return $this->render('register',array('user'=>$user,'student'=>$student));
    }

}
