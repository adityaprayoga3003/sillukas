<?php

namespace App\Controllers;

use App\Models\DetailTransaksiCukurModel;
use \App\Models\PelangganModel;
use \App\Models\KaryawanModel;
use \App\Models\CukurModel;
use App\Models\IncomeModel;
use \App\Models\KategoriCukurModel;
use TCPDF;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Cukur extends BaseController
{
    protected $helpers = ['auth', 'number'];
    private $pelanggan, $cart, $karyawan, $cukur, $detailCukur, $kategori, $income;
    public function __construct()
    {
        $this->pelanggan = new PelangganModel();
        $this->karyawan = new KaryawanModel();
        $this->cukur = new CukurModel();
        $this->detailCukur = new DetailTransaksiCukurModel();
        $this->kategori = new KategoriCukurModel();
        $this->income = new IncomeModel();
        $this->cart = \Config\Services::cart();
    }

    public function create()
    {
        $this->cart->destroy();
        $dataPelanggan = $this->pelanggan->getPelanggan();
        $dataKaryawan = $this->karyawan->getKaryawan();
        $dataKategori = $this->kategori->getKategori();
        $data = [
            'title' => 'cukur',
            'dataPelanggan' => $dataPelanggan,
            'dataKaryawan' => $dataKaryawan,
            'dataKategori' => $dataKategori,
        ];
        return view('cukur/list', $data);
    }

    public function index()
    {
        $this->cart->destroy();
        $dataPelanggan = $this->pelanggan->getPelanggan();
        $dataKaryawan = $this->karyawan->getKaryawan();
        $dataCukur = $this->cukur->getCukur1();
        // dd($dataPenjualan);
        $data = [
            'title' => 'cukur',
            'dataPelanggan' => $dataPelanggan,
            'dataKaryawan' => $dataKaryawan,
            'result' => $dataCukur,
        ];
        return view(
            'cukur/index',
            $data
        );
    }

    public function detail($id)
    {
        $dataCukur = $this->cukur->getCukur1($id);
        $data = [
            'title' => 'Data Cukur',
            'result' => $dataCukur
        ];
        return view('cukur/detail', $data);
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
            // 'options' => array(
            //     'discount' => $this->request->getVar('discount')
            // )
        ));
        echo $this->showCart();
    }

    public function getTotal()
    {
        $totalBayar = 0;
        foreach ($this->cart->contents() as $items) {
            $diskon = $this->request->getVar('diskon');
            $diskon1 = ($diskon/100) * $items['subtotal'];
            $totalBayar += $items['subtotal'] - $diskon1;
        }
        // json_encode(number_to_currency($totalBayar, 'IDR', 'id_ID', 2));
        // Format totalBayar ke dalam format JSON
        $response = [
            'total' => number_to_currency($totalBayar, 'IDR', 'id_ID', 2)
        ];
        echo json_encode($response);
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
            $idpelanggan = $this->request->getVar('id-pelanggan');
            // $idkategori = $this->request->getVar('id-cukur');
            if ($idpelanggan == null) {
                $response = [
                    'status' => false,
                    'msg'   => "Pelanggan belum dipilih!",
                ];
                echo json_encode($response);
            } else {
                if ($idkaryawan == null) {
                    $response = [
                        'status' => false,
                        'msg'   => "Karyawan belum dipilih!",
                    ];
                    echo json_encode($response);
                } else {
                    $diskon = $this->request->getVar('diskon');
                    if($diskon == null) {
                        $response = [
                            'status' => false,
                            'msg'   => "Diskon belum dipilih!",
                        ];
                        echo json_encode($response);
                    } else {
                        // Ada transaksi
                        $totalBayar = 0;

                        foreach ($this->cart->contents() as $items) {
                            $diskon = $this->request->getVar('diskon');
                            $diskon1 = ($diskon / 100) * $items['subtotal'];
                            $totalBayar += $items['subtotal'] - $diskon1;
                        }

                        $nominal = $this->request->getVar('nominal');
                        $id = "C" . time();

                        // Cek apakah nominal yang dimasukkan cukup atau kurang
                        if ($nominal < $totalBayar) {
                            $response = [
                                'status' => false,
                                'msg'   => "Nominal pembayaran kurang!",
                            ];
                            echo json_encode($response);
                        } else {
                            // Jika nominal memenuhi, menyimpan data di table sale dan sale_detail
                            $cartContents = $this->cart->contents();
                            foreach ($cartContents as $item) {
                                $idItem = $item['id'];
                                $this->cukur->insert([
                                    'id_transaksicukur' => $id,
                                    'id_pengguna' => session()->id_pengguna,
                                    'id_pelanggan' => $idpelanggan,
                                    'id'   => $idItem
                                ]);

                            }
                            // $kategoricukur = $this->request->getVar('name');

                            



                            foreach ($this->cart->contents() as $items) {
                                $this->detailCukur->save([
                                    'id_transaksicukur'   => $id,
                                    'id_karyawan' => $idkaryawan,
                                    // 'id'   => $items['id'],
                                    'jumlah'    => $items['qty'],
                                    'harga'     => $items['price'],
                                    'diskon'  => $diskon,
                                    'total_harga'   => $totalBayar,
                                ]);
                                foreach ($this->cart->contents() as $items) {
                                    $this->income->insert([
                                        'id'   => $id,
                                        'total_harga'   => $totalBayar,
                                    ]);
                                }
                                //Mengurangi jumlah stok di tabel book
                                //Get Buku berdasarkan ID Buku
                                $pelanggan = $this->pelanggan->where(['id_pelanggan' => $idpelanggan])->first();
                                $this->pelanggan->save([
                                    'id_pelanggan' => $idpelanggan,
                                    'jumlah_cukur' => $pelanggan['jumlah_cukur'] + $items['qty'],
                                ]);

                                $pelanggan = $this->pelanggan->where(['id_pelanggan' => $idpelanggan])->first();
                                if ($pelanggan['jumlah_cukur'] == 6) {
                                    // If it is, reset jumlah_cukur to 0
                                    $this->pelanggan->save([
                                        'id_pelanggan' => $idpelanggan,
                                        'jumlah_cukur' => 0,
                                    ]);
                                }
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
        }
    }

    public function report($tgl_awal = null, $tgl_akhir = null)
    {
        $_SESSION['tgl_awal'] = $tgl_awal == null ? date('Y-m-01') : $tgl_awal;
        $_SESSION['tgl_akhir'] = $tgl_awal == null ? date('Y-m-t') : $tgl_akhir;

        $tgl1 = $_SESSION['tgl_awal'];
        $tgl2 =  $_SESSION['tgl_akhir'];

        $report = $this->cukur->getReport($tgl1, $tgl2);
        // dd($report);
        $data = [
            'title' => 'Laporan Cukur',
            'result' => $report,
            'tanggal' => [
                'tgl_awal' => $tgl1,
                'tgl_akhir' => $tgl2,
            ],
        ];
        return view('cukur/report', $data);
    }

    public function exportPDF()
    {
        $tgl1 = $_SESSION['tgl_awal'];
        $tgl2 =  $_SESSION['tgl_akhir'];

        $report = $this->cukur->getReport($tgl1, $tgl2);
        $data = [
            'title' => 'Laporan Cukur',
            'result' => $report,
        ];
        $html = view('cukur/exportPDF', $data);

        $pdf = new TCPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);
        $pdf->AddPage();
        $pdf->writeHTML($html);
        $this->response->setContentType('application/pdf');
        $pdf->Output('laporan-cukur.pdf', 'I');
    }

    public function exportExcel()
    {
        $tgl1 = $_SESSION['tgl_awal'];
        $tgl2 = $_SESSION['tgl_akhir'];

        $report = $this->cukur->getReport($tgl1, $tgl2);

        $spreadsheet = new Spreadsheet();
        // tulis header/nama kolom
        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'No')
            ->setCellValue('B1', 'Nota')
            ->setCellValue('C1', 'Tgl Transaksi')
            ->setCellValue('D1', 'Pelanggan')
            ->setCellValue('E1', 'Jenis Cukur')
            ->setCellValue('F1', 'Karyawan')
            ->setCellValue('G1', 'Total');

        // tulis data mobil ke cell
        $rows = 2;
        $no = 1;
        foreach ($report as $value) {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A' . $rows, $no++)
                ->setCellValue('B' . $rows, $value['id_transaksicukur'])
                ->setCellValue('C' . $rows, $value['tgl_transaksi'])
                ->setCellValue('D' . $rows, $value['nama_pelanggan'])
                ->setCellValue('E' . $rows, $value['nama_kategori'])
                ->setCellValue('F' . $rows, $value['nama_karyawan'])
                ->setCellValue('G' . $rows, $value['total']);
            $rows++;
        }
        // tulis dalam format /xlsx
        $writer = new Xlsx($spreadsheet);
        $filename = 'Laporan-Cukur';

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
