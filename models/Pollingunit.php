<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%polling_unit}}".
 *
 * @property int $uniqueid
 * @property int $polling_unit_id
 * @property int $ward_id
 * @property int $lga_id
 * @property int $uniquewardid
 * @property string $polling_unit_number
 * @property string $polling_unit_name
 * @property string $polling_unit_description
 * @property string $lat
 * @property string $long
 * @property string $entered_by_user
 * @property string $date_entered
 * @property string $user_ip_address
 */
class Pollingunit extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%polling_unit}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['polling_unit_id', 'ward_id', 'lga_id'], 'required'],
            [['polling_unit_id', 'ward_id', 'lga_id', 'uniquewardid'], 'integer'],
            [['polling_unit_description'], 'string'],
            [['date_entered'], 'safe'],
            [['polling_unit_number', 'polling_unit_name', 'entered_by_user', 'user_ip_address'], 'string', 'max' => 50],
            [['lat', 'long'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'uniqueid' => 'Uniqueid',
            'polling_unit_id' => 'Polling Unit',
            'ward_id' => 'Ward ',
            'lga_id' => 'Local Government',
            'uniquewardid' => 'Uniquewardid',
            'polling_unit_number' => 'Polling Unit Number',
            'polling_unit_name' => 'Polling Unit Name',
            'polling_unit_description' => 'Polling Unit Description',
            'lat' => 'Lat',
            'long' => 'Long',
            'entered_by_user' => 'Entered By User',
            'date_entered' => 'Date Entered',
            'user_ip_address' => 'User Ip Address',
        ];
    }
    //SELECT `uniqueid`, `polling_unit_id`, `ward_id`, `lga_id`, `uniquewardid`, `polling_unit_number`, `polling_unit_name`, `polling_unit_description`, `lat`, `long`, `entered_by_user`, `date_entered`, `user_ip_address` FROM `polling_unit` WHERE 1

    public function getWard() {
      return $this->hasOne(Ward::className(),['id'=>'ward_id']); 
    }

    public function getLga() {
      return $this->hasOne(Lga::className(),['id'=>'lga_id']); 
    }

    public function getAnnouncedPuResults() {
      return $this->hasMany(AnnouncedPuResults::className(),['polling_unit_uniqueid'=>'uniqueid']); 
    }

}
