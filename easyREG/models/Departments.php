<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%departments}}".
 *
 * @property int $id
 * @property string $location
 * @property string $name
 */
class Departments extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%departments}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['location', 'name', 'faculty_id'], 'required'],
            [['faculty_id'], 'integer'],
            [['location', 'name'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'location' => 'Location',
            'name' => 'Name',
            'faculty_id' => 'Faculty',
        ];
    }

    public function getFaculties() {
      return $this->hasOne(Faculties::className(),['id'=>'faculty_id']); 
    }
    public function getCourses() {
      return $this->hasMany(Courses::className(),['department_id'=>'id']); 
    }
    public function getLecturers() {
      return $this->hasMany(Lecturers::className(),['department_id'=>'id']); 
    }
    
    public function getStudents() {
      return $this->hasMany(Students::className(),['dept_id'=>'id']); 
    }
}
