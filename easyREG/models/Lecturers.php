<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%lecturers}}".
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $qualification
 * @property string $rank
 * @property string $type
 * @property int $department_id
 */
class Lecturers extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%lecturers}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name', 'qualification', 'rank', 'type', 'department_id'], 'required'],
            [['department_id'], 'integer'],
            [['first_name', 'last_name', 'qualification', 'rank', 'type'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'qualification' => 'Qualification',
            'rank' => 'Rank',
            'type' => 'Type',
            'department_id' => 'Department ID',
        ];
    }
    // lecturers relationship with departments
    public function getDepartments() {
      return $this->hasOne(Departments::className(),['id'=>'department_id']); 
    }
    // lecturers relationship with Sections
    public function getSections() {
      return $this->hasMany(Sections::className(),['lecturer_id'=>'id']); 
    }
}
