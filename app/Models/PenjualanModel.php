<?php 
namespace App\Models;

use CodeIgniter\Model;

class PenjualanModel extends Model
{
    // Nama Tabel
    protected $table        = 'penjualan';
    protected $useTimestamps = true;
    protected $allowedFields = ['id_penjualan', 'id_pengguna', 'id_pelanggan'];

    // public function getPenjualan($id = false)
    // {
    //     $query = $this->select('*');

    //     // ->where('id', $id);
    //     if ($id === false) {
    //         return $query->findAll();
    //     } else {
    //         return $query->where(['id_penjualan' => $id])->first();
    //     }
    // }

    public function getReport($tgl_awal, $tgl_akhir)
    {
        return $this->db->table('detailpenjualan as dp')
        ->select('p.id_penjualan, p.created_at tgl_transaksi, us.id_pengguna, 
            us.nama, k.id_karyawan, 
            k.nama_karyawan, SUM(dp.total_harga) total')
        ->join('penjualan p', 'id_penjualan')
        ->join('pengguna us', 'us.id_pengguna = p.id_pengguna')
        ->join('karyawan k', 'k.id_karyawan = dp.id_karyawan')
        ->where('date(p.created_at) >=', $tgl_awal)
            ->where('date(p.created_at) <=', $tgl_akhir)
            ->groupBy('p.id_penjualan')
            ->get()->getResultArray();
    }

    public function getPenjualan1($id=false) {
        if ($id === false) {
            return $this->join('detailpenjualan dp', 'dp.id_penjualan = penjualan.id_penjualan')
            ->join('karyawan', 'karyawan.id_karyawan = dp.id_karyawan')
            ->join('produk', 'produk.id_produk = dp.id_produk')->get()->getResultArray();
        } else {
            return $this->join('detailpenjualan dp', 'dp.id_penjualan = penjualan.id_penjualan')
            ->join('karyawan', 'karyawan.id_karyawan = dp.id_karyawan')
            ->join('produk', 'produk.id_produk = dp.id_produk')->where('penjualan.id_penjualan', $id)->first();
        }
        
    }
}