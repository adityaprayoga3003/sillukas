<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoryModel extends Model
{

    // Nama Tebel
    protected $table    = 'book_category';
    // Atribut yang digunakan menjadi primary key
    protected $primarykey = 'book_category_id';
}
