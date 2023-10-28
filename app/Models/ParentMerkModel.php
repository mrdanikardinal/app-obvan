<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Database\RawSql;

class ParentMerkModel extends Model
{
    protected $table = 'parent_merk';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['id', 'id_pinjaman_alat', 'nama_barang', 'merk', 'serial_number', 'jumlah','status'];

    public function getParentMerk($id = false)
    {

        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }

    public function getParentViews($id)
    {
        return $this->where(['id_pinjaman_alat' => $id])->findAll();
    }
    // function checkPinjam()
    // {

    //     $builder = $this->db->table('parent_merk');
    //     $sql = 'SELECT (CASE WHEN COUNT(status)=SUM(status) THEN 1 ELSE 0 END) FROM parent_merk';
    //     $builder->select(new RawSql($sql));
    //     $query = $builder->get();
    //     return $query->getResult();
    // }
    public function getCheckDone()
    {
        // sql oke return object
    //     $builder=$this->db->query("SELECT (CASE WHEN COUNT(status)=SUM(status) THEN 1 ELSE 0 END) as hasil FROM parent_merk WHERE id_pinjaman_alat='$idPinjaman'");
        
    //    $check= $builder->getResult();
    //    foreach($check as $key){
    //     if($key->hasil==0){
    //         echo 'belum selesai';
    //     }elseif($key->hasil==1){
    //         echo 'selesai';
    //     }
        
    //    }

    //    return $check;
        
         //end sql oke return object
      

        // sql oke return array
        $query = "SELECT (CASE WHEN COUNT(status)=SUM(status) THEN 1 ELSE 0 END)AS hasil FROM parent_merk INNER JOIN peminjaman_alat ON parent_merk.id_pinjaman_alat=peminjaman_alat.id_pinjam GROUP BY peminjaman_alat.id_pinjam";
        $query = $this->db->query($query);
        // return $query->getResult();
        return $query->getResultArray();
        //end sql oke return arrray
    }
}
