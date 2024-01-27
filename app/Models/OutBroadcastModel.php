<?php

namespace App\Models;

use CodeIgniter\Model;

class OutBroadcastModel extends Model
{
    protected $table = 'out_broadcast ';
    protected $primaryKey = 'id_ob';
    // protected $useAutoIncrement = true;
    // protected $allowedFields = ['id_ob', 'kategori', 'tanggal', 'sampai_dengan', 'acara', 'lokasi', 'tp', 'td', 'ass_td', 'um'];
    protected $allowedFields = ['kategori', 'tanggal', 'sampai_dengan', 'acara', 'lokasi', 'tp', 'td', 'ass_td', 'um'];

    public function procedureGetAllShowOutBroadcast()
    {
        $query = $this->db->query("CALL getAllShowOutBroadcast()");
        return $query->getResultArray();
    }


}
