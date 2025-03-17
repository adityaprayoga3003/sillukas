<?php 

namespace App\Models;

use CodeIgniter\Model;

class PenggunaModel extends Model
{
    //Nama Tabel
    protected $table    = 'pengguna';
    protected $primaryKey = 'id_pengguna';
    protected $allowedFields = ['username', 'password', 'id_role', 'nama', 'email','deleted_at'];
    protected $useSoftDeletes = true;
    protected $useTimestamps = true;
    public function getPengguna($id = false)
    {
        $query = $this->select('*');

        // ->where('id', $id);
        if ($id === false) {
            return $query->findAll();
        } else {
            return
            $query = $this->table('pengguna')
            ->join('role', 'id_role')
            ->where(['id_pengguna' => $id])->first();;
            
        }
}

}