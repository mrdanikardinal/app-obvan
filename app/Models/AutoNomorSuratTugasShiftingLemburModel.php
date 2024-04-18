<?php

namespace App\Models;

use CodeIgniter\Model;

class AutoNomorSuratTugasShiftingLemburModel extends Model
{

    protected $table = 'auto_nomo_surat_shifting_lembur';
    protected $primaryKey = 'id_nomor_surat';
    protected $nomorSurat = 'nomor_surat';
    protected $status = 'status';
    protected $allowedFields = ['id_nomor_surat', 'nomor_surat', 'status'];

    public function autoNomorSuratShiftingLembur()
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