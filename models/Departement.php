<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "departement".
 *
 * @property integer $id_departement
 * @property string $nama_departement
 *
 * @property Pengaduan[] $pengaduans
 * @property User[] $users
 */
class Departement extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'departement';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama_departement'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_departement' => Yii::t('app', 'Id Departement'),
            'nama_departement' => Yii::t('app', 'Nama Departement'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPengaduans()
    {
        return $this->hasMany(Pengaduan::className(), ['id_departement' => 'id_departement']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['id_departement' => 'id_departement']);
    }
}
