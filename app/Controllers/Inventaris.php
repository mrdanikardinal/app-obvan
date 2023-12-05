<?php

namespace App\Controllers;

use App\Models\InventarisModel;
use App\Models\JenisBarangModel;
use Picqer\Barcode\BarcodeGeneratorPNG;


class Inventaris extends BaseController
{
    protected $inventarisModel;
    protected $jnsBarang;


    public function __construct()
    {
        $this->inventarisModel = new InventarisModel();
        $this->jnsBarang = new JenisBarangModel();
    }
    public function index()
    {
        
        // $dataJoins2= $this->inventarisModel->getJoinsInvID('INV-000000002');
        // dd($dataJoins2);

        $dataJoins= $this->jnsBarang->getJoinsInventaris();
        $generator = new BarcodeGeneratorPNG();
        $data = [
            'generator' => $generator,
            'dataJoins'=> $dataJoins,
            'title'=> ' Tambah Tabel Inventaris'
        ];
        return view('inventaris/index', $data);

    }
    public function edit($idInv)
    {
        // $dataJoins= $this->inventarisModel->getJoinsInvID($idInv);
        // $jenisBarang=$this->jnsBarang->getJenisBarang();
        // $data = [
        //     'dataJoins'=> $dataJoins,
        //     'jenisBarang'=>$jenisBarang,
        //     'title'=> 'Tabel Update Inventaris'
        // ];
        // return view('inventaris/edit', $data);
        $data['inventaris'] = $this->inventarisModel->getInventaris($idInv);
        $data['jenisBarang'] = $this->jnsBarang->getJenisBarang();
        $data['title'] = 'Tabel Update Inventaris';
        // dd($data['title']);
           
        return view('inventaris/edit', $data);
    }

    public function create()
    {
        session();
        $dataJenisBarang= $this->jnsBarang->getJenisBarang();
        $data = [
            'title' => 'Form Tambah Data Inventaris',
            'validation' => \Config\Services::validation(),
            'jenisBarang'=> $dataJenisBarang
        ];

        return view('inventaris/create', $data);
    }


    public function save()
    {

        $rules = [
            'nama_barang' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'nama barang harus di isi.'

                ]
            ],

        ];


        $idAutoInventaris = $this->inventarisModel->autoNumberId();
        $namaBarang = $this->request->getVar('nama_barang');
        $jenisBarang = $this->request->getVar('jenis_barang');
        $timeForBarcode = time();

        if (!$this->validate($rules)) {

            return redirect()->back()->withInput();
        }

        $this->inventarisModel->save([
            'id_inv' => $idAutoInventaris,
            'id_jns_barang' => $jenisBarang,
            'kode_barcode' => $timeForBarcode,
            'nama_barang' => $namaBarang,
            'merk' => $this->request->getVar('merk'),
            'serial_number' => $this->request->getVar('serial_number'),
            'lokasi' => $this->request->getVar('lokasi'),
            'kondisi' => $this->request->getVar('kondisi'),
            'status' => $this->request->getVar('status'),
            'thn_pengadaan' => $this->request->getVar('tahun_pengadaan')

        ]);


        session()->setFlashdata('pesan', 'Berhasil,input inventaris ' . $namaBarang);
        return redirect()->to('inventaris');
    }
    public function update($idInv)
    {

        $rules = [
            'nama_barang' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'nama barang harus di isi.'

                ]
            ],

        ];


     
        $namaBarang = $this->request->getVar('nama_barang');
        $jenisBarang = $this->request->getVar('jenis_barang');

        if (!$this->validate($rules)) {

            return redirect()->back()->withInput();
        }

        $this->inventarisModel->save([
            'id_inv' => $idInv,
            'id_jns_barang' => $jenisBarang,
            'nama_barang' => $namaBarang,
            'merk' => $this->request->getVar('merk'),
            'serial_number' => $this->request->getVar('serial_number'),
            'lokasi' => $this->request->getVar('lokasi'),
            'kondisi' => $this->request->getVar('kondisi'),
            'status' => $this->request->getVar('status'),
            'thn_pengadaan' => $this->request->getVar('tahun_pengadaan')

        ]);


        session()->setFlashdata('pesan', 'Berhasil,Update inventaris ' . $namaBarang);
        return redirect()->to('inventaris');
    }


    public function delete($id)
    {
        $this->inventarisModel->delete($id);
        return redirect()->to('inventaris');
    }
}
