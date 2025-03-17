<?php

namespace App\Controllers;

use App\Libraries\GroceryCrud;

class Customer extends BaseController
{
	public function index()
	{
		$crud = new GroceryCrud();

		$crud->setTable('customer');
		$crud->setLanguage('Indonesian');
		$crud->columns(['name', 'no_customer', 'gender', 'address', 'email', 'phone']);
		$crud->unsetColumns(['created_at', 'updated_at']);
		$crud->displayAs(array(
			'name' => 'Nama',
			'gender' => 'L/P',
			'address' => 'ALamat',
			'phone' => 'Telp',
		));
		$crud->where('deleted_at', null);
		//$crud->unsetAddFields(['created_at', 'updated_at', 'deleted_at']);
		//$crud->unsetEditFields(['created_at', 'updated_at', 'deleted_at']);
		$crud->setRule('name', 'Nama', 'required', [
			'required' => '{field} harus diisi!'
		]);
		//$crud->unsetAdd(); //Menonaktifkan Tombol Tambah Data
		//$crud->unsetEdit(); //Menonaktifkan Tombol Ubah Data
		//$crud->unsetDelete(); //Menonaktifkan Tombol Hapus Data
		//$crud->unsetExport(); //Menonaktifkan Tombol Export Data	
		//$crud->unsetPrint(); //Menonaktifkan Tombol Print Data

		//$crud->setRelation('officeCode', 'offices', 'city');
		$crud->setTheme('datatables');

		$output = $crud->render();

		$data = [
			'title' => 'Data Customer',
			'result' => $output
		];

		return view('customer/index', $data);
	}
}
