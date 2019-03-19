<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%faculties}}".
 *
 * @property int $id
 * @property string $name
 * @property string $alias
 */
class Faculties extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%faculties}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'alias'], 'required'],
            [['name', 'alias'], 'string', 'max' => 45],
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
            'alias' => 'Alias',
        ];
    }
    /**
     * @inheritdoc
     */
    public function getDepartments() {
      return $this->hasMany(Departments::className(),['faculty_id'=>'id']); 
    }
    /**
     * @inheritdoc
     */
    public function getCourses() {
      return $this->hasMany(Courses::className(),['faculty_id'=>'id']); 
    }
    /**
     * students relationship with faculties
     */

    public function getStudents() {
      return $this->hasMany(Students::className(),['faculty_id'=>'id']); 
    }
}
