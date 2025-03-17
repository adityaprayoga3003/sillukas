<?php

namespace App\Controllers;

use App\Libraries\GroceryCrud;

class Supplier extends BaseController
{
    public function index()
    {
        $crud = new GroceryCrud();
        $crud->setTable('supplier');
        //penggunaan bahasa
        $crud->setLanguage('Indonesian');
        //menampilkan dan mengubah kolom
        $crud->columns(['name', 'no_supplier', 'gender', 'address', 'email', 'phone']);
        $crud->unsetColumns(['created_at', 'updated_at']); //agar tidak ditampilkan
        $crud->displayAs(array(
            'name' => 'Nama',
            'gender' => 'L/P',
            'address' => 'Alamat',
            'phone' => 'Telp',
        )); //mengubah nama kolom
        //Filter Data
        $crud->where('deleted_at', null);
        //Pengaturan Form
        $crud->unsetAddFields(['created_at', 'updated_at']);
        $crud->unsetEditFields(['created_at', 'updated_at']);
        //form Validation
        $crud->setRule('name', 'Nama', 'required', ['required' => '{field} harus diisi!']);
        //Pengaturan Button CRUD
        // $crud->unsetAdd(); // Menonaktifkan tombol Tambah Data
        // $crud->unsetEdit(); // Menonaktifkan tombol Ubah Data
        // $crud->unsetDelete(); // Menonaktifkan tombol Hapus Data
        // $crud->unsetExport(); // Menonaktifkan tombol Export Data
        // $crud->unsetPrint(); // Menonaktifkan tombol Print Data
        // Relasi Tabel
        // $crud->setRelation('officeCode', 'offices', 'city');
        // Callback Function
        // $crud->setTable('customers');
        // $crud->setSubject('Customer', 'Customers');
        // $crud->columns(['customerName', 'phone', 'addressLine1', 'creditLimit']);
        // Tema Tabel
        // $crud->setTheme('datatables');

        $output = $crud->render();

        $data = [
            'title' => 'Data Supplier',
            'result' => $output
        ];

        return view('supplier/index', $data);
    }
}
