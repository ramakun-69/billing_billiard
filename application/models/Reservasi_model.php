<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Reservasi_model extends CI_Model
{

    public function getAll()
    {
        // Ambil semua data reservasi dari database
        return $this->db->get('reservasi')->result_array();
    }

    public function getById($id)
    {
        // Ambil data reservasi berdasarkan ID
        return $this->db->get_where('reservasi', ['id' => $id])->row_array();
    }

    public function store()
    {
        // Ambil data dari form dan simpan ke database
        $data = [
            'nama' => $this->input->post('nama', true),
            'tanggal' => $this->input->post('tanggal', true),
            'waktu' => $this->input->post('waktu', true),
            'jumlah_orang' =>    $this->input->post('jumlah_orang', true)
        ];
        $this->db->insert('reservasi', $data);
    }

    public function update($id)
    {
        // Ambil data dari form dan perbarui ke database
        $data = [
            'nama' => $this->input->post('nama', true),
            'tanggal' => $this->input->post('tanggal', true),
            'waktu' => $this->input->post('waktu', true),
            'jumlah_orang' => $this->input->post('jumlah_orang', true)
        ];
        $this->db->where('id', $id);
        $this->db->update('reservasi', $data);
    }

    public function delete($id)
    {
        // Hapus data reservasi berdasarkan ID
        $this->db->where('id', $id);
        $this->db->delete('reservasi');
    }
}
