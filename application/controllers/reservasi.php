<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Reservasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Reservasi_model');  // Load model Reservasi_model
    }

    public function index()
    {
        // Read
        $data['reservasi'] = $this->Reservasi_model->getAll();
        $user = $this->session->userdata('user');
        $data['user'] = $user;
        $this->load->view('reservasi', $data);
    }

    public function create()
    {
        $this->load->view('create_reservasi');
    }

    public function store()
    {
        // Create
        $this->Reservasi_model->store();
        redirect('reservasi');
    }

    public function edit($id)
    {
        $data['reservasi'] = $this->Reservasi_model->getById($id);
        $this->load->view('edit_reservasi', $data);
    }

    public function update($id)
    {
        // Update
        $this->Reservasi_model->update($id);
        redirect('reservasi');
    }

    public function delete($id)
    {
        // Delete
        $this->Reservasi_model->delete($id);
        redirect('reservasi');
    }

    public function tambah()
    {
        // Memeriksa jika metode request adalah POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Jika ya, panggil metode store() untuk menyimpan data dari form
            $this->store();
        } else {
            // Jika bukan, panggil metode create() untuk menampilkan form tambah reservasi
            $this->create();
        }
    }
}
