<?php

namespace App\Models;

use CodeIgniter\Model;


class KlasifikasiSuratPemberiModel extends Model
{
    protected $table = 'klasifikasi_surat_pemberi';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['kode_klasifikasi'];

    public function getSuratPemberiModel($id = false)
    {

        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }




}