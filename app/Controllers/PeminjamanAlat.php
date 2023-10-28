<?php

namespace App\Controllers;

use App\Models\PeminjamanAlatModel;
use App\Models\ParentMerkModel;

class PeminjamanAlat extends BaseController
{
    protected $helpers = ['form'];
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
            'parentMerk' => $this->parentMerkModel->getParentMerk()
        ];
        return view('peminjaman-alat/display', $data);
    }
    public function create()
    {

        $data = [
            'title' => 'Form Tambah Data Peminjaman Alat',

        ];

        return view('peminjaman-alat/create', $data);
    }
    public function save()
    {
        $idAutoPeminjamanAlat = $this->pinjamAlatModel->autoNumberId();
        $converttgl = $this->request->getVar('tanggal');
        $convertSampaiDengan = $this->request->getVar('sampai_dengan');
        $date = str_replace('/', '-', $converttgl);
        $dateSampaiDengan = str_replace('/', '-', $convertSampaiDengan);
        $tanggalconvert = date('Y-m-d', strtotime($date));
        $tanggalconvertSampaiDengan = date('Y-m-d', strtotime($dateSampaiDengan));

        $this->pinjamAlatModel->save([
            'id_pinjam' => $idAutoPeminjamanAlat,
            'tanggal' => $tanggalconvert,
            'sampai_dengan'=>$tanggalconvertSampaiDengan,
            'acara' => $this->request->getVar('acara'),
            'tempat' => $this->request->getVar('tempat'),
            'durasi_pinjam' => $this->request->getVar('durasi_pinjam'),
            'nama_peminjam' => $this->request->getVar('nama_peminjam'),
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
        session()->setFlashdata('pesan', $jumlahDataInput . ' Data ' . $idAutoPeminjamanAlat . ', Berhasil Ditambahkan.');
        return redirect()->to('peminjaman-alat/display');
    }
    public function edit($id_pinjam)
    {

        $data = [
            'dataPinjam' => $this->pinjamAlatModel->getPeminjamanAlat($id_pinjam),
            'allDataParentMerk' => $this->parentMerkModel->getParentViews($id_pinjam)

        ];

        return view('peminjaman-alat/edit', $data);
    }
    public function update($id_pinjam)
    {
        // $idAutoPeminjamanAlat = $this->pinjamAlatModel->autoNumberId();
        $converttglEdit = $this->request->getVar('tanggal');
        $dateEdit = str_replace('/', '-', $converttglEdit);
        $tanggalconvertEdit = date('Y-m-d', strtotime($dateEdit));



        $this->pinjamAlatModel->save([
            'id_pinjam' => $id_pinjam,
            'tanggal' => $tanggalconvertEdit,
            'acara' => $this->request->getVar('acara'),
            'tempat' => $this->request->getVar('tempat'),
            'durasi_pinjam' => $this->request->getVar('durasi_pinjam'),
            'nama_peminjam' => $this->request->getVar('nama_peminjam'),
            'nama_pemberi' => $this->request->getVar('nama_pemberi')
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

        $jmlDataLama = count($namaBarang);
        if (!isset($namaBarangUpdate)) {
            session()->setFlashdata('pesan', $jmlDataLama . ' barang dari kode pinjam ' . $id_pinjam . ', Berhasil Diupdate.');
        } else if (isset($namaBarangUpdate)) {
            $jmlDataBaru = count($namaBarangUpdate);
            $jmlSeluruh = $jmlDataLama + $jmlDataBaru;
            session()->setFlashdata('pesan', 'Terdeteksi '.$jmlDataBaru.' barang baru ditambahakan, dan '.$jmlDataLama.' barang lama berhasil diupdate, total barang kode pinjam '.$id_pinjam.' adalah '.$jmlSeluruh.' ');
        }


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
