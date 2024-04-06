<?php

namespace App\Controllers;

use App\Models\AcaraDinasShiftingModel;
use App\Models\KategoriCrewDinasShiftLemburModel;


class StatusDinasLemburShifting extends BaseController
{
    protected $modelKategoriLemburShif;
    protected $modelAcaraDinasLemburShif;

    public function __construct()
    {
        $this->modelKategoriLemburShif = new KategoriCrewDinasShiftLemburModel();
        $this->modelAcaraDinasLemburShif = new AcaraDinasShiftingModel();
    }

    public function index()
    {

        // dd($this->modelAcaraDinasLemburShif->getIdNamaAcaraShif());
        $data = [
            'dataKategoriDinasLemburShifting' => $this->modelKategoriLemburShif->getIdKategoriShiftLembur(),
            'dataAcaraDinasLemburShifting' => $this->modelAcaraDinasLemburShif->getIdNamaAcaraShif()

        ];
        return view('admin/status-dinas-lembur-shifting/index', $data);
    }
    public function kategori_create()
    {
        return view('admin/status-dinas-lembur-shifting/kategori_create');
    }
    public function acara_create()
    {

        return view('admin/status-dinas-lembur-shifting/acara_create');
    }
    public function acara_save()
    {

        $namaAcara = $this->request->getVar('nama_acara');
        // dd($namaAcara);

        $this->modelAcaraDinasLemburShif->save([
            'nama_acara_shift' => $namaAcara
        ]);
        session()->setFlashdata('pesan', 'Berhasil,input acara ' . $namaAcara);
        return redirect()->to('admin/status-dinas-lembur-shifting');
    }
    public function kategori_save()
    {

        $namaKategori = $this->request->getVar('nama_kategori');
        // dd($namaAcara);

        $this->modelKategoriLemburShif->save([
            'nama_kategori_dinas_crew' => $namaKategori
        ]);
        session()->setFlashdata('pesan', 'Berhasil,input kategori ' . $namaKategori);
        return redirect()->to('admin/status-dinas-lembur-shifting');
    }




    public function edit_kategori($idKategori)
    {

        $data['getIdKategori'] = $this->modelKategoriLemburShif->getIdKategoriShiftLembur($idKategori);
        return view('admin/status-dinas-lembur-shifting/kategori_edit', $data);
    }
    public function edit_acara($idAcara)
    {
        $data['getIdAcara'] = $this->modelAcaraDinasLemburShif->getIdNamaAcaraShif($idAcara);

        return view('admin/status-dinas-lembur-shifting/acara_edit', $data);
    }

    public function acara_update($idAcara)
    {

        $namaAcaraEdit = $this->request->getVar('nama_acara_edit');

        $this->modelAcaraDinasLemburShif->save([
            'id_acara_shift' => $idAcara,
            'nama_acara_shift' => $namaAcaraEdit,
        ]);
        session()->setFlashdata('pesan', 'Berhasil,update acara ' . $namaAcaraEdit);
        return redirect()->to('admin/status-dinas-lembur-shifting');
    }
    public function kategori_update($idKategori)
    {

        $namaKategoriEdit = $this->request->getVar('nama_kategori_edit');

        $this->modelKategoriLemburShif->save([
            'id_kategori_dinas_crew' => $idKategori,
            'nama_kategori_dinas_crew' => $namaKategoriEdit,
        ]);
        session()->setFlashdata('pesan', 'Berhasil,update Kategori ' . $namaKategoriEdit);
        return redirect()->to('admin/status-dinas-lembur-shifting');
    }

    public function delete_acara($id)
    {
        $this->modelAcaraDinasLemburShif->delete($id);
        return redirect()->to('admin/status-dinas-lembur-shifting');
    }
    public function delete_kategori($id)
    {
        $this->modelKategoriLemburShif->delete($id);
        return redirect()->to('admin/status-dinas-lembur-shifting');
    }
}
