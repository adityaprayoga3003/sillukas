<?php 
namespace App\Models;

use CodeIgniter\Model;

class CukurModel extends Model
{
    // Nama Tabel
    protected $table        = 'transaksicukur';
    protected $useTimestamps = true;
    protected $allowedFields = ['id_transaksicukur', 'id_pengguna', 'id_pelanggan', 'id'];

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
        return $this->db->table('detailtransaksicukur as dc')
        ->select('t.id_transaksicukur, t.created_at tgl_transaksi, p.id_pelanggan, 
            p.nama_pelanggan, k.id_karyawan, 
            k.nama_karyawan, kc.id, 
            kc.nama_kategori, SUM(dc.total_harga) total')
        ->join('transaksicukur t', 'id_transaksicukur')
        ->join('pelanggan p', 'p.id_pelanggan = t.id_pelanggan')
        ->join('karyawan k', 'k.id_karyawan = dc.id_karyawan')
        ->join('kategoricukur kc', 'kc.id = t.id')
            ->where('date(t.created_at) >=', $tgl_awal)
            ->where('date(t.created_at) <=', $tgl_akhir)
            ->groupBy('t.id_transaksicukur')
            ->get()->getResultArray();
    }


    


    public function getCukur1($id=false) {
        if ($id === false) {
            return $this->join('detailtransaksicukur dc', 'dc.id_transaksicukur = transaksicukur.id_transaksicukur')
            ->join('karyawan', 'karyawan.id_karyawan = dc.id_karyawan')
            ->join('pelanggan', 'pelanggan.id_pelanggan = transaksicukur.id_pelanggan')
            ->join('kategoricukur', 'kategoricukur.id = transaksicukur.id')->get()->getResultArray();
        } else {
            return $this->join('detailtransaksicukur dc', 'dc.id_transaksicukur = transaksicukur.id_transaksicukur')
            ->join('karyawan', 'karyawan.id_karyawan = dc.id_karyawan')
            ->join('pelanggan', 'pelanggan.id_pelanggan = transaksicukur.id_pelanggan')
            ->join('kategoricukur', 'kategoricukur.id = transaksicukur.id')->where('transaksicukur.id_transaksicukur', $id)->first();
        }
        
    }
}