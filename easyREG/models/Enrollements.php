<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%enrollements}}".
 *
 * @property int $id
 * @property int $student_id
 * @property string $section_id
 * @property string $created_at
 */
class Enrollements extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%enrollements}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['section_id'], 'required'],
            [['student_id'], 'integer'],
            [['created_at','section_id'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'student_id' => 'Student',
            'section_id' => 'Select Sections',
            'created_at' => 'Created At',
        ];
    }

    // Relationship with Enrollements
    public function getSections() {
      return $this->hasMany(Sections::className(),['id'=>'sections_id']); 
    }
     //
    public function beforeSave($insert){

      if (parent::beforeSave($insert)) { 
        if ($this->isNewRecord) {  
              $this->student_id = \Yii::$app->user->identity->id;
              return parent::beforeSave($insert);
            } 
              return true;
           } return false;
    }
    
    //relationship with students 
    public function getStudents() {
      return $this->hasOne(Students::className(),['user_id'=>'student_id']); 
    }
    //relationship with enrollements details
    public function getEnrollementDetails() {
      return $this->hasOne(EnrollementDetails::className(),['enrollement_id'=>'id']); 
    }

}
