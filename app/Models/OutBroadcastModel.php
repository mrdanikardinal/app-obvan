<?php

namespace App\Models;

use CodeIgniter\Model;

class OutBroadcastModel extends Model
{
    protected $table = 'out_broadcast ';
    protected $primaryKey = 'id_ob';
    // protected $useAutoIncrement = true;
    protected $useAutoIncrement = false;
    protected $allowedFields = ['id_ob', 'id_kategori', 'tanggal', 'sampai_dengan', 'acara', 'lokasi','durasi', 'tp', 'td', 'ass_td', 'um','nomor_surat'];
    // protected $allowedFields = ['kategori', 'tanggal', 'sampai_dengan', 'acara', 'lokasi', 'tp', 'td', 'ass_td', 'um'];





    public function procedureGetAllShowOutBroadcast()
    {
        $query = $this->db->query("CALL getAllShowOutBroadcast()");
        return $query->getResultArray();
    }
    public function procedureGetShowCrewObJoinUser($idOb)
    {
        $query = $this->db->query("CALL getShowCrewObJoinUsers"."($idOb)");

        return $query->getResultArray();
    }
    public function procedureGetShowAlatJoinInv($idOb)
    {
        $query = $this->db->query("CALL getShowAlatObJoinInv"."($idOb)");

        return $query->getResultArray();
    }
    public function procedureGetShowObJoinKategoriCariById($idOb)
    {
        $query = $this->db->query("CALL getShowOBJoinKategoriCariByIDOb"."($idOb)");

        return $query->getResultArray();
    }

    public function getShowOutBroadcast($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id_ob' => $id])->first();
    }
    public function autoNumberIdOb()
    {
        $builder = $this->db->table($this->table);
        $builder->selectMax($this->primaryKey);
        $result = $builder->get()->getRow();

        $maxId = $result->{$this->primaryKey};

        // Menetapkan nilai awal jika data kosong
        $nextAutoIncrementValue = ($maxId === null) ? 20 : $maxId + 1;

        return $nextAutoIncrementValue;
    }

    public function getOBJointKategori()
    {
        $builder = $this->db->table($this->table);
        $builder->join('kategori_ob','out_broadcast.id_kategori=kategori_ob.id');
        $query=$builder->get();
        
        return $query->getResultArray(); //return array
    }

//mengambil data peralatan ob
    public function getData($id)
    {
        // Query untuk mengambil data dari database berdasarkan ID
        return $this->db->table($this->table)
                        ->where('id_ob', $id)
                        ->get()
                        ->getRow();
    }

    

}
