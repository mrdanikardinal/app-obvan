<?php

namespace App\Models;

use CodeIgniter\Model;

class NomorSuratManualModel extends Model
{
    // protected $table = 'nomor_surat_manual';
    // protected $primaryKey = 'id';
    // // protected $useAutoIncrement = true;
    // protected $allowedFields = ['id', 'no_surat_manual'];

    // public function getNomorSuratManual($id = false)
    // {

    //     if ($id == false) {
    //         return $this->findAll();
    //     }
    //     return $this->where(['id' => $id])->first();
    // }

    protected $table = 'nomor_surat_manual';
    protected $primaryKey = 'id';
    protected $nomorSurat = 'no_surat_manual';
    // protected $useAutoIncrement = true;

    protected $allowedFields = ['id', 'no_surat_manual'];

    public function dataNomorSuratManual()
    {
        $builder = $this->db->table($this->table);
        $builder->selectMax($this->nomorSurat);
        $result = $builder->get()->getRow();
        $maxId = $result->{$this->nomorSurat};
        // Menetapkan nilai awal jika data kosong
        $nextAutoIncrementValue = ($maxId === null) ? 1 : $maxId + 1;
        return $nextAutoIncrementValue;
    }


}