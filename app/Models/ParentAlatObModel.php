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

    public function getJoinOBAndAlatINV($idOB)
    {
        $builder = $this->db->table($this->table);
        $builder->join('inventaris','parent_alat_ob.id_inv=inventaris.id_inv');
        // $query=$builder->get();
        $query = $builder->getWhere(['id_ob' => $idOB]);
        return $query->getResultArray(); //return array
    }
    public function getCountAlatOB($idOB)
    {
        $builder = $this->db->table($this->table);
        $builder->join('inventaris','parent_alat_ob.id_inv=inventaris.id_inv');
        $query = $builder->getWhere(['id_ob' => $idOB]);
        return $query->getNumRows(); //Count
    }
 


}
