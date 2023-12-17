<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_setting extends CI_Model
{

    public function live_chanel()
    {
        $hasil = $this->db->query("SELECT * FROM chanel  ");
        return $hasil;
    }

    public function live_harga()
    {
        $hasil = $this->db->query("SELECT * FROM harga  ");
        return $hasil;
    }

    public function live_user()
    {
        $hasil = $this->db->query("SELECT * FROM user  ");
        return $hasil;
    }

    public function live_member()
    {
        $hasil = $this->db->query("SELECT * FROM member where status='B' order by id_member ASC limit 1 ");
        return $hasil->row();
    }

    public function live_pendapatan($tgl1, $tgl2)
    {
        $this->db->select('*');
        $this->db->from('member');
        $this->db->where("tgl_stop >='$tgl1'");
        $this->db->where("tgl_stop <='$tgl2'");
        $this->db->where("status ='N'");
        $query = $this->db->get();
        return $query;
    }

    public function live_pertanggal($tgl1, $tgl2)
    {
        // Tambahkan informasi waktu ke tanggal
        $tgl1 = $tgl1 . ' 11:00:00'; // jam 11 siang tanggal 1
        $tgl2 = $tgl2 . ' 05:00:00'; // jam 5 pagi pada tanggal 2

        $this->db->select('*');
        $this->db->from('member');
        $this->db->where("tgl_mulai >= '$tgl1'");
        $this->db->where("tgl_stop <= '$tgl2'");
        $this->db->where("status ='N'");
        $query = $this->db->get();
        return $query;
    }
    public function live_penjualan($tgl1, $tgl2)
    {
        $this->db->select('tgl_jual,total, sum(total) as thl');
        $this->db->from('penjualan');
        $this->db->where("tgl_jual >= '$tgl1'");
        $this->db->where("tgl_jual <= '$tgl2'");
        $this->db->group_by("tgl_jual");
        $query = $this->db->get();
        return $query;
    }

    public function live_pengeluaran($tgl1, $tgl2)
    {
        $this->db->select('tgl_keluar,total, sum(total) as tkl');
        $this->db->from('pengeluaran');
        $this->db->where("tgl_keluar >= '$tgl1'");
        $this->db->where("tgl_keluar <= '$tgl2'");
        $this->db->group_by("tgl_keluar");
        $query = $this->db->get();
        return $query;
    }
}
