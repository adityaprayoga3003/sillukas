<?php

namespace App\Models;

use CodeIgniter\Database\Query;
use CodeIgniter\Model;

class ProdukModel extends Model
{

    // Nama Tebel
    protected $table    = 'produk';
    // Atribut yang digunakan menjadi primary key
    protected $primaryKey = 'id_produk';
    // Atribut untuk menyimpan created_at dan updated_at
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;

    protected $allowedFields = [
        'nama_produk', 'stok_produk', 'harga', 'cover'
    ];


    public function getProduk($id = false)
    {
        $query = $this->table('produk')
            // ->join('book_category', 'book_category_id')
            ->where('deleted_at is null');

        if ($id == false)
            return $query->get()->getResultArray();
        return $query->where(['id_produk' => $id])->first();
    }
}
