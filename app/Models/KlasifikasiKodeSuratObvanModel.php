<?php

namespace App\Models;

use CodeIgniter\Model;


class KlasifikasiKodeSuratObvanModel extends Model
{
    protected $table = 'kode_surat_klasifikasi_obvan';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['kode_klasifikasi_obvan'];

    
    public function getKodeSuratObvanModel($id = false)
    {

        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }

}
