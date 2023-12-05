<?php

namespace App\Models;

use CodeIgniter\Model;

class InventarisModel extends Model
{
    protected $table = 'inventaris';
    protected $primaryKey = 'id_inv';
    // protected $retunType='object';
    protected $useAutoIncrement = false;
    protected $allowedFields = ['id_inv', 'id_jns_barang', 'kode_barcode', 'nama_barang', 'merk', 'serial_number', 'lokasi', 'kondisi', 'status', 'thn_pengadaan'];


    public function autoNumberId()
    {
        $builder = $this->table('inventaris');
        $builder->selectMax('id_inv', 'idMax');
        $query = $builder->get();
        if ($query->getNumRows() > 0) {

            foreach ($query->getResult() as $key) {
                $code = '';
                $getData = substr($key->idMax, -9);
                $increment = intval($getData) + 1;
                $code = sprintf('%09s', $increment);
            }
        } else {
            $code = '000000001';
        }
        return 'INV-' . $code;
    }
    public function getInventaris($id = false)
    {

        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id_inv' => $id])->first();
    }

    public function getCari($namaBarang)
    {
        $builder = $this->db->table('inventaris');
        $builder->like('nama_barang', 'namaBarang', 'before'); // Produces: WHERE `title` LIKE '%match' ESCAPE '!'
        $builder->like('nama_barang', 'namaBarang', 'after');  // Produces: WHERE `title` LIKE 'match%' ESCAPE '!'
        $builder->like('nama_barang', 'namaBarang', 'both');   // Produces: WHERE `title` LIKE '%match%' ESCAPE '!'
        $query = $builder->get();
        return $query->getResult();
    }

    public function cari($keyword)
    {
        return $this->like('nama_barang', $keyword)
            ->orWhere('merk', $keyword)->where(['status' => 'TERSEDIA'])
            ->findAll();
    }


    public function getJoinsInvID($idInventaris)
    {
        $builder = $this->db->table('inventaris');
        $builder->join('jenis_barang', 'jenis_barang.id_jns_barang=inventaris.id_jns_barang');
        $query = $builder->getWhere(['id_inv' => $idInventaris]);
        return $query->getResultArray();
    }

    public function getCariMulti($keyword, array $columns)
    {
        $builder = $this->select('*')->groupStart();

        foreach ($columns as $column) {
            $builder->orLike($column, $keyword)->where(['status' => 'TERSEDIA']);
        }

        $builder->groupEnd();

        return $builder->findAll();
    }
}
