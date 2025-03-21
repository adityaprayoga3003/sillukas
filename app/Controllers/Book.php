<?php

namespace App\Controllers;

use \App\Models\BookModel;
use \App\Models\CategoryModel;
use Kint\Zval\Value;
use PhpOffice\PhpSpreadsheet\Reader\Xls;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use PhpParser\Node\Stmt\Continue_;

class Book extends BaseController
{
    private $bookModel, $catModel;
    public function  __construct()
    {
        $this->bookModel = new BookModel();
        $this->catModel = new CategoryModel();
    }

    public function index()
    {
        $dataBook = $this->bookModel->getBook();
        $data = [
            'title' => 'Data Buku',
            'result' => $dataBook
        ];
        return view('book/index', $data);
    }
    public function detail($slug)
    {
        $dataBook = $this->bookModel->getBook($slug);
        $data = [
            'title' => 'Data Buku',
            'result' => $dataBook
        ];
        return view('book/detail', $data);
    }
    public function create()
    {
        session();
        $data = [
            'title' => 'Tambah Buku',
            'category' => $this->catModel->findAll(),
            'validation' => \Config\Services::validation()
        ];
        return view('book/create', $data);
        dd(\Config\Services::validation()->getErrors());
    }
    public function save()
    {
        if (!$this->validate([
            'title' =>
            [
                'rules' => 'required|is_unique[book.title]',
                'label' => 'Judul',
                'errors' => [
                    'required' => '{field} harus di isi',
                    'is_unique' => '{field} hanya sudah ada'
                ]
            ],
            'author' =>
            [
                'rules' => 'required|integer',
                'label' => 'Penulis',
                'errors' => [
                    'required' => '{field} harus di isi',
                    'is_unique' => '{field} hanya sudah ada'
                ]
            ],

            'release_year' =>
            [
                'rules' => 'required|integer',
                'label' => 'Tahun Terbit',
                'errors' => [
                    'required' => '{field} harus di isi',
                    'is_unique' => '{field} hanya sudah ada'
                ]
            ],
            'price' =>
            [
                'rules' => 'required|numeric',
                'label' => 'Harga',
                'errors' => [
                    'required' => '{field} harus di isi',
                    'is_unique' => '{field} hanya sudah ada'
                ]
            ],
            'discount' =>
            [
                'rules' => 'permit_empty|decimal',
                'label' => 'Diskon',
                'errors' => [
                    'required' => '{field} harus di isi',
                    'is_unique' => '{field} hanya sudah ada'
                ]
            ],
            'stock' => [
                'rules' => 'required|integer',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'integer' => '{field) hanya boleh angka'
                ]
            ],
            'cover' => 
            [
                'rules' => 'max_size[cover,1024]|is_image[cover]|mime_in[cover,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Gambar tidak boleh lebih dari 1MB!',
                    'is_image' => 'Yang anda pilih bukan gambar!',
                    'mime_in' => 'Yang anda pilih bukan gambar!',
                ]
            ],
        ])) {
            $data = [
                'title' => 'Tambah Buku',
                'category' => $this->catModel->findAll(),
                'validation' => $this->validator
            ];
            // return view('/book/create', $data);
            dd(\Config\Services::validation()->getErrors());
            return redirect()->to('/book/create')->withInput();
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

        $slug = url_title($this->request->getVar('title'), '-', true);
        $this->bookModel->save([
            'title' => $this->request->getVar('title'),
            'author' => $this->request->getVar('author'),
            'release_year' => $this->request->getVar('release_year'),
            'price' => $this->request->getVar('price'),
            'discount' => $this->request->getVar('discount'),
            'stock' => $this->request->getVar('stock'),
            'book_category_id' => $this->request->getVar('book_category_id'),
            'slug' => $slug,
            'cover' => $namaFile
        ]);

        session()->setFlashdata('msg', "Data Berhasil di Tambahkan");
        return redirect()->to('/book');
    }

    public function edit($slug)
    {
        $dataBook = $this->bookModel->getBook($slug);
        if (empty($dataBook)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Judul buku $slug tidak ditemukan");
        }
        $data = [
            'title' => 'Ubah Buku',
            'category' => $this->catModel->findAll(),
            'validation' => \Config\Services::validation(),
            'result' => $dataBook
        ];
        return view('book/edit', $data);
    }

    public function update($id)
    {
        $dataOld = $this->bookModel->getBook($this->request->getVar('slug'));
        if ($dataOld['title'] == $this->request->getVar('title')) {
            $rule_title = 'required';
        } else {
            $rule_title = 'required|is_unique[book.title]';
        }

        if (!$this->validate([
            'title' => [
                'rules' => $rule_title,
                'label' => 'Judul',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'is_unique' => '{field) hanya sudah ada'
                ]
            ],
            'author' => 'required',
            'release_year' => 'required|integer',
            'price' => 'required|numeric',
            'discount' => 'permit_empty|decimal',
            // 'stock' => 'required|integer',
            'stock' => [
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
                'title' => 'Ubah Buku',
                'category' => $this->catModel->findAll(),
                'validation' => $this->validator,
                'result' => $dataOld
            ];
            // return view('/book/edit', $data);
            // dd(\Config\Services::validation()->getErrors());
            return redirect()->to('/book/edit/' . $this->request->getVar('slug'))->withInput();
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

        $slug = url_title($this->request->getVar('title'), '-', true);
        $this->bookModel->save([
            'book_id' => $id,
            'title' => $this->request->getVar('title'),
            'author' => $this->request->getVar('author'),
            'release_year' => $this->request->getVar('release_year'),
            'price' => $this->request->getVar('price'),
            'discount' => $this->request->getVar('discount'),
            'stock' => $this->request->getVar('stock'),
            'book_category_id' => $this->request->getVar('book_category_id'),
            'slug' => $slug,
            'cover' => $namaFile
        ]);

        session()->setFlashdata("msg", "Data berhasil diubah!");
        return redirect()->to('/book');
    }
    public function delete($id)
    {
        // Cari gambar by ID
        $dataBook = $this->bookModel->find($id);
        $this->bookModel->delete($id);

        //jika sampulnya default
        if ($dataBook['cover'] != $this->defaultImage) {
            //hapus image
            unlink('img/' . $dataBook['cover']);
        }

        session()->setFlashdata("msg", "Data berhasil dihapus!");
        return redirect()->to('/book');
    }

    public function importData()
    {
        $file = $this->request->getFile("file");
        $ext = $file->getExtension();
        if ($ext == "xls")
            $reader = new Xls();
        else
            $reader = new Xlsx();

        $spreadsheet = $reader->load($file);
        $sheet = $spreadsheet->getActiveSheet()->toArray();

        foreach ($sheet as $key => $value) {
            if ($key == 0) continue;

            $namaFile = $this->defaultImage;
            $slug = url_title($value[1], '-', true);

            //Cek judul
            $dataOld = $this->bookModel->getBook($slug);
            // dd($dataOld);
            if (!$dataOld) {
                $this->bookModel->save([
                'title' => $value[1],
                'author' => $value[2],
                'release_year' => $value[3],
                'price' => $value[4],
                'discount' => $value[5] ?? 0,
                'stock' => $value[6],
                'book_category_id' => $value[7],
                'slug' => $slug,
                'cover' => $namaFile
                ]);
            }
        }
        session()->setFlashdata("msg", "Data berhasil diimport!");

        return redirect()->to('/book');
    }
}
