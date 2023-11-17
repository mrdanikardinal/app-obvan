<?php

namespace App\Controllers;

use App\Models\PeminjamanAlatModel;
use App\Models\ParentMerkModel;

class PeminjamanAlat extends BaseController
{
    protected $helpers = (['form']);
    protected $pinjamAlatModel;
    protected $parentMerkModel;



    public function __construct()
    {
        $this->pinjamAlatModel = new PeminjamanAlatModel();
        $this->parentMerkModel = new ParentMerkModel();
    }
    public function index()
    {
        $data = [
            'checkStatus' => $this->parentMerkModel->getCheckDone(),
            'peminjaman' => $this->pinjamAlatModel->getPeminjamanAlat(),
            'parentMerk' => $this->parentMerkModel->getParentMerk(),


        ];
        return view('peminjaman-alat/display', $data);
    }
    public function create()
    {
        session();
        $data = [
            'title' => 'Form Tambah Data Peminjaman Alat',
            'validation' => \Config\Services::validation()

        ];

        return view('peminjaman-alat/create', $data);
    }
    public function save()
    {
  
        $rules = [
            'noHPPeminjam' => [
                'rules'  => 'required|numeric',
                'errors' => [
                    'required' => 'no hp harus di isi.',
                    'numeric' => 'isi harus angka'
                ]
            ],
           
        ];

        $idAutoPeminjamanAlat = $this->pinjamAlatModel->autoNumberId();
        $converttgl = $this->request->getVar('tanggal');
        $convertSampaiDengan = $this->request->getVar('sampai_dengan');
        $date = str_replace('/', '-', $converttgl);
        $dateSampaiDengan = str_replace('/', '-', $convertSampaiDengan);
        $tanggalconvert = date('Y-m-d', strtotime($date));
        $tanggalconvertSampaiDengan = date('Y-m-d', strtotime($dateSampaiDengan));

        if (!$this->validate($rules)) {
         
            return redirect()->back()->withInput();
           
        }
        // dd($this->validate($rules));
        $this->pinjamAlatModel->save([
            'id_pinjam' => $idAutoPeminjamanAlat,
            'tanggal' => $tanggalconvert,
            'sampai_dengan' => $tanggalconvertSampaiDengan,
            'acara' => $this->request->getVar('acara'),
            'tempat' => $this->request->getVar('tempat'),
            'durasi_pinjam' => $this->request->getVar('durasi_pinjam'),
            'nama_peminjam' => $this->request->getVar('nama_peminjam'),
            'no_hp_peminjam' => $this->request->getVar('noHPPeminjam'),
            'nama_pemberi' => $this->request->getVar('nama_pemberi')
        ]);




        $namaBarangInput = $this->request->getVar('naBar');
        $merkInput = $this->request->getVar('merk');
        $serialNumberInput = $this->request->getVar('sN');
        $jumlahInput = $this->request->getVar('jumlah');
        $jumlahDataInput = count($namaBarangInput);
        for ($i = 0; $i < $jumlahDataInput; $i++) {
            $this->parentMerkModel->save([

                'id_pinjaman_alat' => $idAutoPeminjamanAlat,
                'nama_barang' => $namaBarangInput[$i],
                'merk' => $merkInput[$i],
                'serial_number' => $serialNumberInput[$i],
                'jumlah' => $jumlahInput[$i]

            ]);
        }
        session()->setFlashdata('pesan','Berhasil,input peminjaman ID ' . $idAutoPeminjamanAlat);
        return redirect()->to('peminjaman-alat/display');
    }
    public function edit($id_pinjam)
    {
        session();
        $data = [
            'dataPinjam' => $this->pinjamAlatModel->getPeminjamanAlat($id_pinjam),
            'allDataParentMerk' => $this->parentMerkModel->getParentViews($id_pinjam),
            'validation' => \Config\Services::validation()

        ];

        return view('peminjaman-alat/edit', $data);
    }
    public function update($id_pinjam)
    {
        // $idAutoPeminjamanAlat = $this->pinjamAlatModel->autoNumberId();

        $rules = [
            'noHPPeminjam' => [
                'rules'  => 'required|numeric',
                'errors' => [
                    'required' => 'no hp harus di isi.',
                    'numeric' => 'isi harus angka'
                ]
            ],
           
        ];
        if (!$this->validate($rules)) {
         
            return redirect()->back()->withInput();
           
        }

        $converttglEdit = $this->request->getVar('tanggal');
        $convertSampaiDenganEdit = $this->request->getVar('sampai_dengan');
        $convertTanggalKembali = $this->request->getVar('tanggal_kembali');
        $varTesting = null;
        if ($convertTanggalKembali != NULL) {
            $dateTanggalKembali = str_replace('/', '-', $convertTanggalKembali);
            $tanggalconvertTanggalKembali = date('Y-m-d', strtotime($dateTanggalKembali));
            $varTesting = $tanggalconvertTanggalKembali;
        }

        $dateEdit = str_replace('/', '-', $converttglEdit);
        $dateSampaiDenganEdit = str_replace('/', '-', $convertSampaiDenganEdit);

        $tanggalconvertEdit = date('Y-m-d', strtotime($dateEdit));
        $tanggalconvertSampaiDenganEdit = date('Y-m-d', strtotime($dateSampaiDenganEdit));
        
        $this->pinjamAlatModel->save([
            'id_pinjam' => $id_pinjam,
            'tanggal' => $tanggalconvertEdit,
            'sampai_dengan' => $tanggalconvertSampaiDenganEdit,
            'acara' => $this->request->getVar('acara'),
            'tempat' => $this->request->getVar('tempat'),
            'durasi_pinjam' => $this->request->getVar('durasi_pinjam'),
            'nama_peminjam' => $this->request->getVar('nama_peminjam'),
            'no_hp_peminjam' => $this->request->getVar('noHPPeminjam'),
            'nama_pemberi' => $this->request->getVar('nama_pemberi'),
            'tanggal_kembali' => $varTesting,
            'nama_penerima' => $this->request->getVar('nama_penerima'),
            'catatan' => $this->request->getVar('catatan')
        ]);

        $idParent = $this->request->getVar('idParentMerk');
        $namaBarang = $this->request->getVar('naBarEdit');
        $merk = $this->request->getVar('merkEdit');
        $serialNumber = $this->request->getVar('sNEdit');
        $jumlah = $this->request->getVar('jumlahEdit');
        $checkAlat = $this->request->getVar('checkAlat');

        //    dd($checkAlat);

        //updateAdd
        $namaBarangUpdate = $this->request->getVar('naBarEditUpdate');
        $merkUpdate = $this->request->getVar('merkEditUpdate');
        $serialNumberUpdate = $this->request->getVar('sNEditUpdate');
        $jumlahUpdate = $this->request->getVar('jumlahEditUpdate');


        //update data lama parent merk
        if (!isset($namaBarangUpdate)) {
            $jumlahData = count($namaBarang);

            for ($i = 0; $i < $jumlahData; $i++) {
                $this->parentMerkModel->save([
                    'id' => $idParent[$i],
                    // 'id_pinjaman_alat' => $idAutoPeminjamanAlat,
                    'nama_barang' => $namaBarang[$i],
                    'merk' => $merk[$i],
                    'serial_number' => $serialNumber[$i],
                    'jumlah' => $jumlah[$i],
                    'status' => $checkAlat[$i]
                ]);
            }

            // session()->setFlashdata('pesan',$jumlahData.' Data '.$id_pinjam.', Berhasil Diupdate.');

            // insert data baru parent merk
        } else if (isset($namaBarangUpdate)) {
            $jumlahDataUpdate = count($namaBarangUpdate);
            for ($j = 0; $j < $jumlahDataUpdate; $j++) {

                $this->parentMerkModel->save([


                    'id_pinjaman_alat' => $id_pinjam,
                    'nama_barang' => $namaBarangUpdate[$j],
                    'merk' => $merkUpdate[$j],
                    'serial_number' => $serialNumberUpdate[$j],
                    'jumlah' => $jumlahUpdate[$j]

                ]);
            }
            //fungsi untuk update data yang sudah ada
            if (isset($namaBarang)) {
                $jumlahData = count($namaBarang);
                for ($i = 0; $i < $jumlahData; $i++) {


                    $this->parentMerkModel->save([
                        'id' => $idParent[$i],
                        // 'id_pinjaman_alat' => $idAutoPeminjamanAlat,
                        'nama_barang' => $namaBarang[$i],
                        'merk' => $merk[$i],
                        'serial_number' => $serialNumber[$i],
                        'jumlah' => $jumlah[$i],
                        'status' => $checkAlat[$i]



                    ]);
                }
            }
        }
        session()->setFlashdata('pesan','Berhasil,update peminjaman ID ' . $id_pinjam);
        return redirect()->to('peminjaman-alat/display');
    }
    public function delete($id)
    {
        $this->pinjamAlatModel->delete($id);
        return redirect()->to('peminjaman-alat/display');
    }




    public function hapus($id)
    {
        return $this->parentMerkModel->delete($id);
    }
}
