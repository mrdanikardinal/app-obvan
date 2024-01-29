<?php

namespace App\Models;

use CodeIgniter\Model;


class KategoriObModel extends Model
{

    protected $table = 'kategori_ob';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['kategori'];

    public function getKategori($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id_status' => $id])->first();
    }



}