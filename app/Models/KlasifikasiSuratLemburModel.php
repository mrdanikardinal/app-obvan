<?php

namespace App\Models;

use CodeIgniter\Model;


class KlasifikasiSuratLemburModel extends Model
{
    protected $table = 'klasifikasi_surat_lembur';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['kode_klasifikasi'];

    public function getSuratLemburModel($id = false)
    {

        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }




}