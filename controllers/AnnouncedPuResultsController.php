<?php
namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\Pollingunit;
use app\models\AnnouncedPuResults;
use app\models\Party;
use app\helpers\arrayHelper;

class AnnouncedPuResultsController extends \yii\web\Controller
{
    public function actionCreate(){
    $pollingr = new AnnouncedPuResults();
    $parties = Party::find()->all();

    if ($pollingr->load(Yii::$app->request->post())) {
        if ($pollingr->validate()) {
          //intialize counter
          $counter = count($pollingr->party_score);
          $par = $pollingr->party_abbreviation;
          $scr = $pollingr->party_score;
          for($i=0;$i < $counter;$i++){
          // create a new object
          $announced = new AnnouncedPuResults();
          //set party score for each party
          $announced->party_score = $scr[$i];
          //set party_abbreviation for each party
          $announced->party_abbreviation = $par[$i];
          $announced->polling_unit_uniqueid = $pollingr->polling_unit_uniqueid;
          $announced->entered_by_user = $pollingr->entered_by_user;
          $announced->save();
          unset($announced);          
          }
          //send confirmation message 
                Yii::$app->getSession()->setFlash('success','Results saved');
                return $this->redirect('../pollingunit/index');
          
        }
    }

    return $this->render('create', [
        'pollingr' => $pollingr, 'parties' => $parties,
    ]);
    }

    public function actionIndex(){
        return $this->render('index');
    }

}
