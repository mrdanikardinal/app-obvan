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
use Picqer\Barcode\BarcodeGeneratorPNG;

class OutBroadcast extends BaseController
{
    protected $outBroadcast;
    protected $allUser;
    protected $pinjamAlatModel;
    protected $crewOb;
    protected $parentAlatOb;
    protected $kategoriOb;

    public function __construct()
    {
        $this->outBroadcast = new OutBroadcastModel();
        $this->allUser = new UsersModel();
        $this->pinjamAlatModel = new PeminjamanAlatModel();
        $this->crewOb = new CrewObModel();
        $this->parentAlatOb = new ParentAlatObModel();
        $this->kategoriOb = new KategoriObModel();
    }
    public function index()
    {
        // dd($this->outBroadcast->getOBJointKategori());
        $data = [
            // 'allShowOutBroadcast' => $this->outBroadcast->procedureGetAllShowOutBroadcast(),
            'showAllJoinsOBKategori'=> $this->outBroadcast->getOBJointKategori()
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
        //start crew ob
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
        $jumlahDataInputPeralatan = count($idPeralatan);
        for ($j = 0; $j < $jumlahDataInputPeralatan; $j++) {
            $this->parentAlatOb->save([
                'id_ob' => $idAutoOutBroadcast,
                'id_inv' => $idPeralatan[$j]
            ]);
        }
        //end peralatan ob


        session()->setFlashdata('pesan', 'Berhasil,input peminjaman ID ' . $idAutoOutBroadcast);
        return redirect()->to('out-broadcast');
    }

    public function edit()
    {
    }
    public function update()
    {
    }
    public function delete($id)
    {
        $this->outBroadcast->delete($id);
        return redirect()->to('out-broadcast');
    }
}
