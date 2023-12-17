<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Setting extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_setting');
        $this->load->library('form_validation');
    }
    public function chanel()
    {
        chek_belom_login();
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->form_validation->set_rules('nama', 'nama', 'required|trim');
        if ($this->form_validation->run() == false) {
            $data['ddt'] = $this->m_setting->live_chanel()->result();
            $data['title'] = 'SKYgame | Data Chanel';
            $this->load->view('admin/header', $data);
            // $this->load->view('admin/sidebar');
            $this->load->view('admin/chanel');
            $this->load->view('admin/footer');
        } else {
            $dataa = [
                'nama_chanel' => $this->input->post('nama'),
                'status' => 'N'
            ];
            $this->db->insert('chanel', $dataa);
            $this->session->set_flashdata('test', '<div class="alert alert-success" role="alert">Data berhasil disimpan</div>');
            redirect('setting/chanel');
        }
    }

    public function hapus()
    {
        $a = $this->input->post('id');
        $this->db->where('id_chanel', $a);
        $ss = $this->db->delete('chanel');
        echo json_encode($ss);
    }

    public function edit()
    {
        $id = $this->input->post('id');
        $data = [
            'nama_chanel' => $this->input->post('nama')
        ];
        $this->db->where('id_chanel', $id);
        $this->db->update('chanel', $data);
        $this->session->set_flashdata('test', '<div class="alert alert-success" role="alert">Edit data berhasil disimpan</div>');
        redirect('setting/chanel');
    }



    public function harga()
    {
        chek_belom_login();
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['ddt'] = $this->m_setting->live_harga()->result();
        $data['title'] = 'SKYgame | Data Harga';
        $this->load->view('admin/header', $data);
        // $this->load->view('admin/sidebar');
        $this->load->view('admin/harga');
        $this->load->view('admin/footer');
    }

    public function edit_harga()
    {
        $id = $this->input->post('id');
        $data = [
            'menit' => $this->input->post('menit'),
            'harga' => $this->input->post('harga')
        ];
        $this->db->where('id_harga', $id);
        $this->db->update('harga', $data);
        $this->session->set_flashdata('test', '<div class="alert alert-success" role="alert">Edit data berhasil disimpan</div>');
        redirect('setting/harga');
    }

    public function user()
    {
        chek_belom_login();
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]', ['is_unique' => 'Username sudah pernah di inputkan, silahkan input Username lain!']);
        $this->form_validation->set_rules('level', 'Level', 'required|trim');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]|matches[password2]', ['matches' => 'Password tidak sama!', 'min_length' => 'Password harus 6 digit/lebih!', 'required' => 'Password harus diisi']);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]', ['required' => 'Konfirmasi password harus diisi']);
        if ($this->form_validation->run() == false) {
            $data['ddt'] = $this->m_setting->live_user()->result();
            $data['title'] = 'SKYgame | Data User';
            $this->load->view('admin/header', $data);
            // $this->load->view('admin/sidebar');
            $this->load->view('admin/user');
            $this->load->view('admin/footer');
        } else {
            $data = [
                'nama_lengkap' => htmlspecialchars($this->input->post('nama', true)),
                'username' => htmlspecialchars($this->input->post('username', true)),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'level' => htmlspecialchars($this->input->post('level', true))
            ];

            $this->db->insert('user', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda Berhasil Menambahkan User Baru</div>');
            redirect('setting/user');
        }
    }

    public function edit_user()
    {
        $id = $this->input->post('id');
        $data = [
            'nama_lengkap' => $this->input->post('nama'),
            'username' => $this->input->post('username'),
            'level' => $this->input->post('level')
        ];
        $this->db->where('id_user', $id);
        $this->db->update('user', $data);
        $this->session->set_flashdata('test', '<div class="alert alert-success" role="alert">Edit data berhasil disimpan</div>');
        redirect('setting/user');
    }

    public function hapus_user()
    {
        $a = $this->input->post('id');
        $this->db->where('id_user', $a);
        $ss = $this->db->delete('user');
        echo json_encode($ss);
    }
}
