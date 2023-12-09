<?php

namespace App\Models;

use CodeIgniter\Model;


class KondisiModel extends Model
{

    protected $table = 'kondisi';
    protected $primaryKey = 'id_kondisi';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['nama_kondisi'];

    public function getKondisi($id = false)
    {

        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id_kondisi' => $id])->first();
    }



}