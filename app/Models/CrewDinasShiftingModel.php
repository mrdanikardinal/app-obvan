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


   

}