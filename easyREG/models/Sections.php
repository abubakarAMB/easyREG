<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%sections}}".
 *
 * @property int $id
 * @property string $name
 * @property int $course_id
 * @property int $schedule_id
 * @property int $lecturer_id
 * @property int $room
 */
class Sections extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%sections}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'course_id', 'schedule_id', 'lecturer_id', 'room'], 'required'],
            [['course_id', 'schedule_id', 'lecturer_id'], 'integer'],
            [['name', 'room'], 'string', 'max' => 45],
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
            'course_id' => 'Course ID',
            'schedule_id' => 'Schedule ID',
            'lecturer_id' => 'Lecturer ID',
            'room' => 'Room',
        ];
    }
    // Relationship with lecturers
    public function getLecturers() {
      return $this->hasOne(Lecturers::className(),['id'=>'lecturer_id']); 
    }

    // Relationship with Courses
    public function getCourses() {
      return $this->hasOne(Courses::className(),['id'=>'course_id']); 
    }

      // Relationship with Schedule
    public function getSchedules() {
      return $this->hasOne(Schedules::className(),['id'=>'schedule_id']); 
    }

      // Relationship with Enrollements
    public function getEnrollements() {
      return $this->hasMany(Enrollements::className(),['sections_id'=>'id']); 
    }
}
