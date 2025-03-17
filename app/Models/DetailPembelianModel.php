<?php 
namespace App\Models;

use CodeIgniter\Model;

class DetailPembelianModel extends Model
{
    protected $table        = 'detailpembelian';
    protected $allowedFields = ['id_produk', 'id_pembelian','id_karyawan', 'jumlah', 'total_harga'];
    protected $useTimestamps = true;
    // protected $useSoftDeletes = true;
}
