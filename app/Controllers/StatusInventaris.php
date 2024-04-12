<?php

namespace App\Controllers;

use App\Models\JenisBarangModel;
use App\Models\LokasiModel;
use App\Models\KondisiModel;
use App\Models\StatusModel;

class StatusInventaris extends BaseController
{

    protected $jenisBarangModel;
    protected $lokasiModel;
    protected $kondisiModel;
    protected $statusModel;


    public function __construct()
    {
        $this->jenisBarangModel = new JenisBarangModel();
        $this->lokasiModel = new LokasiModel();
        $this->kondisiModel = new KondisiModel();
        $this->statusModel = new StatusModel();
    }

    public function index()
    {
        $getJenisBarang = $this->jenisBarangModel->getJenisBarang();
        $getLokasiBarang = $this->lokasiModel->getLokasi();
        $getKondisi = $this->kondisiModel->getKondisi();
        $getStatusModel = $this->statusModel->getStatus();
        $data = [
            'getDataBarang' => $getJenisBarang,
            'getDataLokasi' => $getLokasiBarang,
            'getDataKondisi' => $getKondisi,
            'getDataStatus' => $getStatusModel,
        ];
        return view('admin/status-inventaris/index', $data);
    }
    public function create()
    {
    }
    // start jenis barang
    public function edit_jenis_barang($idJenisBarang)
    {
        $getIdJenisBarang = $this->jenisBarangModel->getJenisBarang($idJenisBarang);
        $data = [
            'getDataIdJenisBarang' => $getIdJenisBarang
        ];
        return view('admin/status-inventaris/edit-jenis-barang', $data);
    }
    public function create_jenis_barang()
    {
        return view('admin/status-inventaris/create_jenis_barang');
    }
    public function save_jenis_barang()
    {
        $namaJenisBarang = $this->request->getVar('nama_jenis_barang');

        $this->jenisBarangModel->save([
            'nama_jns_barang' => $namaJenisBarang,
        ]);
        session()->setFlashdata('pesan', 'Berhasil,input Jenis Barang ' . $namaJenisBarang);
        return redirect()->to('admin/status-inventaris');
    }
    public function delete_jenis_barang($idJenisBarang)
    {
        $this->jenisBarangModel->delete($idJenisBarang);
        session()->setFlashdata('pesanHapus', 'Berhasil,hapus Jenis Barang ID ' . $idJenisBarang);
        return redirect()->to('admin/status-inventaris');
    }
    public function update_jenis_barang($idJenisBarang)
    {

        $namaJenisBarang = $this->request->getVar('nama_jenis_barang');

        $this->jenisBarangModel->save([
            'id_jns_barang' => $idJenisBarang,
            'nama_jns_barang' => $namaJenisBarang,
        ]);
        session()->setFlashdata('pesan', 'Berhasil,update Jenis Barang ' . $namaJenisBarang);
        return redirect()->to('admin/status-inventaris');
    }
    // end jenis barang
}
