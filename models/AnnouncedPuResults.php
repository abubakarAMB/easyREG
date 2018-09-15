<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%announced_pu_results}}".
 *
 * @property int $result_id
 * @property string $polling_unit_uniqueid
 * @property string $party_abbreviation
 * @property int $party_score
 * @property string $entered_by_user
 * @property string $date_entered
 * @property string $user_ip_address
 */
class AnnouncedPuResults extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%announced_pu_results}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['polling_unit_uniqueid', 'party_abbreviation', 'party_score', 'entered_by_user'], 'required'],
            [['date_entered','user_ip_address'], 'safe'],
            [['polling_unit_uniqueid', 'entered_by_user'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'result_id' => 'Result ID',
            'polling_unit_uniqueid' => 'Polling Unit',
            'party_abbreviation' => 'Party Abbreviation',
            'party_score' => 'Party Score',
            'entered_by_user' => 'Full Name',
            'date_entered' => 'Date Entered',
            'user_ip_address' => 'User Ip Address',
        ];
    }

    public function getPollingunit() {
      return $this->hasMany(Pollingunit::className(),['uniqueid'=>'polling_unit_uniqueid']); 
    }

     public function getParty() {
      return $this->hasMany(Party::className(),['partyid'=>'party_abbreviation']); 
    }
  
     public function beforeSave($insert){
      if (parent::beforeSave($insert)) {
         if ($this->isNewRecord) {
              $this->date_entered = new \yii\db\Expression('NOW()');
              $this->user_ip_address = Yii::$app->getRequest()->getUserIP();
             return parent::beforeSave($insert);
          } 
      }
       return;
    }
}
