<?php
defined('BASEPATH') or exit('No direct script access allowed');

require 'vendor/autoload.php';

use Dompdf\Dompdf;

class Generate_Pdf extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Report_model');
    }

    public function index($tgl1 = null, $tgl2 = null)
    {
        // cek apakah tanggal valid
        if ($tgl1 === null || $tgl2 === null) {
            show_error('Tanggal tidak valid');
            return;
        }

        // buat objek Dompdf baru
        $dompdf = new Dompdf();

        // ambil data laporan dari model
        $data['v_dapat'] = $this->Report_model->get_report_by_date($tgl1, $tgl2);

        // tambahkan variabel lain yang diperlukan oleh view
        $data['tgl1'] = $tgl1;
        $data['tgl2'] = $tgl2;

        // render view sebagai string
        $html = $this->load->view('dt_lap_tgl', $data, true);

        // memuat HTML yang akan dijadikan PDF
        $dompdf->loadHtml($html);

        // mengatur ukuran kertas dan orientasi
        $dompdf->setPaper('A4', 'portrait');

        // merender HTML sebagai PDF
        $dompdf->render();

        // menghasilkan string PDF
        $pdf = $dompdf->output();

        // menulis string PDF ke file
        file_put_contents('Downloads/report.pdf', $pdf);
    }
}
