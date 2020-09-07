<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pengaduan;

/**
 * PengaduanSearch represents the model behind the search form about `app\models\Pengaduan`.
 */
class PengaduanSearch extends Pengaduan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_pengaduan', 'id_departement'], 'integer'],
            [['nama_pengadu', 'email_pengadu', 'telepon_pengadu', 'nama_keluhan', 'deskripsi_keluhan', 'status_keluhan', 'tgl_submit'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params, $custome = null)
    {
        $query = "";
        if ($custome) {
            $query = $custome;
        } else {
            $query = Pengaduan::find();
        }

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_pengaduan' => $this->id_pengaduan,
            'tgl_submit' => $this->tgl_submit,
            'id_departement' => $this->id_departement,
        ]);

        $query->andFilterWhere(['like', 'nama_pengadu', $this->nama_pengadu])
            ->andFilterWhere(['like', 'email_pengadu', $this->email_pengadu])
            ->andFilterWhere(['like', 'telepon_pengadu', $this->telepon_pengadu])
            ->andFilterWhere(['like', 'nama_keluhan', $this->nama_keluhan])
            ->andFilterWhere(['like', 'deskripsi_keluhan', $this->deskripsi_keluhan])
            ->andFilterWhere(['like', 'status_keluhan', $this->status_keluhan]);

        return $dataProvider;
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function searchStaff($params, $id)
    {
        $query = Pengaduan::find()->where([
            'id_departement' => $id,
            'status_keluhan' => 'on progress',
        ])->orWhere(['status_keluhan' => 'done',]);

        return $this->search($params, $query);
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function searchUmum($params)
    {
        $query = Pengaduan::find()->where([
            'status_keluhan' => 'done',
        ]);

        return $this->search($params, $query);
    }
}
