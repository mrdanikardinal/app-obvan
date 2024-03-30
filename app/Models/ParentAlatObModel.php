<?php

namespace App\Models;

use CodeIgniter\Model;

class ParentAlatObModel extends Model
{
    protected $table = 'parent_alat_ob ';
    protected $allowedFields = ['id_parent_alat_ob','id_ob', 'id_inv','jumlah'];
    protected $primaryKey = 'id_parent_alat_ob';
    protected $useAutoIncrement = true;

   
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
        // $builder->join('out_broadcast AS ob','parent_alat_ob.id_ob=ob.id_ob');
        // $query=$builder->get();
        $query = $builder->getWhere(['parent_alat_ob.id_ob' => $idOB]);
        // $query=$builder->get();
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
