<?php

namespace App\Controllers;

use \App\Models\ProdukModel;
// use \App\Models\CategoryModel;
use Kint\Zval\Value;
use PhpOffice\PhpSpreadsheet\Reader\Xls;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use PhpParser\Node\Stmt\Continue_;

class Produk extends BaseController
{
    private $produkModel;
    public function  __construct()
    {
        $this->produkModel = new ProdukModel();
        // $this->catModel = new CategoryModel();
    }

    public function index()
    {
        $dataProduk = $this->produkModel->getProduk();
        $data = [
            'title' => 'Data Produk',
            'result' => $dataProduk
        ];
        return view('produk/index', $data);
    }
    public function detail($slug)
    {
        $dataProduk = $this->produkModel->getProduk($slug);
        $data = [
            'title' => 'Data Buku',
            'result' => $dataProduk
        ];
        return view('produk/detail', $data);
    }
    
    public function create()
    {
        session();
        $data = [
            'title' => 'Tambah Produk',
            // 'category' => $this->catModel->findAll(),
            'validation' => \Config\Services::validation()
        ];
        return view('produk/create', $data);
        dd(\Config\Services::validation()->getErrors());
    }
    public function save()
    {
        if (!$this->validate([
            'nama_produk' =>
            [
                'rules' => 'required|is_unique[produk.nama_produk]',
                'label' => 'nama_produk',
                'errors' => [
                    'required' => '{field} harus di isi',
                    'is_unique' => '{field} hanya sudah ada'
                ]
            ],
            'stok_produk' =>
            [
                'rules' => 'required|integer',
                'label' => 'stok_produk',
                'errors' => [
                    'required' => '{field} harus di isi',
                    'is_unique' => '{field} hanya sudah ada'
                ]
            ],

            'harga' =>
            [
                'rules' => 'required|numeric',
                'label' => 'harga',
                'errors' => [
                    'required' => '{field} harus di isi',
                    'is_unique' => '{field} hanya sudah ada'
                ]
            ],

            'cover' => [
                'rules' => 'max_size[cover,1024]|is_image[cover]|mime_in[cover,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Gambar tidak boleh lebih dari 1MB!',
                    'is_image' => 'Yang anda pilih bukan gambar!',
                    'mime_in' => 'Yang anda pilih bukan gambar!',
                ]
            ],
        ])) {
            $data = [
                'title' => 'Tambah Produk',
                // 'category' => $this->catModel->findAll(),
                'validation' => $this->validator
            ];
            // return view('/book/create', $data);
            // dd(\Config\Services::validation()->getErrors());
            return redirect()->to('/produk/create')->withInput();
        }
        // Mengambil file sampul
        $fileCover = $this->request->getFile('cover');
        if ($fileCover->getError() == 4){
            $namaFile = $this->defaultImage;
        }else{
            //generate Nama file
            $namaFile = $fileCover->getRandomName();
            // Pindahan File ke folder img di public
            $fileCover->move('img', $namaFile);
        }

        $slug = url_title($this->request->getVar('nama_produk'), '-', true);
        $this->produkModel->save([
            
            'nama_produk' => $this->request->getVar('nama_produk'),
            'stok_produk' => $this->request->getVar('stok_produk'),
            'harga' => $this->request->getVar('harga'),
            'cover' => $namaFile
        ]);

        session()->setFlashdata('msg', "Data Berhasil di Tambahkan");
        return redirect()->to('/produk');
    }

    public function edit($id)
    {
        $dataProduk = $this->produkModel->getProduk($id);
        if (empty($dataProduk)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("data $id tidak ditemukan");
        }
        $data = [
            'title' => 'Edit Produk',
            // 'category' => $this->catModel->findAll(),
            'validation' => \Config\Services::validation(),
            'result' => $dataProduk
        ];
        return view('produk/edit', $data);
    }

    public function update($id)
    {
        $dataOld = $this->produkModel->getProduk($this->request->getVar('id_produk'));
        // if ($dataOld['id_produk'] == $this->request->getVar('id_produk')) {
        //     $rule_title = 'required';
        // } else {
        //     $rule_title = 'required|is_unique[produk.id_produk]';
        // }

        if (!$this->validate([
            'nama_produk' => [
                'rules' => 'required',
                'label' => 'nama_produk',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'is_unique' => '{field} hanya sudah ada'
                ]
            ],
            'harga' => [
                'rules'
                => 'required|decimal',
            ],
            
            'stok_produk' => [
                'rules' => 'required|integer',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'integer' => '{field) hanya boleh angka'
                ]
            ],
            'cover' => [
                'rules' => 'max_size[cover,1024]|is_image[cover]|mime_in[cover,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Gambar tidak boleh lebih dari 1MB!',
                    'is_image' => 'Yang anda pilih bukan gambar!',
                    'mime_in' => 'Yang anda pilih bukan gambar!',
                ]
            ],
        ])) {
            $data = [
                'title' => 'Edit Produk',
                // 'category' => $this->catModel->findAll(),
                'validation' => $this->validator,
                'result' => $dataOld
            ];
            // return view('/book/edit', $data);
            // dd(\Config\Services::validation()->getErrors());
            return redirect()->to('/produk/edit/' . $this->request->getVar('id_produk'))->withInput();
        }

        $namaFileLama = $this->request->getVar('coverlama');
        //Mengambil File Sampul
        $fileCover = $this->request->getFile('cover');
        //Cek gamber, apakah masih gambar lama
        if ($fileCover->getError() == 4){
            $namaFile = $namaFileLama;
        } else {
            //generate Nama file
            $namaFile = $fileCover->getRandomName();
            //Pindahkan File ke Folder img di public
            $fileCover->move('img', $namaFile);

            // Jika sampulnya default
            if ($namaFileLama != $this->defaultImage && $namaFileLama != "") {
                // hapus gambar
                unlink('img/' . $namaFileLama);
            }
        }

        $id = url_title($this->request->getVar('id_produk'), '-', true);
        $this->produkModel->save([
            'id_produk' => $id,
            'nama_produk' => $this->request->getVar('nama_produk'),
            'stok_produk' => $this->request->getVar('stok_produk'),
            'harga' => $this->request->getVar('harga'),
            'cover' => $namaFile
        ]);

        session()->setFlashdata("msg", "Data berhasil diubah!");
        return redirect()->to('/produk');
    }
    public function delete($id)
    {
        // Cari gambar by ID
        $dataProduk = $this->produkModel->find($id);
        $this->produkModel->delete($id);

        //jika sampulnya default
        if ($dataProduk['cover'] != $this->defaultImage) {
            //hapus image
            unlink('img/' . $dataProduk['cover']);
        }

        session()->setFlashdata("msg", "Data berhasil dihapus!");
        return redirect()->to('/produk');
    }

    // public function importData()
    // {
    //     $file = $this->request->getFile("file");
    //     $ext = $file->getExtension();
    //     if ($ext == "xls")
    //         $reader = new Xls();
    //     else
    //         $reader = new Xlsx();

    //     $spreadsheet = $reader->load($file);
    //     $sheet = $spreadsheet->getActiveSheet()->toArray();

    //     foreach ($sheet as $key => $value) {
    //         if ($key == 0) continue;

    //         $namaFile = $this->defaultImage;
    //         $slug = url_title($value[1], '-', true);

    //         //Cek judul
    //         $dataOld = $this->bookModel->getBook($slug);
    //         // dd($dataOld);
    //         if (!$dataOld) {
    //             $this->bookModel->save([
    //             'title' => $value[1],
    //             'author' => $value[2],
    //             'release_year' => $value[3],
    //             'price' => $value[4],
    //             'discount' => $value[5] ?? 0,
    //             'stock' => $value[6],
    //             'book_category_id' => $value[7],
    //             'slug' => $slug,
    //             'cover' => $namaFile
    //             ]);
    //         }
    //     }
    //     session()->setFlashdata("msg", "Data berhasil diimport!");

    //     return redirect()->to('/book');
    // }
}
