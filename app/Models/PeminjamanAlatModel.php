<?php

namespace App\Models;

use CodeIgniter\Model;

class PeminjamanAlatModel extends Model
{
    protected $table = 'peminjaman_alat';
    protected $primaryKey = 'id_pinjam';
    // protected $retunType='object';
    protected $useAutoIncrement = false;
    protected $allowedFields = ['id_pinjam', 'tanggal', 'sampai_dengan', 'acara', 'tempat', 'durasi_pinjam', 'nama_peminjam', 'no_hp_peminjam', 'nama_pemberi', 'tanggal_kembali', 'nama_penerima', 'catatan','nomor_surat_pemberi','nomor_surat_penerima','nomor_surat_pemberi_manual','nomor_surat_penerima_manual'];



    // public function autoNumberId()
    // {
    //     $builder = $this->table('peminjaman_alat');
    //     $builder->selectMax('id_pinjam', 'idMax');
    //     $query = $builder->get();
    //     if ($query->getNumRows() > 0) {

    //         foreach ($query->getResult() as $key) {
    //             $code = '';
    //             $getData = substr($key->idMax, -4);
    //             $increment = intval($getData) + 1;
    //             $code = sprintf('%04s', $increment);
    //         }
    //     } else {
    //         $code = '0001';
    //     }
    //     return 'PJM-' . $code;
    // }

    public function autoNumberId()
    {
        $builder = $this->db->table($this->table);
        $builder->selectMax($this->primaryKey);
        $result = $builder->get()->getRow();

        $maxId = $result->{$this->primaryKey};

        // Menetapkan nilai awal jika data kosong
        $nextAutoIncrementValue = ($maxId === null) ? 10 : $maxId + 1;

        return $nextAutoIncrementValue;
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
        $builder = $this->db->table('peminjaman_alat');
        $builder->join('parent_merk', 'parent_merk.id_pinjaman_alat=peminjaman_alat.id_pinjam');
        $query = $builder->getWhere(['id_pinjam' => $id_pinjam]);
        // dd($query->getResult());
        return $query->getResult();
    }
    public function getJoins()
    {
        $builder = $this->db->table('peminjaman_alat');
        $builder->join('parent_merk', 'parent_merk.id_pinjaman_alat=peminjaman_alat.id_pinjam');
        $query = $builder->get();

        return $query->getResult();
    }
    public function procedureGetItemsReady()
    {
        $query = $this->db->query("CALL getItemsReady()");
        return $query->getResultArray();
    }

    public function getOBJoinNamaPemberiJoinNamaPenerima($idPinjam)
    {
        $builder = $this->db->table($this->table);
        $builder->join('users','peminjaman_alat.nama_pemberi=users.id');
        // $builder->join(' peminjaman_alat','peminjaman_alat.nama =acara_shifting.id_acara_shift');
        $builder->join(' users AS users2','peminjaman_alat.nama_penerima =users2.id');
        $builder->where(['id_pinjam' => $idPinjam]);
        $query=$builder->get();
        return $query->getResultArray(); //return array
    }

    public function getOBJoinNamaPemberiJoinNamaPemberi($idPinjam)
    {
        $builder = $this->db->table($this->table);
        $builder->join('users','peminjaman_alat.nama_pemberi=users.id');
        // $builder->join(' peminjaman_alat','peminjaman_alat.nama =acara_shifting.id_acara_shift');
        $builder->join(' users AS users2','peminjaman_alat.nama_pemberi =users2.id');
        $builder->where(['id_pinjam' => $idPinjam]);
        $query=$builder->get();
        return $query->getResultArray(); //return array
    }
    


    // public function procedureGetDataPrintToIDPJMNamaPenerima($id_pinjam)
    // {
    //     $query = $this->db->query("CALL getDataPrintToIDPJMNamaPenerima"."($id_pinjam)");

    //     return $query->getResultArray();


    // }
    //script for procedure mysql call barcode
    //     SELECT inventaris.id_inv,inventaris.kode_barcode,jenis_barang.nama_jns_barang,inventaris.nama_barang,inventaris.merk,inventaris.serial_number,lokasi.nama_lokasi
    // FROM ((inventaris
    // INNER JOIN jenis_barang ON jenis_barang.id_jns_barang = inventaris.id_jns_barang)
    // INNER JOIN lokasi ON lokasi.id_lokasi = inventaris.id_lokasi)  WHERE id_status=1 && id_kondisi=1
    public function getCountPemberiPinjam()
    {
        $idUser=user_id();
        $builder = $this->db->table($this->table)->where('nama_pemberi', $idUser);
        $query   = $builder->get()->getNumRows();
        return $query;
    }
    public function getCountPenerimaPinjam()
    {
        $idUser=user_id();
        $builder = $this->db->table($this->table)->where('nama_penerima', $idUser);
        $query   = $builder->get()->getNumRows();
        return $query;
    }


}
