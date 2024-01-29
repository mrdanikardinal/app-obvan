<?php

namespace App\Models;

use CodeIgniter\Model;

class OutBroadcastModel extends Model
{
    protected $table = 'out_broadcast ';
    protected $primaryKey = 'id_ob';
    // protected $useAutoIncrement = true;
    protected $useAutoIncrement = false;
    protected $allowedFields = ['id_ob', 'id_kategori', 'tanggal', 'sampai_dengan', 'acara', 'lokasi','durasi', 'tp', 'td', 'ass_td', 'um'];
    // protected $allowedFields = ['kategori', 'tanggal', 'sampai_dengan', 'acara', 'lokasi', 'tp', 'td', 'ass_td', 'um'];

    public function procedureGetAllShowOutBroadcast()
    {
        $query = $this->db->query("CALL getAllShowOutBroadcast()");
        return $query->getResultArray();
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


}
