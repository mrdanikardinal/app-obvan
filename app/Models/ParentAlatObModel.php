<?php

namespace App\Models;

use CodeIgniter\Model;

class ParentAlatObModel extends Model
{
    protected $table = 'parent_alat_ob ';
    protected $allowedFields = ['id_ob', 'id_inv','jumlah'];

   
    public function getIdParentAlatOB($id = false)
    {

        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id_ob' => $id])->first();
    }



}
