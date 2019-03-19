<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%enrollement_details}}".
 *
 * @property int $id
 * @property int $enrollement_id
 * @property string $comment
 * @property string $status
 */
class EnrollementDetails extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%enrollement_details}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['comment', 'status'], 'required'],
            [['enrollement_id'], 'safe'],
            [['comment'], 'string'],
            [['status'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'enrollement_id' => 'Enrollement ID',
            'comment' => 'Comment',
            'status' => 'Status',
        ];
    }

    public function getEnrollements() {
      return $this->hasOne(Enrollements::className(),['id'=>'enrollement_id']); 
    }
}
