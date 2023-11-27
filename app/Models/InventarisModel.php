<?php

namespace App\Models;

use CodeIgniter\Model;

class InventarisModel extends Model
{
    protected $table = 'inventaris';
    protected $primaryKey = 'id_inv';
    // protected $retunType='object';
    protected $useAutoIncrement = false;
    protected $allowedFields = ['id_inv','nama_barang', 'merk', 'serial_number', 'jumlah','thn_pengadaan'];
   

    public function autoNumberId()
    {
        $builder = $this->table('inventaris');
        $builder->selectMax('id_inv', 'idMax');
        $query = $builder->get();
        if ($query->getNumRows() > 0) {

            foreach ($query->getResult() as $key) {
                $code = '';
                $getData = substr($key->idMax, -9);
                $increment = intval($getData) + 1;
                $code = sprintf('%09s', $increment);
               
            }
        } else {
            $code = '000000001';
        }
        return 'INV-' . $code;
    }


}
