<?php

namespace App\Models;

use CodeIgniter\Model;


class StatusModel extends Model
{

    protected $table = 'status';
    protected $primaryKey = 'id_status';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['nama_status'];

    public function getStatus($id = false)
    {

        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id_status' => $id])->first();
    }



}