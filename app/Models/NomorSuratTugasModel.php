<?php

namespace App\Models;

use CodeIgniter\Model;

class NomorSuratTugasModel extends Model
{

    protected $table = 'auto_nomor_surat';
    protected $primaryKey = 'id_nomor_surat';
    protected $nomorSurat = 'nomor_surat';
    protected $status = 'status';
    // protected $useAutoIncrement = true;
    // protected $useAutoIncrement = true;
    protected $allowedFields = ['id_nomor_surat', 'nomor_surat', 'status'];

    public function autoNomorSurat()
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