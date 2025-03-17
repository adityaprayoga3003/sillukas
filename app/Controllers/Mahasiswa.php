<?php

namespace App\Controllers;

use App\Libraries\GroceryCrud;

class Mahasiswa extends BaseController
{
    public function index()
    {

        $crud = new GroceryCrud();
        $crud->setTheme('datatables');
        $crud->setTable('mahasiswa__1523');



        $crud->setLanguage('Indonesian');
        $crud->columns(['nama', 'tempat_lahir', 'jenis_kelamin', 'hobi', 'kategori_favorit']);
        $crud->unsetColumns(['created_at', 'updated_at', 'deleted_at']);
        $crud->displayAs(array(
            'nama' => 'Nama',
            'tempat_lahir' => 'Tempat lahir',
            'jenis_kelamin' => 'L/P',
            'hobi' => 'Hobi',
            'kategori_favorit' => 'Kategori favorit',
        ));
        // $crud->where('deleted_at', null);
        // $crud->unsetAddFields(['created_at', 'updated_at']);
        // $crud->unsetEditFields(['created_at', 'updated_at']);
        $crud->setRule('nama', 'Nama', 'required', [
            'required' => '{field} harus di isi'
        ]);
        $crud->setRule('tempat_lahir', 'Tempat lahir', 'required', [
            'required' => '{field} harus di isi'
        ]);
        $crud->setRule('jenis_kelamin', 'L/P', 'required', [
            'required' => '{field} harus di isi'
        ]);
        $crud->setRule('hobi', 'Hobi', 'required', [
            'required' => '{field} harus di isi'
        ]);
        $crud->setRule('kategori_favorit', 'Kategori favorit', 'required', [
            'required' => '{field} harus di isi'
        ]);


        // $crud->unsetAdd();
        // $crud->unsetEdit();
        // $crud->unsetDelete();
        $crud->unsetExport();
        $crud->unsetPrint();

        $crud->setRelation('kategori_favorit', 'book_category', 'name_category');
        $crud->setTheme('datatables');

        $output = $crud->render();

        $data = [
            'title' => 'Data Mahasiswa',
            'result' => $output
        ];
        return view('mahasiswa/index', $data);
    }
}
