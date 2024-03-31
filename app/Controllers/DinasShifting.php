<?php

namespace App\Controllers;

use App\Models\AcaraDinasShiftingModel;
use App\Models\CrewDinasShiftingModel;
use App\Models\DinasShiftingModel;
use App\Models\KategoriCrewDinasShiftLemburModel;
use App\Models\UsersModel;
use App\Models\KategoriShiftingModel;


class DinasShifting extends BaseController
{
    protected $allUser;
    protected $allKategoriDinasShif;
    protected $allNamaAcaraShif;
    protected $dinasShifting;
    protected $crewDinasShif;
    protected $allKategoriDinasLembur;
    public function __construct()
    {
        $this->allUser = new UsersModel();
        $this->allKategoriDinasShif = new KategoriShiftingModel();
        $this->allNamaAcaraShif = new AcaraDinasShiftingModel();
        $this->dinasShifting = new DinasShiftingModel();
        $this->crewDinasShif = new CrewDinasShiftingModel();
        $this->allKategoriDinasLembur = new KategoriCrewDinasShiftLemburModel();
    }
    public function index()
    {
        
        $data = [
            'allDataJoinShiftDanJoinNamaAcara' => $this->dinasShifting->getDinasShifJoinJenisShifJoinNamaAcara(),
            'allDataDinasShifting' => $this->crewDinasShif->getIdCrewDinasShifting(),
            'allUsers' => $this->allUser->getUsers()

        ];

        return view("dinas-shifting/index", $data);
    }
    public function create()
    {

        $data = [
            'allKategoriDinasShif' => $this->allKategoriDinasShif->getIdKategoriShifting(),
            'allKategoriDinasShifLembur' => $this->allKategoriDinasLembur->getIdKategoriShiftLembur(),
            'allDataUsers' => $this->allUser->getUsers(),
            'allNamaAcaraShif' => $this->allNamaAcaraShif->getIdNamaAcaraShif(),
            'title' => 'Input Data Dinas Shifting'
        ];

        return view("dinas-shifting/create", $data);
    }
    public function save()
    {

        $idAutoDinasShif = $this->dinasShifting->autoNumberId();

        $converttgl = $this->request->getVar('tanggalDinas');
        $date = str_replace('/', '-', $converttgl);
        $tanggalconvert = date('Y-m-d', strtotime($date));
        // dd($this->request->getVar('kategoriDinasShif'));

        $this->dinasShifting->save([
            'id_dinas_shifting' => $idAutoDinasShif,
            'id_kategori_dinas_crew' => $this->request->getVar('kategoriDinasCrewDinas'),
            'id_kategori_dinas_shif' => $this->request->getVar('kategoriDinasShif'),
            'tanggal' => $tanggalconvert,
            'id_acara' => $this->request->getVar('namaAcaraDinasShif'),
            'lokasi' => $this->request->getVar('lokasiDinasShif')
        ]);

        $idUser = $this->request->getVar('id_user');
        $jumlahDataInput = count($idUser);
        for ($i = 0; $i < $jumlahDataInput; $i++) {

            $this->crewDinasShif->save([
                'id_dinas_shif' => $idAutoDinasShif,
                'id_users' => $idUser[$i]
            ]);
        }

        session()->setFlashdata('pesan', 'Berhasil,input dinas shifting ID ' . $idAutoDinasShif);
        return redirect()->to('dinas-shifting');
    }

    public function delete($id)
    {
        session();
        $this->crewDinasShif->delete($id);
        session()->setFlashdata('pesanHapus', 'Berhasil hapus dinas shifting ID ' . $id);
        $this->dinasShifting->delete($id);
        return redirect()->to('dinas-shifting');
    }
    public function hapusdinasshift($idCrewDinasShift)
    {
        session();
        session()->setFlashdata('pesanHapus', 'Berhasil hapus crew dinas shifting ');
        return $this->crewDinasShif->delete($idCrewDinasShift);
    }

    public function update($idDinasShifting)
    {
        $converttgl = $this->request->getVar('tanggalDinasEdit');
        $date = str_replace('/', '-', $converttgl);
        $tanggalconvert = date('Y-m-d', strtotime($date));
        // dd($this->request->getVar('kategoriDinasShif'));

        $this->dinasShifting->save([
            'id_dinas_shifting' => $idDinasShifting,
            'id_kategori_dinas_crew' => $this->request->getVar('kategoriDinasShifLemburEdit'),
            'id_kategori_dinas_shif' => $this->request->getVar('kategoriDinasShifEdit'),
            'tanggal' => $tanggalconvert,
            'id_acara' => $this->request->getVar('namaAcaraDinasShifEdit'),
            'lokasi' => $this->request->getVar('lokasiDinasShifEdit')
        ]);


        $idOldCrewDinasShifting = $this->request->getVar('id_crew_dinas_shift');
        $idSelectUser = $this->request->getVar('id_userSelectEdit');
        $idSelectUserUpate = $this->request->getVar('id_userUpdate');
        $namaEdit = $this->request->getVar('nama');
        $namaEditUpdate = $this->request->getVar('namaUpdate');
        //update data lama crew dinas ob
        if (!isset($namaEditUpdate)) {
            $namaEdit = $this->request->getVar('nama');
            $jumlahDataPertama = count($namaEdit);
            for ($i = 0; $i < $jumlahDataPertama; $i++) {
                $this->crewDinasShif->save([
                    'id_crew_shifting' => $idOldCrewDinasShifting[$i],
                    'id_users' => $idSelectUser[$i]
                ]);
            }
        }
        //update data baru crew dinas ob
        else if (isset($namaEditUpdate)) {
            $jumlahDataUpdate = count($namaEditUpdate);
            // dd($jumlahDataUpdate);
            for ($j = 0; $j < $jumlahDataUpdate; $j++) {
                $this->crewDinasShif->save([
                    'id_dinas_shif' => $idDinasShifting,
                    'id_users' => $idSelectUserUpate[$j]
                ]);
            }
            //fungsi untuk update data yang sudah ada
            if (isset($namaEdit)) {
                $jumlahDataKedua = count($namaEdit);
                for ($k = 0; $k < $jumlahDataKedua; $k++) {
                    $this->crewDinasShif->save([
                        'id_crew_shifting' => $idOldCrewDinasShifting[$k],
                        'id_users' => $idSelectUser[$k]
                    ]);
                }
            }
        }

        //end edit crew dinas shifting













        session()->setFlashdata('pesan', 'Berhasil,update dinas shifting ID ' . $idDinasShifting);
        return redirect()->to('dinas-shifting');
    }

    public function edit($idDinasShift)
    {
        // dd($this->dinasShifting->getIdDinasShifting($idDinasShift));
        // dd($this->dinasShifting->getDinasShiftDanLemburJoinCrewDinasShifAcara($idDinasShift));
        $data = [
            // 'allDataJoinShiftDanJoinNamaAcara' => $this->dinasShifting->getDinasShifJoinJenisShifJoinNamaAcara(),
            // 'allDataDinasShifting' => $this->crewDinasShif->getIdCrewDinasShifting(),
            // 'allUsers' => $this->allUser->getUsers(),
            'AllReadGetIdDinasShift' => $this->dinasShifting->getIdDinasShifting($idDinasShift),
            'showDataCrewDinasShiftJoinUsers' => $this->dinasShifting->procedureGetShowCrewDinasShifting($idDinasShift),
            'allDataUsers' => $this->allUser->getUsers(),
            'allNamaAcaraShif' => $this->allNamaAcaraShif->getIdNamaAcaraShif(),
            'allNamaDinasShitfLembur' => $this->allKategoriDinasLembur->getIdKategoriShiftLembur(),
            'title' => 'Tabel update Dinas Shifting',
            'allKategoriDinasShif' => $this->allKategoriDinasShif->getIdKategoriShifting()
        ];
        return view('dinas-shifting/edit', $data);
    }
}
