<?php

namespace App\Controllers;

use App\Models\InventarisModel;
use App\Models\JenisBarangModel;
use App\Models\KondisiModel;
use App\Models\LokasiModel;
use App\Models\StatusModel;
use Picqer\Barcode\BarcodeGeneratorPNG;


class Inventaris extends BaseController
{
    protected $inventarisModel;
    protected $jnsBarang;
    protected $status;
    protected $kondisi;
    protected $lokasi;


    public function __construct()
    {
        $this->inventarisModel = new InventarisModel();
        $this->jnsBarang = new JenisBarangModel();
        $this->status = new StatusModel();
        $this->kondisi = new KondisiModel();
        $this->lokasi = new LokasiModel();

    }
    public function index()
    {
        
        // $dataJoins2= $this->inventarisModel->getJoinsInvID('INV-000000002');
        // dd($dataJoins2);

        $dataJoins= $this->inventarisModel->getInventarisJoins();
        $generator = new BarcodeGeneratorPNG();

        $data = [
            'generator' => $generator,
            'dataJoins'=> $dataJoins,
            'title'=> ' Tambah Tabel Inventaris'
      
        ];
        return view('admin/inventaris/index', $data);

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
        $data['allLokasi'] = $this->lokasi->getLokasi();
        $data['allKondisi'] = $this->kondisi->getKondisi();
        $data['allStatus'] = $this->status->getStatus();
        $data['title'] = 'Tabel Update Inventaris';
        // dd($data['title']);
           
        return view('admin/inventaris/edit', $data);
    }

    public function create()
    {
        session();
        $dataJenisBarang= $this->jnsBarang->getJenisBarang();
        $allStatus = $this->status->getStatus();
        $allKondisi = $this->kondisi->getKondisi();
        $allLokasi = $this->lokasi->getLokasi();
        $data = [
            'title' => 'Form Tambah Data Inventaris',
            'validation' => \Config\Services::validation(),
            'jenisBarang'=> $dataJenisBarang,
            'allStatus'=> $allStatus,
            'allKondisi'=> $allKondisi,
            'allLokasi'=> $allLokasi
        ];

        return view('admin/inventaris/create', $data);
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
        $varSerialNumber=$this->request->getVar('serial_number');
        $timeForBarcode = time();

        if (!$this->validate($rules)) {

            return redirect()->back()->withInput();
        }
        if($varSerialNumber==NULL){
            $this->inventarisModel->save([
                'id_inv' => $idAutoInventaris,
                'id_jns_barang' => $jenisBarang,
                'kode_barcode' => $timeForBarcode,
                'nama_barang' => $namaBarang,
                'merk' => $this->request->getVar('merk'),
                'serial_number' =>$timeForBarcode,
                'id_lokasi' => $this->request->getVar('lokasi'),
                'id_kondisi' => $this->request->getVar('kondisi'),
                'id_status' => $this->request->getVar('status'),
                'thn_pengadaan' => $this->request->getVar('tahun_pengadaan')
    
            ]);
        }else if($varSerialNumber!=NULL){
            $this->inventarisModel->save([
                'id_inv' => $idAutoInventaris,
                'id_jns_barang' => $jenisBarang,
                'kode_barcode' => $timeForBarcode,
                'nama_barang' => $namaBarang,
                'merk' => $this->request->getVar('merk'),
                'serial_number' =>$varSerialNumber,
                'id_lokasi' => $this->request->getVar('lokasi'),
                'id_kondisi' => $this->request->getVar('kondisi'),
                'id_status' => $this->request->getVar('status'),
                'thn_pengadaan' => $this->request->getVar('tahun_pengadaan')
    
            ]);

        }

    


        session()->setFlashdata('pesan', 'Berhasil,input inventaris ' . $namaBarang);
        return redirect()->to('admin/inventaris');
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
            'id_lokasi' => $this->request->getVar('lokasi'),
            'id_kondisi' => $this->request->getVar('kondisi'),
            'id_status' => $this->request->getVar('status'),
            'thn_pengadaan' => $this->request->getVar('tahun_pengadaan')

        ]);


        session()->setFlashdata('pesan', 'Berhasil,Update inventaris ' . $namaBarang);
        return redirect()->to('admin/inventaris');
    }


    public function delete($id)
    {
        $this->inventarisModel->delete($id);
        return redirect()->to('admin/inventaris');
    }
}
