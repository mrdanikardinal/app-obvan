<?php

namespace App\Controllers;

use App\Models\KategoriObModel;



class StatusOutBroadcast extends BaseController
{
    protected $modelKategoriOB;
    public function __construct()
    {
        $this->modelKategoriOB = new KategoriObModel();
    }

    public function index()
    {
        $dataAll = $this->modelKategoriOB->getKategori();

        $data = [
            'allDataKategoriOB' => $dataAll
        ];

        return view('admin/status-kategori-out-broadcast/index', $data);
    }
    public function edit($idStatusKategoriOB)
    {
        $dataget = $this->modelKategoriOB->getKategori($idStatusKategoriOB);
        $data = [
            'getDataStatusKategori' => $dataget
        ];

        return view('admin/status-kategori-out-broadcast/edit', $data);
    }
    public function update($idStatusKategoriOB)
    {
        $namaStatusKategoriOB = $this->request->getVar('nama_status_kategori_ob');
        $this->modelKategoriOB->save([
            'id' => $idStatusKategoriOB,
            'nama_kategori' => $namaStatusKategoriOB,
        ]);
        session()->setFlashdata('pesan', 'Berhasil,update status kategori OB ' . $namaStatusKategoriOB);
        return redirect()->to('admin/status-kategori-out-broadcast');
    }
    public function delete($idStatusKatOb)
    {
        $this->modelKategoriOB->delete($idStatusKatOb);
        return redirect()->to('admin/status-kategori-out-broadcast');
    }
    public function create()
    {
        return view('admin/status-kategori-out-broadcast/create');
    }
    public function save()
    {
        $namaStatusKategoriOB = $this->request->getVar('nama_status_kategori_create');
        $this->modelKategoriOB->save([
            'nama_kategori' => $namaStatusKategoriOB,
        ]);
        session()->setFlashdata('pesan', 'Berhasil,input status kategori OB ' . $namaStatusKategoriOB);
        return redirect()->to('admin/status-kategori-out-broadcast');
    }
}
