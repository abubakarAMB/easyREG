<?php

namespace app\models;

use yii;
use yii\base\model;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
use yii\base\security;

class User extends ActiveRecord implements IdentityInterface {
    // the password_repeate field is not part of the model so we add it
    public $password_repeate;
    public static function tableName() { 
        return '{{%users}}'; 
    }
     // `id`, `full_name`, `username`, `email`, `password`, `auth_key`, `create_date`
      public function rules()
    {
        return [
            // all fields are required
            [['full_name','username','email','password','password_repeate'], 'required'],
            //email must be a valid email
            ['email', 'email'],
             //email must be a valid email
            ['username', 'unique'],
            //user role se by default to student S user_role
             [['user_role'], 'safe'],

            //password confirmation
            ['password_repeate', 'compare', 'compareAttribute' => 'password'],
        ];
    }
    /** * Finds an identity by the given ID. * * @param string|int $id the ID to be looked for * @return IdentityInterface|null the identity object that matches the given ID. */ 

    public static function findIdentity($id) {
      return static::findOne($id); 
    }
    /** * Finds an identity by the given token. * * @param string $token the token to be looked for * @return IdentityInterface|null the identity object that matches the given token. */ 
    public static function findIdentityByAccessToken($token, $type = null) { 
        return static::findOne(['access_token' => $token]); 
    }
    /** * @return int|string current user ID */
     public function getId() {
      return $this->id; 
    }
    /** * @return string current user auth key */ 
     public function getAuthKey() {
      return $this->auth_key; 
    }
    /** * @param string $authKey * @return bool if auth key is valid for current user */
    public function validateAuthKey($authKey) { 
        return $this->getAuthKey() === $authKey; 
    }
    // access control
    /** * @return validate user password */ 
     public function validatePassword($password) {
      return $this->password === md5($password); 
    }

    /** * @return validate username */ 
     public function findByUsername($username) {
      return User::findOne(['username'=>$username]); 
    }

    public function beforeSave($insert){
      if (parent::beforeSave($insert)) {
         if ($this->isNewRecord) {
              $this->auth_key = \Yii::$app->security->generateRandomString();
              $this->user_role = 'S';
          }
          //check to see if the password was submitted 
          if (isset($this->password)) {
             $this->password=md5($this->password);
             return parent::beforeSave($insert);
          } 
      }
       return;
    }
   /**
     * @user-student realtionship
     */
    public function getStudents() {
      return $this->hasOne(Students::className(),['user_id'=>'id']); 
    } 
}
?>