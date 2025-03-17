<?php 
namespace App\Models;

use CodeIgniter\Model;

class DetailTransaksiCukurModel extends Model
{
    protected $table        = 'detailtransaksicukur';
    protected $allowedFields = ['id_transaksicukur','id_karyawan', 'jumlah', 'diskon','total_harga'];
    protected $useTimestamps = true;
    // protected $useSoftDeletes = true;
}
