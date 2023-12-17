<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
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
        $data['title'] = 'SKYgame | Dashboard';
        $this->load->view('admin/header', $data);
        // $this->load->view('admin/sidebar');
        $this->load->view('admin/dashboard');
        $this->load->view('admin/footer');
    }

    public function stop()
    {
        date_default_timezone_set('Asia/Jakarta'); //Menyesuaikan waktu dengan tempat kita tinggal
        $a = $this->input->post('idc');
        $b = $this->input->post('idm');

        $data = [
            'tgl_stop' => date('Y-m-d H-i-s'),
            'tgl' => date('Y-m-d'),
            'status' => 'B'
        ];
        $this->db->where('id_member', $b);
        $this->db->update('member', $data);

        $dataa = [
            'status' => 'N'
        ];
        $this->db->where('id_chanel', $a);
        $ss = $this->db->update('chanel', $dataa);
        echo json_encode($ss);
    }

    public function timefs()
    {
        date_default_timezone_set('Asia/Jakarta'); //Menyesuaikan waktu dengan tempat kita tinggal

        $kk = $this->m_setting->live_member();

        if (!empty($kk)) { // Jika data siswa ada/ditemukan

            $awal  = date_create($kk->tgl_mulai);
            $akhir = date_create($kk->tgl_stop); // waktu sekarang
            $diff  = date_diff($awal, $akhir);
            $thn = $diff->y . ' Tahun, ';
            $bln = $diff->m . ' Bulan, ';
            $hr = $diff->d . ' Hari, ';
            $jamm =  $diff->h;
            $mnt =  $diff->i;
            $dtk =  $diff->s;

            $waktu_awal        = strtotime($kk->tgl_mulai);
            $waktu_akhir    = strtotime($kk->tgl_stop);
            //menghitung selisih dengan hasil detik
            $diff    = $waktu_akhir - $waktu_awal;
            //membagi detik menjadi jam
            $hari = floor($diff / (60 * 60 * 24));

            $jam    = floor($diff / (60 * 60));

            $menit2 = $diff - $jam * (60 * 60);
            $menit = floor($diff / 60);
            $detik = floor($menit / 60);

            $sql = "SELECT * FROM harga";
            $w = $this->db->query($sql)->row();

            $total = $menit / $w->menit * $w->harga;

            $men = date('i');
            $detikg = date('s');

            if ($thn != 0) {
                $thn1 = $thn;
            } else {
                $thn1 = "";
            }
            if ($bln != 0) {
                $bln1 = $bln;
            } else {
                $bln1 = "";
            }

            if ($hr != 0) {
                $hr1 = $hr;
            } else {
                $hr1 = "";
            }

            if ($jamm >= 10) {
                $jamm1 = $jamm;
            } else {
                $jamm1 = "0" . $jamm;
            }

            if ($mnt >= 10) {
                $mnt1 = $mnt;
            } else {
                $mnt1 = "0" . $mnt;
            }

            if ($dtk >= 10) {
                $dtk1 = $dtk;
            } else {
                $dtk1 = "0" . $dtk;
            }

            $tl_rp = "Rp." . number_format($total, 0, ",", ".");

            // $timestampg =  date($j . ':' . $m . ':' . $d);
            $timestampg = $thn1 . $bln1 . $hr1 .  $jamm1 .  ":" . $mnt1 . ":" . $dtk1;

            $time1 = date('H:i:s', strtotime($kk->tgl_mulai));
            $time2 = date('H:i:s', strtotime($kk->tgl_stop));
            // Buat sebuah array
            $callback = array(
                'status' => 'success', // Set array status dengan success
                'id_member' => $kk->id_member,
                'nama' => $kk->nama_member,
                'tl_rp' => $tl_rp,
                'total' => $total,
                'lama' => $timestampg,
            );
        } else {
            $callback = array('status' => 'failed'); // set array status dengan failed
        }
        echo json_encode($callback);
    }

    public function mulai()
    {
        date_default_timezone_set('Asia/Jakarta');
        $id = $this->input->post('id');
        $chanel = $this->db->get_where('chanel', ['id_chanel' => $id])->row_array();
        $nama_chanel = $chanel['nama_chanel'];
        $data = [
            'nama_member' => $this->input->post('nama'),
            'tgl_mulai' => date('Y-m-d H-i-s'),
            'id_chanel' => $this->input->post('id'),
            'nama_chanel' => $nama_chanel,
            'status' => 'Y'
        ];
        $this->db->insert('member', $data);
        $up = [
            'status' => 'Y'
        ];
        $this->db->where('id_chanel', $id);
        $this->db->update('chanel', $up);

        redirect('dashboard');
    }

    public function bayar()
    {
        $id = $this->input->post('id_m');
        $data = [
            'status' => 'N',
            'lama_sewa' => $this->input->post('sewa'),
            'total' => $this->input->post('total'),
            'harga_permenit' => $this->input->post('hargac'),
            'dibayar' => $this->input->post('by')
        ];
        $this->db->where('id_member', $id);
        $this->db->update('member', $data);
        $this->session->set_flashdata('test', '<div class="alert alert-success" role="alert">Data berhasil disimpan</div>');
        redirect('dashboard');
    }

    public function hapus()
    {
        $a = $this->input->post('idc');
        $b = $this->input->post('idm');
        $this->db->where('id_member', $b);
        $this->db->delete('member');

        $dataa = [
            'status' => 'N'
        ];
        $this->db->where('id_chanel', $a);
        $ss = $this->db->update('chanel', $dataa);
        echo json_encode($ss);
    }

    public function edit_bayar()
    {
        $a = $this->input->post('id');
        $dataa = [
            'status' => 'B'
        ];
        $this->db->where('id_member', $a);
        $ss = $this->db->update('member', $dataa);
        echo json_encode($ss);
    }

    public function hapus_bayar()
    {
        $a = $this->input->post('id');
        $this->db->where('id_member', $a);
        $ss = $this->db->delete('member');
        echo json_encode($ss);
    }


    public function password()
    {
        chek_belom_login();
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->form_validation->set_rules('pass_lama', 'Password Lama', 'required|trim', ['required' => 'Password lama harus diisi']);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]|matches[password2]', ['matches' => 'Password tidak sama!', 'min_length' => 'Password harus 6 digit/lebih!', 'required' => 'Password harus diisi']);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]', ['required' => 'Konfirmasi password harus diisi']);
        if ($this->form_validation->run() == false) {
            $data['ddt'] = $this->m_setting->live_chanel()->result();
            $data['title'] = 'SKYgame | Edit Password';
            $this->load->view('admin/header', $data);
            // $this->load->view('admin/sidebar');
            $this->load->view('admin/password');
            $this->load->view('admin/footer');
        } else {
            $passlama = $this->input->post('pass_lama');
            $passbaru = $this->input->post('password1');

            if (!password_verify($passlama, $data['user']['password'])) {
                $this->session->set_flashdata('pass', '<div class="alert alert-danger" role="alert">Password lama salah</div>');
                redirect('dashboard/password');
            } else {
                if ($passlama == $passbaru) {
                    $this->session->set_flashdata('pass', '<div class="alert alert-danger" role="alert">Password tidak boleh sama dengan yang lama</div>');
                    redirect('dashboard/password');
                } else {
                    $pass_hash = password_hash($passbaru, PASSWORD_DEFAULT);

                    $this->db->set('password', $pass_hash);
                    $this->db->where('id_user', $data['user']['id_user']);
                    $this->db->update('user');

                    $this->session->set_flashdata('pass', '<div class="alert alert-success" role="alert">Edit Password Berhasil</div>');

                    redirect('dashboard/password');
                }
            }
        }
    }
    public function penjualan()
    {
        chek_belom_login();
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['ddt'] = $this->m_setting->live_chanel()->result();
        $data['title'] = 'SKYgame | Penjualan';
        $this->load->view('admin/header', $data);
        // $this->load->view('admin/sidebar');
        $this->load->view('admin/penjualan');
        $this->load->view('admin/footer');
    }

    public function pengeluaran()
    {
        chek_belom_login();
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['ddt'] = $this->m_setting->live_chanel()->result();
        $data['title'] = 'SKYgame | Penjualan';
        $this->load->view('admin/header', $data);
        // $this->load->view('admin/sidebar');
        $this->load->view('admin/pengeluaran');
        $this->load->view('admin/footer');
    }
}
