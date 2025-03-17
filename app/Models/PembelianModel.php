<?php 
namespace App\Models;

use CodeIgniter\Model;

class PembelianModel extends Model
{
    // Nama Tabel
    protected $table        = 'pembelian';
    protected $useTimestamps = true;
    protected $allowedFields = ['id_pembelian', 'id_pengguna'];

    // public function getPembelian($id = false)
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
        return $this->db->table('detailpembelian as dp')
        ->select('p.id_pembelian, p.created_at tgl_transaksi, us.id_pengguna, 
            us.nama, k.id_karyawan, 
            k.nama_karyawan, SUM(dp.total_harga) total')
        ->join('pembelian p', 'p.id_pembelian = dp.id_pembelian') 
        ->join('pengguna us', 'us.id_pengguna = p.id_pengguna')
        ->join('karyawan k', 'k.id_karyawan = dp.id_karyawan')
            ->where('date(p.created_at) >=', $tgl_awal)
            ->where('date(p.created_at) <=', $tgl_akhir)
            ->groupBy('p.id_pembelian')
            ->get()->getResultArray();
    }


    


    public function getPembelian1($id=false) {
        if ($id === false) {
            return $this->join('detailpembelian dp', 'dp.id_pembelian = pembelian.id_pembelian')
            ->join('karyawan', 'karyawan.id_karyawan = dp.id_karyawan')
            ->join('produk', 'produk.id_produk = dp.id_produk')->get()->getResultArray();
        } else {
            return $this->join('detailpembelian dp', 'dp.id_pembelian = pembelian.id_pembelian')
            ->join('karyawan', 'karyawan.id_karyawan = dp.id_karyawan')
            ->join('produk', 'produk.id_produk = dp.id_produk')->where('pembelian.id_pembelian', $id)->first();
        }
        
    }
}