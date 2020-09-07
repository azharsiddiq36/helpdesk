<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property integer $nip
 * @property string $username
 * @property string $password
 * @property string $nama_staff
 * @property integer $id_departement
 * @property string $email
 * @property string $telepon
 * @property string $role
 *
 * @property Departement $idDepartement
 */
class User extends \yii\db\ActiveRecord implements IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nip', 'username', 'password'], 'required'],
            [['nip', 'id_departement'], 'integer'],
            [['role'], 'string'],
            [['username', 'password'], 'string', 'max' => 255],
            [['nama_staff', 'email'], 'string', 'max' => 35],
            [['telepon'], 'string', 'max' => 20],
            [['id_departement'], 'exist', 'skipOnError' => true, 'targetClass' => Departement::className(), 'targetAttribute' => ['id_departement' => 'id_departement']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'nip' => Yii::t('app', 'NIP'),
            'username' => Yii::t('app', 'Username'),
            'password' => Yii::t('app', 'Password'),
            'nama_staff' => Yii::t('app', 'Nama Staff'),
            'id_departement' => Yii::t('app', 'Departement'),
            'email' => Yii::t('app', 'Email'),
            'telepon' => Yii::t('app', 'Telepon'),
            'role' => Yii::t('app', 'Role'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne(['nip' => $id]);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = $password;//Security::generatePasswordHash($password);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username]);
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return self::findOne(['nip' => $this->getId()]);
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === $password;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdDepartement()
    {
        return $this->hasOne(Departement::className(), ['id_departement' => 'id_departement']);
    }
}
