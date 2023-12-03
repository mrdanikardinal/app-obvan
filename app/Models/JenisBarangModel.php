<?php

namespace App\Models;

use CodeIgniter\Model;


class JenisBarangModel extends Model
{

    protected $table = 'jenis_barang';
    protected $primaryKey = 'id_jns_barang';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['id_jns_barang', 'nama_jns_barang', 'jumlah'];

    public function getJenisBarang($id = false)
    {

        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id_jns_barang' => $id])->first();
    }


}