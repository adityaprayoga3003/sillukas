<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoryModelKomik extends Model
{

    // Nama Tebel
    protected $table    = 'komik_category';
    // Atribut yang digunakan menjadi primary key
    protected $primarykey = 'komik_category_id';
}
