<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriCukurModel extends Model
{

    // Nama Tebel
    protected $table    = 'kategoricukur';
    // Atribut yang digunakan menjadi primary key
    protected $primarykey = 'id';
    protected $allowedFields = ['nama_kategori', 'harga'];
    protected $useSoftDeletes = true;
    protected $useTimestamps = true;

    public function getKategori($id = false)
    {
        $query = $this->select('*');

        // ->where('id', $id);
        if ($id === false) {
            return $query->findAll();
        } else {
            return $query->where(['id' => $id])->first();
        }
    }
}
