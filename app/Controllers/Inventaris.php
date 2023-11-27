<?php

namespace App\Controllers;

use App\Models\InventarisModel;
use Picqer\Barcode\BarcodeGeneratorPNG;


class Inventaris extends BaseController
{
    protected $inventarisModel;


    public function __construct()
    {
        $this->inventarisModel = new InventarisModel();
    }
    public function index()
    {
        $data = [
            'allInventaris' => $this->inventarisModel->getInventaris()
        ];
        return view('inventaris/index', $data);
    }

    public function create()
    {
        session();


        $data = [
            'title' => 'Form Tambah Data Inventaris',
            'validation' => \Config\Services::validation(),
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

        if (!$this->validate($rules)) {

            return redirect()->back()->withInput();
        }


        // dd($this->validate($rules));
        $cetakBarcode = new BarcodeGeneratorPNG();
        // $test = base64_encode($cetakBarcode->getBarcode('081231723897', $cetakBarcode::TYPE_CODE_128));
        



        $this->inventarisModel->save([
            'id_inv' => $idAutoInventaris,
            'nama_barang' => $this->request->getVar('nama_barang'),
            'merk' => $this->request->getVar('merk'),
            'serial_number' => $this->request->getVar('serial_number'),
            'jumlah' => $this->request->getVar('jumlah'),
            'thn_pengadaan' => $this->request->getVar('tahun_pengadaan')

        ]);


        session()->setFlashdata('pesan', 'Berhasil,input peminjaman ID ' . $idAutoInventaris);
        return redirect()->to('inventaris');
    }
}
