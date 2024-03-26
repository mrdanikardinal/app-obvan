<?php

namespace App\Models;

use CodeIgniter\Model;

class AcaraDinasShiftingModel extends Model
{
    protected $table = 'acara_shifting';
    protected $allowedFields = ['nama_acara_shift'];
    protected $primaryKey = 'id_acara_shift';
    protected $useAutoIncrement = true;

    public function getIdNamaAcaraShif($id = false)
    {

        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id_acara_shift' => $id])->first();
    }

}