<?php

namespace App\Controllers;

use \App\Models\KomikModel;
use App\Models\CategoryModelKomik;
use Kint\Zval\Value;
use PhpOffice\PhpSpreadsheet\Reader\Xls;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use PhpParser\Node\Stmt\Continue_;

class Komik extends BaseController
{
    private $komikModel, $catModel;
    public function __construct()
    {
        $this->komikModel = new KomikModel();
        $this->catModel = new CategoryModelKomik();
    }

    public function index()
    {
        $dataBook = $this->komikModel->getkomik();
        $data = [
            'title' => 'Data Komik',
            'result' => $dataBook
        ];
        return view('komik/index', $data);
    }

    public function detail($slug)
    {
        $dataBook = $this->komikModel->getkomik($slug);
        $data = [
            'title' => 'Detail Komik',
            'result' => $dataBook
        ];
        return view('komik/detail', $data);
    }

    public function create()
    {
        session();
        $data = [
            'title' => 'Tambah Komik',
            'category' => $this->catModel->findAll(),
            'validation' => \Config\Services::validation()
        ];
        return view('komik/create', $data);
    }

    public function save()
    {
        if (!$this->validate([
            'judul' =>
            [
                'rules' => 'required|is_unique[komik.judul]',
                'label' => 'Judul',
                'errors' => [
                    'required' => '{field} harus di isi',
                    'is_unique' => '{field} hanya sudah ada'
                ]
            ],

            'tahun_rilis' =>
            [
                'rules' => 'required|integer',
                'label' => 'Tahun Terbit',
                'errors' => [
                    'required' => '{field} harus di isi',
                    'is_unique' => '{field} hanya sudah ada'
                ]
            ],
            'harga' =>
            [
                'rules' => 'required|numeric',
                'label' => 'Harga',
                'errors' => [
                    'required' => '{field} harus di isi',
                    'is_unique' => '{field} hanya sudah ada'
                ]
            ],
            'diskon' =>
            [
                'rules' => 'permit_empty|decimal',
                'label' => 'Diskon',
                'errors' => [
                    'required' => '{field} harus di isi',
                    'is_unique' => '{field} hanya sudah ada'
                ]
            ],
            'stok' => [
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
                'title' => 'Tambah Komik',
                'category' => $this->catModel->findAll(),
                'validation' => $this->validator
            ];
            // return view('/komik/create', $data);
            // dd(\Config\Services::validation()->getErrors());
            return redirect()->to('/komik/create')->withInput();
        }
        // Mengambil file sampul
        $fileCover = $this->request->getFile('cover');
        if ($fileCover->getError() == 4) {
            $namaFile = $this->defaultImage;
        } else {
            //generate Nama file
            $namaFile = $fileCover->getRandomName();
            // Pindahan File ke folder img di public
            $fileCover->move('img', $namaFile);
        }

        $slug = url_title($this->request->getVar('judul'), '-', true);
        $this->komikModel->save([
            'judul' => $this->request->getVar('judul'),
            'penulis' => $this->request->getVar('penulis'),
            'tahun_rilis' => $this->request->getVar('tahun_rilis'),
            'harga' => $this->request->getVar('harga'),
            'diskon' => $this->request->getVar('diskon'),
            'stok' => $this->request->getVar('stok'),
            'komik_category_id' => $this->request->getVar('komik_category_id'),
            'slug' => $slug,
            'cover' => $namaFile
        ]);

        session()->setFlashdata('msg', "Data Berhasil di Tambahkan");
        return redirect()->to('/komik');
    }

    public function edit($slug)
    {
        $dataBook = $this->komikModel->getkomik($slug);
        if (empty($dataBook)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Judul buku $slug tidak ditemukan");
        }
        $data = [
            'title' => 'Ubah Komik',
            'category' => $this->catModel->findAll(),
            'validation' => \Config\Services::validation(),
            'result' => $dataBook
        ];
        return view('komik/edit', $data);
    }

    public function update($id)
    {
        $dataOld = $this->komikModel->getkomik($this->request->getVar('slug'));
        if ($dataOld['judul'] == $this->request->getVar('judul')) {
            $rule_title = 'required';
        } else {
            $rule_title = 'required|is_unique[komik.judul]';
        }

        if (!$this->validate([
            'judul' => [
                'rules' => $rule_title,
                'label' => 'Judul',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'is_unique' => '{field) hanya sudah ada'
                ]
            ],
            'penulis' => 'required',
            'tahun_rilis' => 'required|integer',
            'harga' => 'required|numeric',
            'diskon' => 'permit_empty|decimal',
            // 'stock' => 'required|integer',
            'stok' => [
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
                'title' => 'Ubah Komik',
                'category' => $this->catModel->findAll(),
                'validation' => $this->validator,
                'result' => $dataOld
            ];
            // return view('/komik/edit', $data);
            // dd(\Config\Services::validation()->getErrors());
            return redirect()->to('/komik/edit/' . $this->request->getVar('slug'))->withInput();
        }

        $namaFileLama = $this->request->getVar('coverlama');
        //Mengambil File Sampul
        $fileCover = $this->request->getFile('cover');
        //Cek gamber, apakah masih gambar lama
        if ($fileCover->getError() == 4) {
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

        $slug = url_title($this->request->getVar('judul'), '-', true);
        $this->komikModel->save([
            'komik_id' => $id,
            'judul' => $this->request->getVar('judul'),
            'penulis' => $this->request->getVar('penulis'),
            'tahun_rilis' => $this->request->getVar('tahun_rilis'),
            'harga' => $this->request->getVar('harga'),
            'diskon' => $this->request->getVar('diskon'),
            'stok' => $this->request->getVar('stok'),
            'komik_category_id' => $this->request->getVar('komik_category_id'),
            'slug' => $slug,
            'cover' => $namaFile
        ]);

        session()->setFlashdata("msg", "Data berhasil diubah!");
        return redirect()->to('/komik');
    }
    public function delete($id)
    {
        // Cari gambar by ID
        $dataBook = $this->komikModel->find($id);
        $this->komikModel->delete($id);

        //jika sampulnya default
        if ($dataBook['cover'] != $this->defaultImage) {
            //hapus image
            unlink('img/' . $dataBook['cover']);
        }

        session()->setFlashdata("msg", "Data berhasil dihapus!");
        return redirect()->to('/komik');
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
            $dataOld = $this->komikModel->getkomik($slug);
            // dd($dataOld);
            if(!$dataOld) {
                $this->komikModel->save([
                    'judul' => $value[1],
                    'penulis' => $value[2],
                    'tahun_rilis' => $value[3],
                    'harga' => $value[4],
                    'diskon' => $value[5] ?? 0,
                    'stok' => $value[6],
                    'komik_category_id' => $value[7],
                    'slug' => $slug,
                    'cover' => $namaFile
                ]);
            }
        }
        session()->setFlashdata("msg", "Data berhasil diimport!");

        return redirect()->to('/komik');
    }
}
