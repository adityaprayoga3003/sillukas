<?php

namespace App\Models;

use CodeIgniter\Model;

class SupplierModel extends Model
{
    // Nama Tabel
    protected $table    = 'supplier';
    // Atribut yang digunakan menjadi primary key
    protected $primaryKey = 'supplier_id';
    // Atribut untuk menyimpan created_at dan updated_at
    protected $useTimestamps = true;
    protected $allowedFields = [
        'name', 'no_supplier', 'gender', 'address', 'email', 'phone', 
    ];

    protected $useSoftDeletes = true;

    public function getsupplier($id = false)
    {

        if ($id == false
        )
        return $this->get()->getResultArray();
        else
            $this->where(['supplier_id' => $id]);
        return $this->first();
    }
}
