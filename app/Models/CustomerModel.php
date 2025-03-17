<?php 
namespace App\Models;

use CodeIgniter\Model;

class CustomerModel extends Model
{
    // Nama Tabel
    protected $table    = 'customer';
    // Atribut yang digunakan menjadi primary key
    protected $primaryKey = 'customer_id';
    // Atribut untuk menyimpan created_at dan updated_at
    protected $useTimestamps = true;
    protected $allowedFields = [
        'name', 'no_customer', 'gender', 'address', 'email', 'phone'
    ];

    protected $useSoftDeletes = true;

    public function getcustomer($id = false)
    {

        if ($id == false)
            return $this->get()->getResultArray();
        else
            $this->where(['customer_id' => $id]);
        return $this->first();
    }
}