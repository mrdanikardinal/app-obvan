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

use App\Models\CrewDinasShiftingModel;
use App\Models\UsersModel;
use App\Models\InventarisModel;
use App\Models\CrewObModel;
use App\Models\PeminjamanAlatModel;

class Home extends BaseController

{
    protected $countUserModel;
    protected $countInventarisModel;
    protected $crewObByIdUserModel;
    protected $countPeminjamanAlatModel;
    protected $countCrewDinasShiftingDanLembur;

    public function __construct()
    {
        $this->countUserModel= new UsersModel();
        $this->countInventarisModel= new InventarisModel();
        $this->crewObByIdUserModel= new CrewObModel();
        $this->countPeminjamanAlatModel= new PeminjamanAlatModel();
        $this->countCrewDinasShiftingDanLembur= new CrewDinasShiftingModel();
    }
    public function index(){
        return view('home');

    }

    // public function index(): string
    // {
   
    //     $countUser= $this->countUserModel->getCountUsers();
    //     $countInv= $this->countInventarisModel->getCountInventaris();
    //     $countCrewObByIdUser= $this->crewObByIdUserModel->getCountOutBroadcastByUser();
    //     $countPemberiPinjam= $this->countPeminjamanAlatModel->getCountPemberiPinjam();
    //     $countPenerimaPinjam= $this->countPeminjamanAlatModel->getCountPenerimaPinjam();
    //     $countAllPeminjamanAlat=$countPemberiPinjam+$countPenerimaPinjam;
    //     $countDinasShifting=$this->countCrewDinasShiftingDanLembur->getCountDinasShifting(user_id());
    //     $countDinasLembur=$this->countCrewDinasShiftingDanLembur->getCountDinasLembur(user_id());
    //     $data = [
    //         'countAllUsers'=>$countUser,
    //         'countAllInv'=>$countInv,
    //         'countAllCrewObById'=>$countCrewObByIdUser,
    //         'countAllPeminjamanAlat'=>$countAllPeminjamanAlat,
    //         'countAllDinasShifting'=>$countDinasShifting,
    //         'countAllDinasLembur'=>$countDinasLembur,
    //         // 'countAllPemberiPinjamByUser'=>$countPemberiPinjam,
    //         // 'countAllPenerimaPinjamByUser'=>$countPenerimaPinjam,
    //     ];
    //     return view('dashboard',$data);
    // }
    public function dashboard()
    {
        $countUser= $this->countUserModel->getCountUsers();
        $countInv= $this->countInventarisModel->getCountInventaris();
        $countCrewObByIdUser= $this->crewObByIdUserModel->getCountOutBroadcastByUser();
        $countPemberiPinjam= $this->countPeminjamanAlatModel->getCountPemberiPinjam();
        $countPenerimaPinjam= $this->countPeminjamanAlatModel->getCountPenerimaPinjam();
        $countAllPeminjamanAlat=$countPemberiPinjam+$countPenerimaPinjam;
        $countDinasShifting=$this->countCrewDinasShiftingDanLembur->getCountDinasShifting(user_id());
        $countDinasLembur=$this->countCrewDinasShiftingDanLembur->getCountDinasLembur(user_id());
        $data = [
            'countAllUsers'=>$countUser,
            'countAllInv'=>$countInv,
            'countAllCrewObById'=>$countCrewObByIdUser,
            'countAllPeminjamanAlat'=>$countAllPeminjamanAlat,
            'countAllDinasShifting'=>$countDinasShifting,
            'countAllDinasLembur'=>$countDinasLembur,
            // 'countAllPemberiPinjamByUser'=>$countPemberiPinjam,
            // 'countAllPenerimaPinjamByUser'=>$countPenerimaPinjam,
        ];
        return view('dashboard',$data);
    }

  
  
}
