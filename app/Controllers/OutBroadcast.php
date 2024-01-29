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

    public function __construct(){
        $this->outBroadcast= new OutBroadcastModel();
        $this->allUser= new UsersModel();
        $this->pinjamAlatModel=new PeminjamanAlatModel();
        $this->crewOb= new CrewObModel();
        $this->parentAlatOb= new ParentAlatObModel();
    }
    public function index()
    {
        // dd()
        $data=[
            'allShowOutBroadcast'=> $this->outBroadcast->procedureGetAllShowOutBroadcast()
        ];
        return view('out-broadcast/index',$data);
    }
    public function create()
    {
        $dataInv = $this->pinjamAlatModel->procedureGetItemsReady();
        $generator = new BarcodeGeneratorPNG();
        $data= [
            'title'=> 'Input Out Broadcast',
            'allDataUsers'=> $this->allUser->proceduregetAllShowUser(),
            'allDataInv' => $dataInv,
            'generator' => $generator,

        ];

        return view('out-broadcast/create',$data);
        
    }
    public function save()
    {

        $converttgl = $this->request->getVar('tanggalOB');
        $convertSampaiDengan = $this->request->getVar('sampai_denganOB');
        $date = str_replace('/', '-', $converttgl);
        $dateSampaiDengan = str_replace('/', '-', $convertSampaiDengan);
        $tanggalconvert = date('Y-m-d', strtotime($date));
        $tanggalconvertSampaiDengan = date('Y-m-d', strtotime($dateSampaiDengan));

        
        // dd($this->validate($rules));
        $this->pinjamAlatModel->save([
            'kategori'=>$this->request->getVar('kategori'),
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
        $nama = $this->request->getVar('nama');
        $nip = $this->request->getVar('nip');
        $jumlahDataInput = count($nama);
        for ($i = 0; $i < $jumlahDataInput; $i++) {
            $this->crewOb->save([
                'id_ob' => $nama[$i],
                'id_users' => $nip[$i]
            ]);
        }
        //end crew ob
        session()->setFlashdata('pesan', 'Berhasil,input peminjaman ID ');
        return redirect()->to('peminjaman-alat');
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
