<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_saya extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->load->model('laporanmodel');
    }

    public function index()
    {
        $data['page'] = 'Laporan Saya';
        $data['user'] = $this->db->get_where('masyarakat', [
            'username' => $this->session->userdata('username'),
        ])->row_array();
        $data['laporan'] = $this->laporanmodel->getAllBySenderLaporan($data);
        $data['row_laporan'] = $this->laporanmodel->getAllBySenderRowLaporan($data);

        $this->load->view('masyarakat/template/header');
        if ($this->session->userdata('status') == "login") {
            $this->load->view('masyarakat/laporan_saya_semua', $data);
        } else if ($this->session->userdata('status') != "login") {
            $this->session->set_flashdata('message-warning', '<div class="text-white text-center text-capitalize">Harap Login Terlebih Dahulu</div>');
            redirect('auth_masyarakat');
        }
        $this->load->view('masyarakat/template/footer');
    }

    public function belum()
    {
        $data['page'] = 'Laporan Saya';
        $data['user'] = $this->db->get_where('masyarakat', [
            'username' => $this->session->userdata('username'),
        ])->row_array();
        $data['laporan'] = $this->laporanmodel->getAllWaitingBySenderLaporan($data);
        // var_dump($data['laporan'] = $this->laporanmodel->getAllWaitingBySenderLaporan($data));
        // die;
        $data['row_laporan'] = $this->laporanmodel->getAllWaitingBySenderRowLaporan($data);

        $this->load->view('masyarakat/template/header');
        if ($this->session->userdata('status') == "login") {
            $this->load->view('masyarakat/laporan_saya_belum', $data);
        } else if ($this->session->userdata('status') != "login") {
            $this->session->set_flashdata('message-warning', '<div class="text-white text-center text-capitalize">Harap Login Terlebih Dahulu</div>');
            redirect('auth_masyarakat');
        }
        $this->load->view('masyarakat/template/footer');
    }

    public function proses()
    {
        $data['page'] = 'Laporan Saya';
        $data['user'] = $this->db->get_where('masyarakat', [
            'username' => $this->session->userdata('username'),
        ])->row_array();
        $data['laporan'] = $this->laporanmodel->getAllProccessBySenderLaporan($data);
        $data['row_laporan'] = $this->laporanmodel->getAllProccessBySenderRowLaporan($data);

        $this->load->view('masyarakat/template/header');
        if ($this->session->userdata('status') == "login") {
            $this->load->view('masyarakat/laporan_saya_proses', $data);
        } else if ($this->session->userdata('status') != "login") {
            $this->session->set_flashdata('message-warning', '<div class="text-white text-center text-capitalize">Harap Login Terlebih Dahulu</div>');
            redirect('auth_masyarakat');
        }
        $this->load->view('masyarakat/template/footer');
    }

    public function detail($id)
    {
        $data['page'] = 'Detail Laporan';
        $data['user'] = $this->db->get_where('masyarakat', [
            'username' => $this->session->userdata('username'),
        ])->row_array();
        $data['laporan'] = $this->laporanmodel->getAllByIdLaporan($id);
        $data['tanggapan'] = $this->laporanmodel->getTanggapan($id);
        $data['row_tanggapan'] = $this->laporanmodel->getTanggapanRow($id);

        $this->load->view('masyarakat/template/header');
        if ($this->session->userdata('status') == "login") {
            $this->load->view('masyarakat/detail_laporan', $data);
        } else if ($this->session->userdata('status') != "login") {
            $this->session->set_flashdata('message-warning', '<div class="text-white text-center text-capitalize">Harap Login Terlebih Dahulu</div>');
            redirect('auth_masyarakat');
        }
        $this->load->view('masyarakat/template/footer');
    }

    public function balasTanggapan()
    {
        $id = $this->input->post('idTanggapan');

        $data = [
            'id_laporan' => $id,
            'pemberi_tanggapan' => $this->session->userdata('username'),
            'role_pemberi_tanggapan' => "Masyarakat",
            'isi_tanggapan' => htmlspecialchars($this->input->post('tanggapan', true)),
            'date_created' => date("H:i:s")
        ];

        // var_dump($data);
        // die;

        $this->db->insert('tanggapan_laporan', $data);

        $this->session->set_flashdata('message-success', '<div class="text-white text-center text-capitalize">Berhasil Membalas Tanggapan</div>');
        redirect('laporan_saya/detail/' . $id);
    }

    public function delete()
    {
        $id = $this->input->post('idDelete');

        $this->db->where('id', $id);
        $this->db->delete('laporan');

        $this->session->set_flashdata('message-success', '<div class="text-white text-center text-capitalize">Berhasil Menghapus Laporan</div>');
        redirect('laporan_saya');
    }
}
