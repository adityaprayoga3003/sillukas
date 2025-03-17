<?php 

namespace App\Models;

use CodeIgniter\Model;

class KaryawanModel extends Model
{
    //Nama Tabel
    protected $table    = 'karyawan';
    protected $primaryKey = 'id_karyawan';
    protected $allowedFields = ['nama_karyawan', 'alamat','nohp_karyawan'];
    protected $useSoftDeletes = true;
    protected $useTimestamps = true;

    public function getKaryawan($id = false)
    {
        $query = $this->select('*');

        // ->where('id', $id);
        if ($id === false) {
            return $query->findAll();
        } else {
            return $query->where(['id_karyawan' => $id])->first();
        }
}

}