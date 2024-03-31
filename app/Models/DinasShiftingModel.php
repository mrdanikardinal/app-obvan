<?php

namespace App\Models;

use CodeIgniter\Model;

class DinasShiftingModel extends Model
{
    protected $table = 'dinas_shifting ';
    protected $allowedFields = ['id_kategori_dinas_crew','id_kategori_dinas_shif', 'tanggal','id_acara','lokasi','nomor_surat','nomor_surat_lembur'];
    protected $primaryKey = 'id_dinas_shifting';
    protected $useAutoIncrement = false;

    public function getIdDinasShifting($id = false)
    {

        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id_dinas_shifting' => $id])->first();
    }
    public function autoNumberId()
    {
        $builder = $this->db->table($this->table);
        $builder->selectMax($this->primaryKey);
        $result = $builder->get()->getRow();

        $maxId = $result->{$this->primaryKey};

        // Menetapkan nilai awal jika data kosong
        $nextAutoIncrementValue = ($maxId === null) ? 40 : $maxId + 1;

        return $nextAutoIncrementValue;
    }

    public function getDinasShifJoinJenisShifJoinNamaAcara()
    {
        $builder = $this->db->table($this->table);
        $builder->join('kategori_shifting','dinas_shifting.id_kategori_dinas_shif=kategori_shifting.id_kategori_shif ');
        $builder->join(' acara_shifting','dinas_shifting.id_acara =acara_shifting.id_acara_shift');
        $builder->join(' kategori_dinas_crew','dinas_shifting.id_kategori_dinas_crew =kategori_dinas_crew.id_kategori_dinas_crew');
        $query=$builder->get();
        
        return $query->getResultArray(); //return array
    }

    public function procedureGetShowCrewDinasShifting($idDinasShift)
    {
        $query = $this->db->query("CALL getShowCrewDinasShifting"."($idDinasShift)");

        return $query->getResultArray();
    }

    public function getDinasShiftDanLemburJoinCrewDinasShifAcara($idDinasShifting)
    {
   
        $builder = $this->db->table($this->table);
        $builder->join('kategori_shifting','dinas_shifting.id_kategori_dinas_shif=kategori_shifting.id_kategori_shif ');
        $builder->join(' acara_shifting','dinas_shifting.id_acara =acara_shifting.id_acara_shift');
        $builder->join(' kategori_dinas_crew','dinas_shifting.id_kategori_dinas_crew =kategori_dinas_crew.id_kategori_dinas_crew');
        // $builder->where(['id_dinas_shifting' => $idDinasShifting]&&['id_kategori_dinas_crew'=> 1]);
        $builder->where(['id_dinas_shifting' => $idDinasShifting]);
        $query=$builder->get();
        return $query->getResultArray(); //return array
    }
    public function procedureShowAllDinasShifting($idUsers){
        $query = $this->db->query("CALL getShowAllDinasShiftingByIDUserAndIDKategoriDinas"."($idUsers)");
        return $query->getResultArray();
    }
    public function procedureShowAllDinasLembur($idUsers){
        $query = $this->db->query("CALL getShowAllDinasLemburByIDUserAndIDKategoriDinas"."($idUsers)");
        return $query->getResultArray();
    }
   

}