<?php

namespace App\Controllers;

use App\Models\KategoriObModel;



class StatusOutBroadcast extends BaseController
{
    protected $modelKategoriOB;
    protected $helpers = (['form']);
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
        $rules = [
            'nama_status_kategori_ob' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'nama kategori harus di isi.'

                ]
            ]

        ];
        $namaStatusKategoriOB = $this->request->getVar('nama_status_kategori_ob');
        if (!$this->validate($rules)) {

            return redirect()->back()->withInput();
        }
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
        session()->setFlashdata('pesanHapus', 'Berhasil,hapus status kategori OB ' . $idStatusKatOb);
        return redirect()->to('admin/status-kategori-out-broadcast');
    }
    public function create()
    {
        return view('admin/status-kategori-out-broadcast/create');
    }
    public function save()
    {

        $rules = [
            'nama_status_kategori_create' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'nama kategori harus di isi.'

                ]
            ]

        ];
        $namaStatusKategoriOB = $this->request->getVar('nama_status_kategori_create');

        if (!$this->validate($rules)) {

            return redirect()->back()->withInput();
        }
        $this->modelKategoriOB->save([
            'nama_kategori' => $namaStatusKategoriOB,
        ]);

        session()->setFlashdata('pesan', 'Berhasil,input status kategori OB ' . $namaStatusKategoriOB);
        return redirect()->to('admin/status-kategori-out-broadcast');
    }
}
