<?php

namespace App\Models;

use CodeIgniter\Model;


class LokasiModel extends Model
{

    protected $table = 'lokasi';
    protected $primaryKey = 'id_lokasi';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['nama_lokasi'];

    public function getLokasi($id = false)
    {

        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id_lokasi' => $id])->first();
    }



}