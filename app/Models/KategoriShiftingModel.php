<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriShiftingModel extends Model
{
    protected $table = 'kategori_shifting';
    protected $allowedFields = ['nama_ketegori_shif'];
    protected $primaryKey = 'id_kategori_shif';
    protected $useAutoIncrement = true;

    public function getIdKategoriShifting($id = false)
    {

        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id_kategori_shif' => $id])->first();
    }


   

}