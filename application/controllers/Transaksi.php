<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_setting');
        $this->load->library('form_validation');
    }

    public function penjualan()
    {
        $this->form_validation->set_rules('dbyr', 'Byrr', 'required|trim');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('test', '<div class="alert alert-danger" role="alert">Pastikan Form Tidak Kosong!</div>');
            redirect('dashboard/penjualan');
        } else {
            $b = $this->input->post('dbyr');
            $harga = str_replace("Rp.", "", $b);
            $hr = str_replace(".", "", $harga);
            $data = [
                'keterangan' => $this->input->post('keterangan'),
                'tgl_jual' => date('Y-m-d'),
                'total' => $hr
            ];

            $this->db->insert('penjualan', $data);

            $this->session->set_flashdata('test', '<div class="alert alert-success" role="alert">Data berhasil disimpan</div>');
            redirect('dashboard/penjualan');
        }
    }
    public function hapus_penjualan()
    {
        $id = $this->input->post('id');
        $this->db->where('id_penjualan', $id);
        $ok = $this->db->delete('penjualan');
        echo json_encode($ok);
    }

    public function edit_penjualan()
    {
        $this->form_validation->set_rules('ktr', 'Nama', 'required|trim');
        $this->form_validation->set_rules('tttl', 'Byrr', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('test', '<div class="alert alert-danger" role="alert">Pastikan Form Tidak Kosong!</div>');
            redirect('dashboard/penjualan');
        } else {
            // $b = $this->input->post('dbyr');
            // $harga = str_replace("Rp.", "", $b);
            // $hr = str_replace(".", "", $harga);
            $id = $this->input->post('id');
            $data = [
                'keterangan' => $this->input->post('ktr'),
                'total' =>  $this->input->post('tttl')
            ];
            $this->db->where('id_penjualan', $id);
            $this->db->update('penjualan', $data);
            $this->session->set_flashdata('test', '<div class="alert alert-success" role="alert">Update data berhasil disimpan</div>');
            redirect('dashboard/penjualan');
        }
    }

    public function pengeluaran()
    {
        $this->form_validation->set_rules('ktr', 'Nama', 'required|trim');
        $this->form_validation->set_rules('dbyr', 'Byrr', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('test', '<div class="alert alert-danger" role="alert">Pastikan Form Tidak Kosong!</div>');
            redirect('dashboard/pengeluaran');
        } else {
            $b = $this->input->post('dbyr');
            $harga = str_replace("Rp.", "", $b);
            $hr = str_replace(".", "", $harga);
            $data = [
                'keterangan' => $this->input->post('ktr'),
                'tgl_keluar' => date('Y-m-d'),
                'total' => $hr
            ];
            $this->db->insert('pengeluaran', $data);
            $this->session->set_flashdata('test', '<div class="alert alert-success" role="alert">Data berhasil disimpan</div>');
            redirect('dashboard/pengeluaran');
        }
    }

    public function hapus_pengeluaran()
    {
        $id = $this->input->post('id');
        $this->db->where('id_pengeluaran', $id);
        $ok = $this->db->delete('pengeluaran');
        echo json_encode($ok);
    }

    public function edit_pengeluaran()
    {
        $this->form_validation->set_rules('ktr', 'Nama', 'required|trim');
        $this->form_validation->set_rules('tttl', 'Byrr', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('test', '<div class="alert alert-danger" role="alert">Pastikan Form Tidak Kosong!</div>');
            redirect('dashboard/pengeluaran');
        } else {
            // $b = $this->input->post('dbyr');
            // $harga = str_replace("Rp.", "", $b);
            // $hr = str_replace(".", "", $harga);
            $id = $this->input->post('id');
            $data = [
                'keterangan' => $this->input->post('ktr'),
                'total' =>  $this->input->post('tttl')
            ];
            $this->db->where('id_pengeluaran', $id);
            $this->db->update('pengeluaran', $data);
            $this->session->set_flashdata('test', '<div class="alert alert-success" role="alert">Update data berhasil disimpan</div>');
            redirect('dashboard/pengeluaran');
        }
    }
}
