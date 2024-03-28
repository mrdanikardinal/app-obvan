<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriCrewDinasShiftLemburModel extends Model
{
    protected $table = ' kategori_dinas_crew';
    protected $allowedFields = ['nama_kategori_dinas_crew'];
    protected $primaryKey = 'id_kategori_dinas_crew';
    protected $useAutoIncrement = true;

    public function getIdKategoriShiftLembur($id = false)
    {

        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id_kategori_dinas_crew' => $id])->first();
    }



}