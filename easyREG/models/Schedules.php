<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%schedules}}".
 *
 * @property int $id
 * @property string $name
 * @property string $day
 * @property string $start_time
 * @property string $end_time
 */
class Schedules extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%schedules}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'day', 'start_time', 'end_time'], 'required'],
            [['name', 'day', 'start_time', 'end_time'], 'string', 'max' => 45],
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
            'day' => 'Day',
            'start_time' => 'Start Time',
            'end_time' => 'End Time',
        ];
    }

    // Relationship with Courses
    public function getSections() {
      return $this->hasMany(Sections::className(),['schedule_id'=>'id']); 
    }
}
