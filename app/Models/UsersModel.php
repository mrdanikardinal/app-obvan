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
    public function procedureGetNamaPemberi($idUser=null)
    {
        $query = $this->db->query("CALL getNamaPemberiPinjaman"."($idUser)");
        return $query->getResultArray();
        
    }
    public function procedureGetNamaPenerima($idUser)
    {
        $query = $this->db->query("CALL getNamaPenerimaPinjaman"."($idUser)");
        return $query->getResultArray();
        
    }
    public function procedureGetFullNameFromId($idUser)
    {
        $query = $this->db->query("CALL getFullNameFromId"."($idUser)");
        return $query->getResultArray();
        
    }
    public function procedureGetCrewDinasByIDUser($idUser)
    {
        $query = $this->db->query("CALL getCrewDinasByIDUser"."($idUser)");
        return $query->getResultArray();
        
    }
    public function proceduregetAcaraOBFromIDUser($idUser)
    {
        $query = $this->db->query("CALL getAcaraOBFromIDUser"."($idUser)");
        return $query->getResultArray();
        
    }
    
   public function proceduregetPrintIdPJMNamaPenerima($id_pinjam)
    {
        // dd('test');
        
        // $test=$id_pinjam;
        // $query = $this->db->query("CALL getPrintIdPJMNamaPenerima"."($id_pinjam)");
       
        
        // $query=$this->db->query("CALL getPrintIdPJMNamaPenerima(" . $test . ")");
        // return $query->getResultArray();
        // select * from peminjaman_alat INNER join users on peminjaman_alat.nama_penerima = users.id WHERE peminjaman_alat.id_pinjam=id

            $sql = "CALL `getPrintIdPJMNamaPenerima`(?)";
            $result = $this->db->query($sql,$id_pinjam); // $data included 3 param and binding & query to db
         
            return $result->getResultArray();
            // $this->db->close();
        
    }
  
   public function proceduregetPrintIdPJMNamaPemberi($id_pinjam)
    {
        // $query = $this->db->query("CALL getPrintIdPJMNamaPenerima"."($id_pinjam)");
        $query=$this->db->query("CALL getPrintIdPJMNamaPemberi(" . $id_pinjam . ")");
        return $query->getResultArray();
        // select * from peminjaman_alat INNER join users on peminjaman_alat.nama_penerima = users.id WHERE peminjaman_alat.id_pinjam=id
        
    }
  
   public function proceduregetParentMerkFromIdPjm($id_pinjam)
    {
        $query = $this->db->query("CALL getParentMerkFromIdPjm"."($id_pinjam)");
        // $query=$this->db->query("CALL getParentMerkFromIdPjm(" . $id_pinjam . ")");
        return $query->getResultArray();
        // SELECT * FROM parent_merk WHERE parent_merk.id_pinjaman_alat=idPjm
        
    }

    public function getTest($id)
    {
        $query = $this->db->query("select * from users INNER join peminjaman_alat on users.id = peminjaman_alat.nama_penerima WHERE peminjaman_alat.id_pinjam="."$id");
        return $query->getResultArray();
        
    }
    public function proceduregetAllShowUser(){
        $query = $this->db->query("CALL getAllShowUser()");
        return $query->getResultArray();
    }
   
}
