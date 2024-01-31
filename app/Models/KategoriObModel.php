<?php

namespace App\Models;

use CodeIgniter\Model;


class KategoriObModel extends Model
{

    protected $table = 'kategori_ob';
    protected $primaryKey = 'id_kategori';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['nama_kategori'];

    public function getKategori($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id_kategori' => $id])->first();
    }



}