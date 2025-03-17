<?php 

namespace App\Models;

use CodeIgniter\Model;

class PelangganModel extends Model
{
    //Nama Tabel
    protected $table    = 'pelanggan';
    protected $primaryKey = 'id_pelanggan';
    protected $allowedFields = ['nama_pelanggan', 'alamat','nohp_pelanggan', 'jumlah_cukur'];
    protected $useSoftDeletes = true;
    protected $useTimestamps = true;

    public function getPelanggan($id = false)
    {
        $query = $this->select('*');

        // ->where('id', $id);
        if ($id === false) {
            return $query->findAll();
        } else {
            return $query->where(['id_pelanggan' => $id])->first();
        }
}

}