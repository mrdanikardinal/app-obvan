<?php

namespace App\Models;

use CodeIgniter\Model;


class KlasifikasiSuratPenerimaModel extends Model
{
    protected $table = 'klasifikasi_surat_penerima';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['kode_klasifikasi'];

    public function getSuratPenerimaModel($id = false)
    {

        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }




}