<?php

namespace App\Controllers;

use App\Models\DetailPembeliaModel;
use \App\Models\ProdukModel;
use \App\Models\KaryawanModel;
use \App\Models\PembelianModel;
use \App\Models\DetailPembelianModel;
use TCPDF;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Pembelian extends BaseController
{
    protected $helpers = ['auth', 'number'];
    private $produk, $cart, $karyawan, $pembelian, $detailPembelian;
    public function __construct()
    {
        $this->produk = new ProdukModel();
        $this->karyawan = new KaryawanModel();
        $this->pembelian = new PembelianModel();
        $this->detailPembelian = new DetailPembelianModel();
        $this->cart = \Config\Services::cart();
    }

    public function create()
    {
        $this->cart->destroy();
        $dataProduk = $this->produk->getProduk();
        $dataKaryawan = $this->karyawan->getKaryawan();
        $data = [
            'title' => 'pembelian',
            'dataProduk' => $dataProduk,
            'dataKaryawan' => $dataKaryawan,
        ];
        return view('pembelian/list', $data);
    }

    public function index()
    {
        $this->cart->destroy();
        $dataProduk = $this->produk->getProduk();
        $dataKaryawan = $this->karyawan->getKaryawan();
        $dataPembelian = $this->pembelian->getPembelian1();
        // dd($dataPenjualan);
        $data = [
            'title' => 'pembelian',
            'dataProduk' => $dataProduk,
            'dataKaryawan' => $dataKaryawan,
            'result' => $dataPembelian,
        ];
        return view('pembelian/index',
            $data
        );
    }

    public function detail($id)
    {
        $dataPembelian = $this->pembelian->getPembelian1($id);
        $data = [
            'title' => 'Data Pembelian',
            'result' => $dataPembelian
        ];
        return view('pembelian/detail', $data);
    }

    public function showCart()
    {
        //Fungsi menampilkan Cart
        $output = '';
        $no = 1;
        foreach ($this->cart->contents() as $items) {
            // $diskon = ($items['options']['discount'] / 100) * $items['subtotal'];
            $output .= '
            <tr>
            <td>' . $no++ . '</td>
            <td>' . $items['name'] . '</td>
            <td>' . $items['qty'] . '</td>
            <td>' . number_to_currency($items['price'], 'IDR', 'id_ID', 2) . '</td>
            <td>' . number_to_currency(($items['subtotal']), 'IDR', 'id_ID', 2) . '</td>
            <td>
            <td><button id="' . $items['rowid'] . '" qty="' . $items['qty'] . '"
            class="ubah_cart btn btn-warning btn-xs" title="Ubah Jumlah"><i class="fa
            fa-edit"></i></button>
            <button type="button" id="' . $items['rowid'] . '" class="hapus_cart btn btn-danger btn-xs"><i class="fa fa-trash" title="Hapus"></i></button>
            </td>
            </tr>
            ';
        }
        if (!$this->cart->contents()) {
            $output = '<tr><td colspan="7" align="center">Tidak ada transaksi!</td></tr>';
        }
        return $output;
    }

    public function loadCart()
    {
        //load data cart
        echo $this->showCart();
    }

    public function addCart()
    {
        $this->cart->insert(array(
            'id' => $this->request->getVar('id'),
            'qty' => $this->request->getVar('qty'),
            'price' => $this->request->getVar('price'),
            'name' => $this->request->getVar('name'),
            'options' => array(
                // 'discount' => $this->request->getVar('discount')
            )
        ));
        echo $this->showCart();
    }

    public function getTotal()
    {
        $totalBayar = 0;
        foreach ($this->cart->contents() as $items) {
            // $diskon = ($items['options']['discount'] / 100) * $items['subtotal'];
            $totalBayar += $items['subtotal'];
        }
        echo number_to_currency($totalBayar, 'IDR', 'id_ID', 2);
    }

    public function updateCart()
    {
        $this->cart->update(array(
            'rowid' => $this->request->getVar('rowid'),
            'qty' => $this->request->getVar('qty')
        ));
        echo $this->showCart();
    }

    public function deleteCart($rowid)
    {
        //fungsi untuk menghapus item cart
        $this->cart->remove($rowid);
        echo $this->showCart();
    }

    public function pembayaran()
    {
        // Cek Apakah Ada Transaksi yang dilakukan
        if (!$this->cart->contents()) {
            //Transaksi kosong
            $response = [
                'status' => false,
                'msg'   => "Tidak ada transaksi",
            ];
            echo json_encode($response);
        } else {
            //Cek customer
            $idkaryawan = $this->request->getVar('id-karyawan');
            if ($idkaryawan == null) {
                $response = [
                    'status' => false,
                    'msg'   => "Karyawan belum dipilih!",
                ];
                echo json_encode($response);
            } else {
                // Ada transaksi
                $totalBayar = 0;
                foreach ($this->cart->contents() as $items) {
                    $totalBayar += $items['subtotal'] ;
                }

                $nominal = $this->request->getVar('nominal');
                $id = "B" . time();

                // Cek apakah nominal yang dimasukkan cukup atau kurang
                if ($nominal < $totalBayar) {
                    $response = [
                        'status' => false,
                        'msg'   => "Nominal pembayaran kurang!",
                    ];
                    echo json_encode($response);
                } else {
                    // Jika nominal memenuhi, menyimpan data di table sale dan sale_detail
                    $this->pembelian->save([
                        'id_pembelian' => $id,
                        'id_pengguna' => session()->id_pengguna,
                        
                    ]);
                    foreach ($this->cart->contents() as $items) {
                        $this->detailPembelian->save([
                            'id_pembelian'   => $id,
                            'id_produk'   => $items['id'],
                            'jumlah'    => $items['qty'],
                            'harga'     => $items['price'],
                            // 'discount'  => $diskon,
                            'total_harga'   => $items['subtotal'],
                            'id_karyawan' => $idkaryawan,
                        ]);

                        //Mengurangi jumlah stok di tabel book
                        //Get Buku berdasarkan ID Buku
                        $produk = $this->produk->where(['id_produk' => $items['id']])->first();
                        $this->produk->save([
                            'id_produk' => $items['id'],
                            'stok_produk' => $produk['stok_produk'] + $items['qty'],
                        ]);
                    }

                    $this->cart->destroy();
                    $kembalian = $nominal - $totalBayar;
                    $response = [
                        'status' => true,
                        'msg' => "Pembayaran berhasil!",
                        'data' => [
                            'kembalian' => number_to_currency(
                                $kembalian,
                                'IDR',
                                'id_ID',
                                2
                            )
                        ]
                    ];
                    echo json_encode($response);
                }
            }
        }
    }

    public function report($tgl_awal = null, $tgl_akhir = null)
    {
        $_SESSION['tgl_awal'] = $tgl_awal == null ? date('Y-m-01') : $tgl_awal;
        $_SESSION['tgl_akhir'] = $tgl_awal == null ? date('Y-m-t') : $tgl_akhir;

        $tgl1 = $_SESSION['tgl_awal'];
        $tgl2 =  $_SESSION['tgl_akhir'];

        $report = $this->pembelian->getReport($tgl1, $tgl2);
        // dd($report);
        $data = [
            'title' => 'Laporan Pembelian',
            'result' => $report,
            'tanggal' => [
                'tgl_awal' => $tgl1,
                'tgl_akhir' => $tgl2,
            ],
        ];
        return view('pembelian/report', $data);
    }

    public function exportPDF()
    {
        $tgl1 = $_SESSION['tgl_awal'];
        $tgl2 =  $_SESSION['tgl_akhir'];

        $report = $this->pembelian->getReport($tgl1, $tgl2);
        $data = [
            'title' => 'Laporan Pembelian',
            'result' => $report,
        ];
        $html = view('pembelian/exportPDF', $data);

        $pdf = new TCPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);
        $pdf->AddPage();
        $pdf->writeHTML($html);
        $this->response->setContentType('application/pdf');
        $pdf->Output('laporan-pembelian.pdf', 'I');
    }

    public function exportExcel()
    {
        $tgl1 = $_SESSION['tgl_awal'];
        $tgl2 = $_SESSION['tgl_akhir'];

        $report = $this->pembelian->getReport($tgl1, $tgl2);

        $spreadsheet = new Spreadsheet();
        // tulis header/nama kolom
        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'No')
            ->setCellValue('B1', 'Nota')
            ->setCellValue('C1', 'Tgl Transaksi')
            // ->setCellValue('D1', 'User')
            ->setCellValue('D1', 'Karyawan')
            ->setCellValue('E1', 'Total');

        // tulis data mobil ke cell
        $rows = 2;
        $no = 1;
        foreach ($report as $value) {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A' . $rows, $no++)
                ->setCellValue('B' . $rows, $value['id_pembelian'])
                ->setCellValue('C' . $rows, $value['tgl_transaksi'])
                // ->setCellValue('D' . $rows, $value['nama'])
                ->setCellValue('D' . $rows, $value['nama_karyawan'])
                ->setCellValue('E' . $rows, $value['total']);
            $rows++;
        }
        // tulis dalam format /xlsx
        $writer = new Xlsx($spreadsheet);
        $filename = 'Laporan-Pembelian';

        // redirect hasil generate xlsx ke web client
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=' . $filename . '.xlsx');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }

    public function filter()
    {
        $_SESSION['tgl_awal'] = $this->request->getVar('tgl_awal');
        $_SESSION['tgl_akhir'] = $this->request->getVar('tgl_akhir');
        return $this->report($_SESSION['tgl_awal'], $_SESSION['tgl_akhir']);
    }
}
