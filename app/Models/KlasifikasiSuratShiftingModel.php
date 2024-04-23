<?php

namespace App\Models;

use CodeIgniter\Model;


class KlasifikasiSuratShiftingModel extends Model
{
    protected $table = 'klasifikasi_surat_shifting';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['kode_klasifikasi'];

    public function getSuratShiftingModel($id = false)
    {

        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }




}