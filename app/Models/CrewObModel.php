<?php

namespace App\Models;

use CodeIgniter\Model;

class CrewObModel extends Model
{
    protected $table = 'crew_ob ';
    protected $allowedFields = ['id_ob', 'id_users'];
    protected $primaryKey = 'id_crew_ob';
    protected $useAutoIncrement = true;

    public function getIdOutBroadcast($id = false)
    {

        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }
    public function getCountOutBroadcastByUser()
    {
        $idUser=user_id();
        $builder = $this->db->table($this->table)->where('id_users', $idUser);
        $query   = $builder->get()->getNumRows();
        return $query;
    }

   

}
