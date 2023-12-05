<?php

namespace App\Models;
use CodeIgniter\Model;
class PeminjamanAlatModel extends Model
{
    protected $table = 'peminjaman_alat';
    protected $primaryKey = 'id_pinjam';
    // protected $retunType='object';
    protected $useAutoIncrement = false;
    protected $allowedFields = ['id_pinjam','tanggal','sampai_dengan' ,'acara', 'tempat', 'durasi_pinjam', 'nama_peminjam', 'no_hp_peminjam','nama_pemberi','tanggal_kembali','nama_penerima','catatan'];


    public function autoNumberId()
    {
        $builder = $this->table('peminjaman_alat');
        $builder->selectMax('id_pinjam', 'idMax');
        $query = $builder->get();
        if ($query->getNumRows() > 0) {

            foreach ($query->getResult() as $key) {
                $code = '';
                $getData = substr($key->idMax, -4);
                $increment = intval($getData) + 1;
                $code = sprintf('%04s', $increment);
            }
        } else {
            $code = '0001';
        }
        return 'PJM-' . $code;
    }
    public function getPeminjamanAlat($id = false)
    {

        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id_pinjam' => $id])->first();
    }
    public function getJoinsID($id_pinjam)
    {
        $builder=$this->db->table('peminjaman_alat');
        $builder->join('parent_merk','parent_merk.id_pinjaman_alat=peminjaman_alat.id_pinjam');
        $query=$builder->getWhere(['id_pinjam' => $id_pinjam]);
        // dd($query->getResult());
        return $query->getResult();
        
    }
    public function getJoins()
    {
        $builder=$this->db->table('peminjaman_alat');
        $builder->join('parent_merk','parent_merk.id_pinjaman_alat=peminjaman_alat.id_pinjam');
        $query=$builder->get();
       
        return $query->getResult();
        
    }
    public function procedureGetItemsReady()
    {
        $query = $this->db->query("CALL getItemsReady()");
        return $query->getResultArray();
        
    }

    
}
