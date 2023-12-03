<?php

namespace App\Models;

use CodeIgniter\Model;


class JenisBarangModel extends Model
{

    protected $table = 'jenis_barang';
    protected $primaryKey = 'id_jns_barang';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['id_jns_barang', 'nama_jns_barang', 'jumlah'];

    public function getJenisBarang($id = false)
    {

        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id_jns_barang' => $id])->first();
    }
    public function procedureGetCountBarang()
    {
        $query = $this->db->query("CALL getCountItemsBarang()");
        return $query->getResultArray();
        
    }
    public function getJoinsInventaris()
    {
        $builder=$this->db->table('jenis_barang');
        $builder->join('inventaris','inventaris.id_jns_barang=jenis_barang.id_jns_barang');
        $query=$builder->get();
       
        // return $query->getResult(); //return object
        return $query->getResultArray(); //return array
        
    }


}