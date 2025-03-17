<?php 
namespace App\Models;

use CodeIgniter\Model;

class DetailPenjualanModel extends Model
{
    protected $table        = 'detailpenjualan';
    protected $allowedFields = ['id_produk', 'id_penjualan', 'id_karyawan', 'jumlah', 'total_harga'];
    protected $useTimestamps = true;
    // protected $useSoftDeletes = true;
}
