<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\data\Pagination;
use yii\filters\VerbFilter;
use app\models\Sections;

class StudentController extends \yii\web\Controller
{
    public function actionIndex(){
    	 $this->layout = 'admin_layout';
        return $this->render('index');
    }

    public function actionSettings()
    {
        return $this->render('settings');
    }

    public function actionSections(){
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

        return $this->render('sections',['sections'=>$sections,'pagination'=>$pagination]);
    }

}
