<?php

namespace App\Controllers;

use App\Models\JenisBarangModel;
use App\Models\LokasiModel;
use App\Models\KondisiModel;
use App\Models\StatusModel;

class StatusInventaris extends BaseController
{
    protected $helpers = (['form']);
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
        return view('admin/status-inventaris/create-jenis-barang');
    }
    public function save_jenis_barang()
    {

        $rules = [
            'nama_jenis_barang' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'jenis barang harus di isi.'

                ]
            ]

        ];
        $namaJenisBarang = $this->request->getVar('nama_jenis_barang');
        if (!$this->validate($rules)) {

            return redirect()->back()->withInput();
        }
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

        $rules = [
            'nama_jenis_barang' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'jenis barang harus di isi.'

                ]
            ]

        ];

        $namaJenisBarang = $this->request->getVar('nama_jenis_barang');
        if (!$this->validate($rules)) {

            return redirect()->back()->withInput();
        }
        $this->jenisBarangModel->save([
            'id_jns_barang' => $idJenisBarang,
            'nama_jns_barang' => $namaJenisBarang,
        ]);
        session()->setFlashdata('pesan', 'Berhasil,update Jenis Barang ' . $namaJenisBarang);
        return redirect()->to('admin/status-inventaris');
    }
    // end jenis barang
    // start lokasi
    public function edit_nama_lokasi($idLokasi)
    {
        $getIdLokasi = $this->lokasiModel->getLokasi($idLokasi);
        $data = [
            'getDataIdNamaLokasi' => $getIdLokasi
        ];
        return view('admin/status-inventaris/edit-lokasi', $data);
    }

    public function delete_nama_lokasi($idNamaLokasi)
    {
        $this->lokasiModel->delete($idNamaLokasi);
        session()->setFlashdata('pesanHapus', 'Berhasil,hapus nama lokasi ID ' . $idNamaLokasi);
        return redirect()->to('admin/status-inventaris');
    }
    public function create_nama_lokasi()
    {
        return view('admin/status-inventaris/create-lokasi');
    }
    public function save_nama_lokasi()
    {

        $rules = [
            'nama_lokasi' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'nama lokasi harus di isi.'

                ]
            ]

        ];

        $namaNamaLokasi = $this->request->getVar('nama_lokasi');
        if (!$this->validate($rules)) {

            return redirect()->back()->withInput();
        }

        $this->lokasiModel->save([
            'nama_lokasi' => $namaNamaLokasi,
        ]);
        session()->setFlashdata('pesan', 'Berhasil,input Nama Lokasi ' . $namaNamaLokasi);
        return redirect()->to('admin/status-inventaris');
    }
    public function update_nama_lokasi($idNamaLokasi)
    {
        $rules = [
            'nama_lokasi' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'nama lokasi harus di isi.'

                ]
            ]

        ];

        $namaLokasi = $this->request->getVar('nama_lokasi');
        if (!$this->validate($rules)) {

            return redirect()->back()->withInput();
        }
        $this->lokasiModel->save([
            'id_lokasi' => $idNamaLokasi,
            'nama_lokasi' => $namaLokasi,
        ]);
        session()->setFlashdata('pesan', 'Berhasil,update Nama Lokasi ' . $namaLokasi);
        return redirect()->to('admin/status-inventaris');
    }

    // end lokasi
    // start kondisi

    public function edit_nama_kondisi($IdKondisi)
    {
        $getIdKondisi = $this->kondisiModel->getKondisi($IdKondisi);
        $data = [
            'getDataIdNamaKondisi' => $getIdKondisi
        ];
        return view('admin/status-inventaris/edit-kondisi', $data);
    }

    public function delete_nama_kondisi($idKondisi)
    {
        $this->kondisiModel->delete($idKondisi);
        session()->setFlashdata('pesanHapus', 'Berhasil,hapus nama kondisi ID ' . $idKondisi);
        return redirect()->to('admin/status-inventaris');
    }
    public function create_nama_kondisi()
    {
        return view('admin/status-inventaris/create-kondisi');
    }
    public function save_nama_kondisi()
    {

        $rules = [
            'nama_kondisi' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'nama kondisi harus di isi.'

                ]
            ]

        ];
        $namaNamaKondisi = $this->request->getVar('nama_kondisi');


        if (!$this->validate($rules)) {

            return redirect()->back()->withInput();
        }
        $this->kondisiModel->save([
            'nama_kondisi' => $namaNamaKondisi,
        ]);
        session()->setFlashdata('pesan', 'Berhasil,input nama kondisi ' . $namaNamaKondisi);
        return redirect()->to('admin/status-inventaris');
    }
    public function update_nama_kondisi($idNamaKondisi)
    {
        $rules = [
            'nama_kondisi' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'nama kondisi harus di isi.'

                ]
            ]

        ];

        $namaKondisi = $this->request->getVar('nama_kondisi');

        if (!$this->validate($rules)) {

            return redirect()->back()->withInput();
        }
        $this->kondisiModel->save([
            'id_kondisi' => $idNamaKondisi,
            'nama_kondisi' => $namaKondisi,
        ]);
        session()->setFlashdata('pesan', 'Berhasil,update Nama Kondisi ' . $namaKondisi);
        return redirect()->to('admin/status-inventaris');
    }
    // end kondisi

    // start status
    public function edit_nama_status($IdStatus)
    {
        $getIdStatus = $this->statusModel->getStatus($IdStatus);
        $data = [
            'getDataIdNamaStatus' => $getIdStatus
        ];
        return view('admin/status-inventaris/edit-status', $data);
    }

    public function delete_nama_status($idStatus)
    {
        $this->statusModel->delete($idStatus);
        session()->setFlashdata('pesanHapus', 'Berhasil,hapus nama status ID ' . $idStatus);
        return redirect()->to('admin/status-inventaris');
    }
    public function create_nama_status()
    {
        return view('admin/status-inventaris/create-status');
    }
    public function save_nama_status()
    {


        $rules = [
            'nama_status' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'nama status harus di isi.'

                ]
            ]

        ];
        $namaNamaStatus = $this->request->getVar('nama_status');
        if (!$this->validate($rules)) {

            return redirect()->back()->withInput();
        }
        $this->statusModel->save([
            'nama_status' => $namaNamaStatus,
        ]);
        session()->setFlashdata('pesan', 'Berhasil,input nama status ' . $namaNamaStatus);
        return redirect()->to('admin/status-inventaris');
    }
    public function update_nama_status($idNamaStatus)
    {
        $rules = [
            'nama_status' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'nama status harus di isi.'

                ]
            ]

        ];

        $getNamaStatus = $this->request->getVar('nama_status');
        if (!$this->validate($rules)) {

            return redirect()->back()->withInput();
        }
        $this->statusModel->save([
            'id_status' => $idNamaStatus,
            'nama_status' => $getNamaStatus,
        ]);
        session()->setFlashdata('pesan', 'Berhasil,update nama status ' . $idNamaStatus);
        return redirect()->to('admin/status-inventaris');
    }
    // end status
}
