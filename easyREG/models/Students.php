<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%students}}".
 *
 * @property int $id
 * @property int $user_id
 * @property string $type
 * @property string $school_reg_no
 * @property int $status
 * @property int $dept_id
  * @property int $faculty_id
 */
class Students extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%students}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'school_reg_no', 'dept_id', 'faculty_id'], 'required'],
            [['dept_id','faculty_id'], 'integer'],
            [['user_id','status'], 'safe'],
            [['type', 'school_reg_no'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Type',
            'school_reg_no' => 'Matric Number',
            'dept_id' => 'Department',
            'faculty_id' => 'Faculty',
        ];
    }
    /**
     * students relationship with faculties
     */

    public function getFaculties() {
      return $this->hasOne(Faculties::className(),['id'=>'faculty_id']); 
    }
    /**
     * students relationship with departments
     */

    public function getDepartments() {
      return $this->hasOne(Departments::className(),['id'=>'dept_id']); 
    }
    /**
     * @students realtionship with enrollements
     */
    public function getEnrollements() {
      return $this->hasMany(Enrollements::className(),['student_id'=>'user_id']); 
    }  
    /**
     * @students realtionship with enrollements
     */
    public function getUser() {
      return $this->hasOne(User::className(),['id'=>'user_id']); 
    }   
}
