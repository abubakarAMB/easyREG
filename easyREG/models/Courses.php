<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%courses}}".
 *
 * @property int $id
 * @property string $name
 * @property string $code
 * @property int $credit
 * @property string $created_at
 */
class Courses extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%courses}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'code', 'credit','department_id','faculty_id'], 'required'],
            [['credit','department_id','faculty_id'], 'integer'],
            [['created_at'], 'safe'],
            [['name'], 'string', 'max' => 100],
            [['code'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'code' => 'Code',
            'credit' => 'Credit',
            'created_at' => 'Created At',
            'department_id' => 'Department',
            'faculty_id' => 'Faculty',
        ];
    }

    public function getDepartments() {
      return $this->hasOne(Departments::className(),['id'=>'department_id']); 
    }
    // realationship with faculties
    public function getFaculties() {
      return $this->hasOne(Faculties::className(),['id'=>'faculty_id']); 
    }

    // Relationship with Courses
    public function getSections() {
      return $this->hasMany(Sections::className(),['course_id'=>'id']); 
    }
}
