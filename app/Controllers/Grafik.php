<?php

namespace App\Controllers;

use App\Models\PenggunaModel;
use \App\Models\RoleModel;
// use Kint\Zval\Value;
// use PhpOffice\PhpSpreadsheet\Reader\Xls;
// use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
// use PhpParser\Node\Stmt\Continue_;



class Grafik extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Data Pengguna',
        ];
        return view('grafik/index', $data);
    }
}
