<?php 
namespace App\Controllers;


use App\Models\PelangganModel;

class Pelanggan extends BaseController
{
    private $pelangganModel;
    public function __construct()
    {
        $this->pelangganModel = new PelangganModel();
    }

    public function index()
    {
        $dataPelanggan = $this->pelangganModel->getPelanggan();
        $data = [
            'title' => 'Data Pelanggan',
            'result' => $dataPelanggan
        ];
        return view('pelanggan/index', $data);
    }

    public function detail($id)
    {
        $dataPelanggan = $this->pelangganModel->getPelanggan($id);
        $data = [
            'title' => 'Data Pelanggan',
            'result' => $dataPelanggan
        ];
        return view('pelanggan/detail', $data);
    }

    public function create()
    {        
        $data = [
            'title' => 'Tambah Pelanggan',
            'validation' => \Config\Services::validation(),
        ];
        return view('pelanggan/create', $data);
    }

    public function save()
    {
        if (!$this->validate([
            'nama_pelanggan' =>
            [
                'rules' => 'required|string',
                'label' => 'nama pelanggan',
                'errors' => [
                    'required' => '{field} harus di isi',
                    'is_unique' => '{field} hanya sudah ada'
                ]
            ],
            'alamat' =>
            [
                'rules' => 'required|string',
                'label' => 'alamat',
                'errors' => [
                    'required' => '{field} harus di isi',
                    'is_unique' => '{field} hanya sudah ada'
                ]
            ],
            'jumlah_cukur' =>
            [
                'rules' => 'required|integer',
                'label' => 'jumlah cukur',
                'errors' => [
                    'required' => '{field} harus di isi',
                    'is_unique' => '{field} hanya sudah ada'
                ]
            ],
            'nohp_pelanggan' =>
            [
                'rules' => 'required|integer',
                'label' => 'nomor hp pelanggan',
                'errors' => [
                    'required' => '{field} harus di isi',
                    'is_unique' => '{field} hanya sudah ada'
                ]
            ],
        ])) {
            $data = [
                'title' => 'Tambah Pelanggan',
                // 'category' => $this->catModel->findAll(),
                'validation' => $this->validator
            ];
            // return view('/book/create', $data);
            // dd(\Config\Services::validation()->getErrors());
            return redirect()->to('/pelanggan/create')->withInput();
        }
        $pelanggan_myth = new PelangganModel();
        $pelanggan_myth->save([
            
            'nama_pelanggan' => $this->request->getVar('nama_pelanggan'),
            'alamat' => $this->request->getVar('alamat'),
            'nohp_pelanggan' => $this->request->getVar('nohp_pelanggan'),
            'jumlah_cukur' => $this->request->getVar('jumlah_cukur'),
            
        ]);
        session()->setFlashdata("msg", "Data berhasil ditambahkan");
        return redirect()->to('/pelanggan');
    }

    public function edit($id)
    {
        $dataPelanggan = $this->pelangganModel->getPelanggan($id);
        $data = [
            'title' => 'Edit Pelanggan',
            'result' => $dataPelanggan,
            'validation' => \Config\Services::validation(),
        ];
        return view('pelanggan/edit', $data);
    }

    public function update($id)
    {
        if (!$this->validate([
            'nama_pelanggan' =>
            [
                'rules' => 'required|string',
                'label' => 'nama pelanggan',
                'errors' => [
                    'required' => '{field} harus di isi',
                    'is_unique' => '{field} hanya sudah ada'
                ]
            ],
            'alamat' =>
            [
                'rules' => 'required|string',
                'label' => 'alamat',
                'errors' => [
                    'required' => '{field} harus di isi',
                    'is_unique' => '{field} hanya sudah ada'
                ]
            ],
            'jumlah_cukur' =>
            [
                'rules' => 'required|integer',
                'label' => 'jumlah cukur',
                'errors' => [
                    'required' => '{field} harus di isi',
                    'is_unique' => '{field} hanya sudah ada'
                ]
            ],
            'nohp_pelanggan' =>
            [
                'rules' => 'required|integer',
                'label' => 'nomor hp pelanggan',
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
        
        $pelanggan_myth = new PelangganModel();
        $this->pelangganModel->save([
            'id_pelanggan' => $id,
            'nama_pelanggan' => $this->request->getVar('nama_pelanggan'),
            'alamat' => $this->request->getVar('alamat'),
            'nohp_pelanggan' => $this->request->getVar('nohp_pelanggan'),
            'jumlah_cukur' => $this->request->getVar('jumlah_cukur'),

        ]);
        session()->setFlashdata('msg', 'Berhasil memperbarui Pelanggan');
        return redirect()->to('/pelanggan');
    }

    public function delete($id)
    {
        $this->pelangganModel->delete($id);
        session()->setFlashdata("msg", "Data berhasil dihapus!");
        return redirect()->to('/pelanggan');
    }
}

