<?php 
namespace App\Controllers;


use App\Models\KategoriCukurModel;

class Kategori extends BaseController
{
    private $kategoriModel;
    public function __construct()
    {
        $this->kategoriModel = new KategoriCukurModel();
    }

    public function index()
    {
        $dataKategori = $this->kategoriModel->getKategori();
        $data = [
            'title' => 'Data Kategori Cukur',
            'result' => $dataKategori
        ];
        return view('kategori/index', $data);
    }

    public function detail($id)
    {
        $dataKategori = $this->kategoriModel->getKategori($id);
        $data = [
            'title' => 'Data Kategori Cukur',
            'result' => $dataKategori
        ];
        return view('kategori/detail', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Kategori Cukur',
            'validation' => \Config\Services::validation()
        ];
        return view('kategori/create', $data);
        
    }

    public function save()
    {
        if (!$this->validate([
            'nama_kategori' =>
            [
                'rules' => 'required|string',
                'label' => 'nama kategori',
                'errors' => [
                    'required' => '{field} harus di isi',
                    'is_unique' => '{field} hanya sudah ada'
                ]
            ],
            
            'harga' =>
            [
                'rules' => 'required|integer',
                'label' => 'harga',
                'errors' => [
                    'required' => '{field} harus di isi',
                    'is_unique' => '{field} hanya sudah ada'
                ]
            ],
        ])){
            $data = [
                'title' => 'Tambah Kategori Cukur',
                // 'category' => $this->catModel->findAll(),
                'validation' => $this->validator
            ];
        // return view('/book/create', $data);
        // dd(\Config\Services::validation()->getErrors());
        return redirect()->to('/kategori/create')->withInput();
    }
        
        $kategori_myth = new KategoriCukurModel();
        $kategori_myth->save([

            'nama_kategori' => $this->request->getVar('nama_kategori'),
            // 'alamat' => $this->request->getVar('alamat'),
            'harga' => $this->request->getVar('harga'),
            
            
        ]);
        session()->setFlashdata("msg", "Data berhasil ditambahkan");
        return redirect()->to('/kategori');
    }

    public function edit($id)
    {
        $dataKategori = $this->kategoriModel->getKategori($id);
        $data = [
            'title' => 'Edit Kategori Cukur',
            'result' => $dataKategori,
            'validation' => \Config\Services::validation(),
        ];
        return view('kategori/edit', $data);
    }

    public function update($id)
    {
        if (!$this->validate([
            'nama_kategori' =>
            [
                'rules' => 'required|string',
                'label' => 'nama kategori',
                'errors' => [
                    'required' => '{field} harus di isi',
                    'is_unique' => '{field} hanya sudah ada'
                ]
            ],

            'harga' =>
            [
                'rules' => 'required|integer',
                'label' => 'harga',
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
        
        $kategori_myth = new KategoriCukurModel();
        $this->kategoriModel->update($id, [
            // 'id' => $id,
            'nama_kategori' => $this->request->getVar('nama_kategori'),
            'harga' => $this->request->getVar('harga'),
        ]);
        session()->setFlashdata('msg', 'Berhasil memperbarui Kategori');
        return redirect()->to('/kategori');
    }

    public function delete($id)
    {
        $this->kategoriModel->delete($id);
        session()->setFlashdata("msg", "Data berhasil dihapus!");
        return redirect()->to('/kategori');
    }
}

