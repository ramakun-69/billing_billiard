<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_setting');
        $this->load->library('form_validation');
    }
    public function index()
    {
        chek_belom_login();
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['ddt'] = $this->m_setting->live_chanel()->result();
        $data['title'] = 'SKYgame | Laporan';
        $this->load->view('admin/header', $data);
        // $this->load->view('admin/sidebar');
        $this->load->view('admin/laporan');
        $this->load->view('admin/footer');
    }

    public function view_laporan()
    {
        $d = $this->input->post('data');
        $tgl1 = $this->input->post('tgl1');
        $tgl2 = date('Y-m-d', strtotime($this->input->post('tgl2')));
        if (isset($_POST['data'])) {
            if ($d == 1) {
                $data['tgl1'] = date('d-m-Y', strtotime($tgl1));
                $data['tgl2'] = date('d-m-Y', strtotime($tgl2));
                $data['v_dapat'] = $this->m_setting->live_pertanggal($tgl1, $tgl2);
                $this->load->view('admin/dt_lap_tgl', $data);
            } else if ($d == 2) {
                $data['tgl1'] = date('d-m-Y', strtotime($tgl1));
                $data['tgl2'] = date('d-m-Y', strtotime($tgl2));
                $data['v_dapat'] = $this->m_setting->live_pertanggal($tgl1, $tgl2);  // Update ini
                $this->load->view('admin/dt_laporan', $data);  // Asumsi bahwa dt_laporan view telah diperbarui untuk menangani data baru
            } else if ($d == 3) {
                $data['tgl1'] = date('d-m-Y', strtotime($tgl1));
                $data['tgl2'] = date('d-m-Y', strtotime($tgl2));
                $data['v_jual'] = $this->m_setting->live_penjualan($tgl1, $tgl2);
                $data['v_keluar'] = $this->m_setting->live_pengeluaran($tgl1, $tgl2);
                $data['v_dapat'] = $this->m_setting->live_pertanggal($tgl1, $tgl2);
                $this->load->view('admin/dt_lap_keseluruhan', $data);
            }
        } else {
            echo "Silahkan Chek lagi";
        }
    }
}
