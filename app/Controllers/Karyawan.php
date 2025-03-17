<?php 
namespace App\Controllers;


use App\Models\KaryawanModel;

class Karyawan extends BaseController
{
    private $karyawanModel;
    public function __construct()
    {
        $this->karyawanModel = new KaryawanModel();
    }

    public function index()
    {
        $dataKaryawan = $this->karyawanModel->getKaryawan();
        $data = [
            'title' => 'Data Karyawan',
            'result' => $dataKaryawan
        ];
        return view('karyawan/index', $data);
    }

    public function detail($id)
    {
        $dataKaryawan = $this->karyawanModel->getKaryawan($id);
        $data = [
            'title' => 'Data Karyawan',
            'result' => $dataKaryawan
        ];
        return view('karyawan/detail', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Karyawan',
            'validation' => \Config\Services::validation()
        ];
        return view('karyawan/create', $data);
        
    }

    public function save()
    {
        if (!$this->validate([
            'nama_karyawan' =>
            [
                'rules' => 'required|string',
                'label' => 'nama karyawan',
                'errors' => [
                    'required' => '{field} harus di isi',
                    'is_unique' => '{field} hanya sudah ada'
                ]
            ],
            'alamat' =>
            [
                'rules' => 'required|string',
                'label' => 'alamat karyawan',
                'errors' => [
                    'required' => '{field} harus di isi',
                    'is_unique' => '{field} hanya sudah ada'
                ]
            ],
            'nohp_karyawan' =>
            [
                'rules' => 'required|integer',
                'label' => 'nomor hp karyawan',
                'errors' => [
                    'required' => '{field} harus di isi',
                    'is_unique' => '{field} hanya sudah ada'
                ]
            ],
        ])){
            $data = [
                'title' => 'Tambah Karyawan',
                // 'category' => $this->catModel->findAll(),
                'validation' => $this->validator
            ];
        // return view('/book/create', $data);
        // dd(\Config\Services::validation()->getErrors());
        return redirect()->to('/karyawan/create')->withInput();
    }
        
        $karyawan_myth = new KaryawanModel();
        $karyawan_myth->save([

            'nama_karyawan' => $this->request->getVar('nama_karyawan'),
            'alamat' => $this->request->getVar('alamat'),
            'nohp_karyawan' => $this->request->getVar('nohp_karyawan'),
            
            
        ]);
        session()->setFlashdata("msg", "Data berhasil ditambahkan");
        return redirect()->to('/karyawan');
    }

    public function edit($id)
    {
        $dataKaryawan = $this->karyawanModel->getKaryawan($id);
        $data = [
            'title' => 'Edit Karyawan',
            'result' => $dataKaryawan,
            'validation' => \Config\Services::validation(),
        ];
        return view('karyawan/edit', $data);
    }

    public function update($id)
    {
        if (!$this->validate([
            'nama_karyawan' =>
            [
                'rules' => 'required|string',
                'label' => 'nama karyawan',
                'errors' => [
                    'required' => '{field} harus di isi',
                    'is_unique' => '{field} hanya sudah ada'
                ]
            ],
            'alamat' =>
            [
                'rules' => 'required|string',
                'label' => 'alamat karyawan',
                'errors' => [
                    'required' => '{field} harus di isi',
                    'is_unique' => '{field} hanya sudah ada'
                ]
            ],
            'nohp_karyawan' =>
            [
                'rules' => 'required|integer',
                'label' => 'nomor hp karyawan',
                'errors' => [
                    'required' => '{field} harus di isi',
                    'is_unique' => '{field} hanya sudah ada'
                ]
            ],
        ])) 
            // $data = [
            //     'title' => 'Tambah Karyawan',
            //     // 'category' => $this->catModel->findAll(),
            //     'validation' => $this->validator
            // ];
            // // return view('/book/create', $data);
            // // dd(\Config\Services::validation()->getErrors());
            // return redirect()->to('/karyawan/edit/' . $this->request->getVar('id_karyawan'))->withInput();
            return redirect()->back()->withInput();
        
        $karyawan_myth = new KaryawanModel();
        $this->karyawanModel->save([
            'id_karyawan' => $id,
            'nama_karyawan' => $this->request->getVar('nama_karyawan'),
            'alamat' => $this->request->getVar('alamat'),
            'nohp_karyawan' => $this->request->getVar('nohp_karyawan'),
            
            
        ]);
        session()->setFlashdata('msg', 'Berhasil memperbarui Karyawan');
        return redirect()->to('/karyawan');
    }

    public function delete($id)
    {
        $this->karyawanModel->delete($id);
        session()->setFlashdata("msg", "Data berhasil dihapus!");
        return redirect()->to('/karyawan');
    }
}

