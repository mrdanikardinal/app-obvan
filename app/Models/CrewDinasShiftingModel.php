<?php

namespace App\Models;

use CodeIgniter\Model;

class CrewDinasShiftingModel extends Model
{
    protected $table = 'crew_shifting ';
    protected $allowedFields = ['id_dinas_shif', 'id_users'];
    protected $primaryKey = 'id_crew_shifting';
    protected $useAutoIncrement = true;

    public function getIdCrewDinasShifting($id = false)
    {

        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id_crew_shifting' => $id])->first();
    }
    public function getCountDinasShifting($idUser)
    {
        $builder = $this->db->table($this->table);
        $builder->join(' dinas_shifting','crew_shifting.id_dinas_shif =dinas_shifting.id_dinas_shifting');
        $builder->where(['id_kategori_dinas_crew' => 1]);
        $builder->where(['id_users' => $idUser]);
        $query=$builder->get()->getNumRows();
        return $query;
    }
   
    public function getCountDinasLembur($idUser)
    {
        $builder = $this->db->table($this->table);
        $builder->join(' dinas_shifting','crew_shifting.id_dinas_shif =dinas_shifting.id_dinas_shifting');
        $builder->where(['id_kategori_dinas_crew' => 2]);
        $builder->where(['id_users' => $idUser]);
        $query=$builder->get()->getNumRows();
        return $query;
    }
   

   

}