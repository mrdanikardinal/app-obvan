<?php

/**
 * 2.Fitur Crew OB CRUD
 * 3.Fitur Print Surat Tugas
 * 4.Fitur Kas OBVAN
 * 5.Upload Foto
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */

namespace App\Controllers;

use App\Models\CrewObModel;
use App\Models\KategoriObModel;
use App\Models\OutBroadcastModel;
use App\Models\ParentAlatObModel;
use App\Models\PeminjamanAlatModel;
use App\Models\UsersModel;
use App\Models\InventarisModel;
use Picqer\Barcode\BarcodeGeneratorPNG;

class OutBroadcast extends BaseController
{
    protected $outBroadcast;
    protected $allUser;
    protected $pinjamAlatModel;
    protected $crewOb;
    protected $parentAlatOb;
    protected $kategoriOb;
    protected $inventaris;

    public function __construct()
    {
        $this->outBroadcast = new OutBroadcastModel();
        $this->allUser = new UsersModel();
        $this->pinjamAlatModel = new PeminjamanAlatModel();
        $this->crewOb = new CrewObModel();
        $this->parentAlatOb = new ParentAlatObModel();
        $this->kategoriOb = new KategoriObModel();
        $this->inventaris = new InventarisModel();
    }

    public function index()
    {
        // dd($this->outBroadcast->getOBJointKategori());

        $data = [
            // 'allShowOutBroadcast' => $this->outBroadcast->procedureGetAllShowOutBroadcast(),
            'showAllJoinsOBKategori' => $this->outBroadcast->getOBJointKategori(),
            'allDataOutBroadcast' => $this->crewOb->getIdOutBroadcast(),
            'allUsers' => $this->allUser->getUsers(),
            "allAlatOB" => $this->parentAlatOb->getIdParentAlatOB(),
            'allInventaris' => $this->inventaris->getInventaris()
        ];
        return view('out-broadcast/index', $data);
    }
    public function create()
    {
        $allKategori = $this->kategoriOb->getKategori();
        $dataInv = $this->pinjamAlatModel->procedureGetItemsReady();
        $generator = new BarcodeGeneratorPNG();
        $data = [
            'title' => 'Input Out Broadcast',
            'allDataUsers' => $this->allUser->proceduregetAllShowUser(),
            'allDataInv' => $dataInv,
            'generator' => $generator,
            'allKategori' => $allKategori

        ];

        return view('out-broadcast/create', $data);
    }
    public function save()
    {


        $idAutoOutBroadcast = $this->outBroadcast->autoNumberIdOb();
        $converttgl = $this->request->getVar('tanggalOB');
        $convertSampaiDengan = $this->request->getVar('sampai_denganOB');
        $date = str_replace('/', '-', $converttgl);
        $dateSampaiDengan = str_replace('/', '-', $convertSampaiDengan);
        $tanggalconvert = date('Y-m-d', strtotime($date));
        $tanggalconvertSampaiDengan = date('Y-m-d', strtotime($dateSampaiDengan));
        $this->outBroadcast->save([
            'id_ob' => $idAutoOutBroadcast,
            'id_kategori' => $this->request->getVar('kategori'),
            'tanggal' => $tanggalconvert,
            'sampai_dengan' => $tanggalconvertSampaiDengan,
            'acara' => $this->request->getVar('acara_ob'),
            'lokasi' => $this->request->getVar('lokasi_ob'),
            'durasi' => $this->request->getVar('durasi_ob'),
            'tp' => $this->request->getVar('tp_ob'),
            'td' => $this->request->getVar('td_ob'),
            'ass_td' => $this->request->getVar('asst_td'),
            'um' => $this->request->getVar('um_ob')
        ]);
        $idUser = $this->request->getVar('id_user');
        $jumlahDataInput = count($idUser);
        for ($i = 0; $i < $jumlahDataInput; $i++) {

            $this->crewOb->save([
                'id_ob' => $idAutoOutBroadcast,
                'id_users' => $idUser[$i]
            ]);
        }
        //end crew ob
        //start peralatan ob
        $idPeralatan = $this->request->getVar('id_peralatan');
        $jumlahAlat = $this->request->getVar('jumlahAlatOB');
        $jumlahDataInputPeralatan = count($idPeralatan);
        for ($j = 0; $j < $jumlahDataInputPeralatan; $j++) {
            $this->parentAlatOb->save([
                'id_ob' => $idAutoOutBroadcast,
                'id_inv' => $idPeralatan[$j],
                'jumlah' => $jumlahAlat[$j]
            ]);
        }
        //end peralatan ob


        session()->setFlashdata('pesan', 'Berhasil,input peminjaman ID ' . $idAutoOutBroadcast);
        return redirect()->to('out-broadcast');
    }

    public function edit($idOb)
    {
        // $allKategori = $this->kategoriOb->getKategori();
        // dd($allKategori);

        // $allKategori = $this->kategoriOb->getKategori();
        // $dataInv = $this->pinjamAlatModel->procedureGetItemsReady();
        // $generator = new BarcodeGeneratorPNG();

        // $data['showObByid'] = $this->outBroadcast->procedureGetShowOutBroadcastByID($idOb);
        $data['showObByid'] = $this->outBroadcast->getShowOutBroadcast($idOb);
        $data['showDataCrewJoinUsers'] = $this->outBroadcast->procedureGetShowCrewObJoinUser($idOb);
        $data['showDataAlatJoinInv'] = $this->outBroadcast->procedureGetShowAlatJoinInv($idOb);
        $data['allKategori'] = $this->kategoriOb->getKategori();
        $data['generator'] = new BarcodeGeneratorPNG();
        $data['title'] = 'Update Out Broadcast';
        $data['allDataUsers'] = $this->allUser->proceduregetAllShowUser();
        $data['allDataInv'] = $this->pinjamAlatModel->procedureGetItemsReady();


        return view('out-broadcast/edit', $data);
    }
    public function update($idOb)
    {


        $converttgl = $this->request->getVar('tanggalOB');
        $convertSampaiDengan = $this->request->getVar('sampai_denganOB');
        $date = str_replace('/', '-', $converttgl);
        $dateSampaiDengan = str_replace('/', '-', $convertSampaiDengan);
        $tanggalconvert = date('Y-m-d', strtotime($date));
        $tanggalconvertSampaiDengan = date('Y-m-d', strtotime($dateSampaiDengan));
        $this->outBroadcast->save([
            'id_ob' => $idOb,
            'id_kategori' => $this->request->getVar('kategori'),
            'tanggal' => $tanggalconvert,
            'sampai_dengan' => $tanggalconvertSampaiDengan,
            'acara' => $this->request->getVar('acara_ob'),
            'lokasi' => $this->request->getVar('lokasi_ob'),
            'durasi' => $this->request->getVar('durasi_ob'),
            'tp' => $this->request->getVar('tp_ob'),
            'td' => $this->request->getVar('td_ob'),
            'ass_td' => $this->request->getVar('asst_td'),
            'um' => $this->request->getVar('um_ob')
        ]);
        //start edit crew ob
        $idDinasCrewObOld = $this->request->getVar('id_dinas_crew_ob');
        $idUserSelectModal = $this->request->getVar('idUserFromSelectModal');
        $idUserSelectModalUpdate = $this->request->getVar('idUserFromSelectModalUpdate');
        $namaEdit = $this->request->getVar('namaEdit');
        $namaEditUpdate = $this->request->getVar('namaEditUpdate');
        //update data lama crew dinas ob
        if (!isset($namaEditUpdate)) {
            $jumlahData = count($namaEdit);
            for ($i = 0; $i < $jumlahData; $i++) {
                $this->crewOb->save([
                    'id_crew_ob' => $idDinasCrewObOld[$i],
                    'id_users' => $idUserSelectModal[$i]
                ]);
            }
        }
        //update data baru crew dinas ob
        else if (isset($namaEditUpdate)) {
            $jumlahDataUpdate = count($namaEditUpdate);
            for ($j = 0; $j < $jumlahDataUpdate; $j++) {
                $this->crewOb->save([
                    'id_ob' => $idOb,
                    'id_users' => $idUserSelectModalUpdate[$j]
                ]);
            }
            //fungsi untuk update data yang sudah ada
            if (isset($namaEdit)) {
                $jumlahData = count($namaEdit);
                for ($k = 0; $k < $jumlahData; $k++) {

                    $this->crewOb->save([
                        'id_crew_ob' => $idDinasCrewObOld[$k],
                        'id_users' => $idUserSelectModal[$k]
                    ]);
                }
            }
        }

        //end edit crew ob

        //update Alat OB
        $idBarangInvOld = $this->request->getVar('id_ob_from_alat');
        $idBarangSelectModal = $this->request->getVar('idBarangFromSelectModal');
        $idBarangSelectModalUpdate = $this->request->getVar('idBarangFromSelectModalUpdate');
        $namaBarangEdit = $this->request->getVar('naBar');
        $namaBarangUpdate = $this->request->getVar('naBarUpdate');
        $jumlahBarangEdit = $this->request->getVar('jumlahAlatOB');
        $jumlahBarangEditUpdate = $this->request->getVar('jumlahAlatOBUpdate');

        if (!isset($namaBarangUpdate)) {
            $jumlahDataInvUpdate = count($namaBarangEdit);
            for ($i = 0; $i < $jumlahDataInvUpdate; $i++) {
                $this->parentAlatOb->save([
                    'id_parent_alat_ob' => $idBarangInvOld[$i],
                    'id_inv' => $idBarangSelectModal[$i],
                    'jumlah' => $jumlahBarangEdit[$i]
                ]);
            }
        }
        //update data baru barang inv
        else if (isset($namaBarangUpdate)) {
            $jumlahDataUpdate = count($namaBarangUpdate);
            for ($j = 0; $j < $jumlahDataUpdate; $j++) {
                $this->parentAlatOb->save([
                    'id_ob' => $idOb,
                    'id_inv' => $idBarangSelectModalUpdate[$j],
                    'jumlah' => $jumlahBarangEditUpdate[$j]

                ]);
            }

              //fungsi untuk update data yang sudah ada
              if (isset($namaBarangEdit)) {
                $jumlahData = count($namaBarangEdit);
                for ($k = 0; $k < $jumlahData; $k++) {

                    $this->parentAlatOb->save([
                        'id_parent_alat_ob' => $idBarangInvOld[$k],
                        'id_inv' => $idBarangSelectModal[$k],
                        'jumlah' => $jumlahBarangEdit[$k]
                    ]);
                }
            }
        }

        //End update Alat OB





        session()->setFlashdata('pesan', 'Berhasil,Update out broadcast ID ' . $idOb);
        return redirect()->to('out-broadcast');










        // $converttglEdit = $this->request->getVar('tanggal');
        // $convertSampaiDenganEdit = $this->request->getVar('sampai_dengan');
        // $convertTanggalKembali = $this->request->getVar('tanggal_kembali');
        // $varTesting = null;
        // if ($convertTanggalKembali != NULL) {
        //     $dateTanggalKembali = str_replace('/', '-', $convertTanggalKembali);
        //     $tanggalconvertTanggalKembali = date('Y-m-d', strtotime($dateTanggalKembali));
        //     $varTesting = $tanggalconvertTanggalKembali;
        // }

        // $dateEdit = str_replace('/', '-', $converttglEdit);
        // $dateSampaiDenganEdit = str_replace('/', '-', $convertSampaiDenganEdit);

        // $tanggalconvertEdit = date('Y-m-d', strtotime($dateEdit));
        // $tanggalconvertSampaiDenganEdit = date('Y-m-d', strtotime($dateSampaiDenganEdit));

        // $this->pinjamAlatModel->save([
        //     'id_pinjam' => $id_pinjam,
        //     'tanggal' => $tanggalconvertEdit,
        //     'sampai_dengan' => $tanggalconvertSampaiDenganEdit,
        //     'acara' => $this->request->getVar('acara'),
        //     'tempat' => $this->request->getVar('tempat'),
        //     'durasi_pinjam' => $this->request->getVar('durasi_pinjam'),
        //     'nama_peminjam' => $this->request->getVar('nama_peminjam'),
        //     'no_hp_peminjam' => $this->request->getVar('noHPPeminjam'),
        //     'nama_pemberi' => $this->request->getVar('nama_pemberi'),
        //     'tanggal_kembali' => $varTesting,
        //     'nama_penerima' => $this->request->getVar('nama_penerima'),
        //     'catatan' => $this->request->getVar('catatan')
        // ]);

        // $idParent = $this->request->getVar('idParentMerk');
        // $namaBarang = $this->request->getVar('naBarEdit');
        // $merk = $this->request->getVar('merkEdit');
        // $serialNumber = $this->request->getVar('sNEdit');
        // $jumlah = $this->request->getVar('jumlahEdit');
        // $checkAlat = $this->request->getVar('checkAlat');

        // //    dd($checkAlat);

        // //updateAdd
        // $namaBarangUpdate = $this->request->getVar('naBarEditUpdate');
        // $merkUpdate = $this->request->getVar('merkEditUpdate');
        // $serialNumberUpdate = $this->request->getVar('sNEditUpdate');
        // $jumlahUpdate = $this->request->getVar('jumlahEditUpdate');


        // //update data lama parent merk
        // if (!isset($namaBarangUpdate)) {
        //     $jumlahData = count($namaBarang);

        //     for ($i = 0; $i < $jumlahData; $i++) {
        //         $this->parentMerkModel->save([
        //             'id' => $idParent[$i],
        //             // 'id_pinjaman_alat' => $idAutoPeminjamanAlat,
        //             'nama_barang' => $namaBarang[$i],
        //             'merk' => $merk[$i],
        //             'serial_number' => $serialNumber[$i],
        //             'jumlah' => $jumlah[$i],
        //             'status' => $checkAlat[$i]
        //         ]);
        //     }

        //     // session()->setFlashdata('pesan',$jumlahData.' Data '.$id_pinjam.', Berhasil Diupdate.');

        //     // insert data baru parent merk
        // } else if (isset($namaBarangUpdate)) {
        //     $jumlahDataUpdate = count($namaBarangUpdate);
        //     for ($j = 0; $j < $jumlahDataUpdate; $j++) {

        //         $this->parentMerkModel->save([
        //             'id_pinjaman_alat' => $id_pinjam,
        //             'nama_barang' => $namaBarangUpdate[$j],
        //             'merk' => $merkUpdate[$j],
        //             'serial_number' => $serialNumberUpdate[$j],
        //             'jumlah' => $jumlahUpdate[$j]

        //         ]);
        //     }
        //     //fungsi untuk update data yang sudah ada
        //     if (isset($namaBarang)) {
        //         $jumlahData = count($namaBarang);
        //         for ($i = 0; $i < $jumlahData; $i++) {


        //             $this->parentMerkModel->save([
        //                 'id' => $idParent[$i],
        //                 // 'id_pinjaman_alat' => $idAutoPeminjamanAlat,
        //                 'nama_barang' => $namaBarang[$i],
        //                 'merk' => $merk[$i],
        //                 'serial_number' => $serialNumber[$i],
        //                 'jumlah' => $jumlah[$i],
        //                 'status' => $checkAlat[$i]



        //             ]);
        //         }
        //     }
        // }
        // session()->setFlashdata('pesan', 'Berhasil,update peminjaman ID ' . $id_pinjam);
        // return redirect()->to('peminjaman-alat');


    }
    public function delete($id)
    {
        session();
        $this->pinjamAlatModel->delete($id);
        session()->setFlashdata('pesanHapus', 'Berhasil hapus out broadcast ID ' . $id);
        $this->outBroadcast->delete($id);
        return redirect()->to('out-broadcast');
    }

    public function peralatancrewob($idOB)
    {
        // $data =$this->parentAlatOb->getJoinOBAndAlatINV($idOB);
        // $data =$this->parentAlatOb->getCountAlatOB($idOB);
        // dd($data);

        $data = [
            'allDataCrewOB' => $this->parentAlatOb->getJoinOBAndAlatINV($idOB),
            'countDataCrewOB' => $this->parentAlatOb->getCountAlatOB($idOB)
        ];
        return view('peralatan-crew-ob/index', $data);
    }


    public function hapus($idCrewDinas)
    {
        session();
        session()->setFlashdata('pesanHapus', 'Berhasil hapus crew out broadcast');
        return $this->crewOb->delete($idCrewDinas);
    }
    public function hapusinv($idBarangInv)
    {
        session();
        session()->setFlashdata('pesanHapus', 'Berhasil hapus barang out broadcast ');
        return $this->parentAlatOb->delete($idBarangInv);
    }
}
