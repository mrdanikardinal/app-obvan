<?php

namespace App\Models;

use CodeIgniter\Model;


class KlasifikasiSuratObModel extends Model
{
    protected $table = 'klasifikasi_surat_ob';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['kode_klasifikasi'];

    public function getSuratOBModel($id = false)
    {

        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }




}