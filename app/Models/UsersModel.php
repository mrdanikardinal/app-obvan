<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['fullname'];
    public function getUsers($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }
    public function procedureGetNamaPemberiORPenerima($idUser)
    {
        $query = $this->db->query("CALL getNamaPemberiAtauNamaPemberi"."($idUser)");
        return $query->getResultArray();
        
    }
}
