<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pengaduan".
 *
 * @property integer $id_pengaduan
 * @property string $nama_pengadu
 * @property string $email_pengadu
 * @property string $telepon_pengadu
 * @property string $nama_keluhan
 * @property string $deskripsi_keluhan
 * @property string $status_keluhan
 * @property string $tgl_submit
 * @property integer $id_departement
 *
 * @property Departement $idDepartement
 */
class Pengaduan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pengaduan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [
                ['id_departement', 'nama_pengadu', 'email_pengadu',
                    'telepon_pengadu', 'deskripsi_keluhan', 'nama_keluhan'
                ], 'required', 'message' => 'Tidak Boleh Kosong'],
            [
                ['email_pengadu',], 'email', 'message' => 'Format email salah, cth : example@xyz.com'],
            [['status_keluhan', 'pesan_balasan'], 'string'],
            [['tgl_submit'], 'safe'],
            [['id_departement'], 'integer'],
            [['nama_pengadu'], 'string', 'max' => 35],
            [['email_pengadu', 'nama_keluhan'], 'string', 'max' => 50],
            [['telepon_pengadu'], 'string', 'max' => 15],
            [['deskripsi_keluhan'], 'string', 'max' => 165],
            [['id_departement'], 'exist', 'skipOnError' => true,
                'targetClass' => Departement::className(),
                'targetAttribute' => ['id_departement' => 'id_departement']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_pengaduan' => Yii::t('app', 'ID'),
            'nama_pengadu' => Yii::t('app', 'Nama'),
            'email_pengadu' => Yii::t('app', 'Email'),
            'telepon_pengadu' => Yii::t('app', 'Telepon'),
            'nama_keluhan' => Yii::t('app', 'Nama Keluhan'),
            'deskripsi_keluhan' => Yii::t('app', 'Deskripsi Keluhan'),
            'status_keluhan' => Yii::t('app', 'Status'),
            'tgl_submit' => Yii::t('app', 'Tanggal Submit'),
            'id_departement' => Yii::t('app', 'Departement'),
            'pesan_balasan' => Yii::t('app', 'Pesan Balasan'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdDepartement()
    {
        return $this->hasOne(Departement::className(), ['id_departement' => 'id_departement']);
    }
}
