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
use App\Models\OutBroadcastModel;


class OutBroadcast extends BaseController
{
    protected $outBroadcast;

    public function __construct(){
        $this->outBroadcast= new OutBroadcastModel();
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
        
    }
    public function save()
    {
        
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
