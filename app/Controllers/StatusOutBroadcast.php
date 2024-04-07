<?php

namespace App\Controllers;
use App\Models\KategoriObModel;



class StatusOutBroadcast extends BaseController
{
    protected $modelKategoriOB;
    public function __construct()
    {
        $this->modelKategoriOB= new KategoriObModel();
    }

    public function index()
    {
       $dataAll= $this->modelKategoriOB->getKategori();
       $data =[
            'allDataKategoriOB'=> $dataAll
       ];
     
        return view('admin/status-kategori-out-broadcast/index',$data);
    }
    public function delete($idStatusKatOb){
        $this->modelKategoriOB->delete($idStatusKatOb);
        return redirect()->to('admin/status-kategori-out-broadcast');
    }
}
