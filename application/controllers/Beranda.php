<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beranda extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->load->library('form_validation');
        $this->load->model('laporanmodel');
    }

    public function index()
    {
        $data['page'] = 'Beranda';
        $data['user'] = $this->db->get_where('masyarakat', [
            'username' => $this->session->userdata('username'),
        ])->row_array();
        $data['kategori_laporan'] = $this->laporanmodel->getAllKategoriLaporan();
        $data['tujuan_instansi'] = $this->laporanmodel->getAllTujuanInstansi();

        $this->load->view('masyarakat/template/header');
        $this->load->view('masyarakat/beranda', $data);
        $this->load->view('masyarakat/template/footer');
    }

    public function pengaduan()
    {
        $this->form_validation->set_rules(
            'judul_laporan',
            'Judul Laporan',
            'trim|required|min_length[5]|max_length[100]',
            [
                'min_length' => 'Minimal 5 karakter',
                'max_length' => 'Maksimal 100 karakter'
            ]
        );
        $this->form_validation->set_rules(
            'isi_laporan',
            'Isi Laporan',
            'trim|required'
        );
        $this->form_validation->set_rules(
            'tujuan_instansi',
            'Tujuan Instansi',
            'trim|required'
        );
        $this->form_validation->set_rules(
            'tgl_kejadian',
            'Tanggal Kejadian',
            'trim|required'
        );
        $this->form_validation->set_rules(
            'tempat_kejadian',
            'Tempat Kejadian',
            'trim|required'
        );
        $this->form_validation->set_rules(
            'kategori_laporan',
            'Kategori Laporan',
            'trim|required'
        );

        if ($this->form_validation->run() == false) {
            redirect('beranda');
        } else {
            $config['upload_path'] = './assets/upload_img';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 2000;

            // $this->load->library('upload', $config);

            $data = [
                'tipe_laporan' => "Pengaduan",
                'pengaju' => $this->session->userdata('username'),
                'tgl_pengajuan' => date("Y-m-d"),
                'judul_laporan' => htmlspecialchars($this->input->post('judul_laporan', true)),
                'isi_laporan' => htmlspecialchars($this->input->post('isi_laporan', true)),
                'tujuan_instansi' => htmlspecialchars($this->input->post('tujuan_instansi', true)),
                'tgl_kejadian' => htmlspecialchars($this->input->post('tgl_kejadian', true)),
                'tempat_kejadian' => htmlspecialchars($this->input->post('tempat_kejadian', true)),
                'kategori_laporan' => htmlspecialchars($this->input->post('kategori_laporan', true)),
                'lampiran' => $this->load->library('upload', $config),
                'status' => "0",
                'date_created' => date("H:i:s")
            ];

            $this->db->insert('laporan', $data);

            $this->session->set_flashdata('message-success', '<div class="text-white text-center capitalize">Berhasil mengajukan pengaduan</div>');
            redirect('laporan_saya');
        }
    }

    public function aspirasi()
    {
        $this->form_validation->set_rules(
            'judul_laporan_aspirasi',
            'Judul Laporan',
            'trim|required|min_length[5]|max_length[100]',
            [
                'min_length' => 'Minimal 5 karakter',
                'max_length' => 'Maksimal 100 karakter'
            ]
        );
        $this->form_validation->set_rules(
            'isi_laporan_aspirasi',
            'Isi Laporan',
            'trim|required'
        );
        $this->form_validation->set_rules(
            'tujuan_instansi_aspirasi',
            'Tujuan Instansi',
            'trim|required'
        );
        $this->form_validation->set_rules(
            'kategori_laporan_aspirasi',
            'Kategori Laporan',
            'trim|required'
        );

        if ($this->form_validation->run() == false) {
            redirect('beranda');
        } else {
            $data = [
                'tipe_laporan' => "Aspirasi",
                'pengaju' => $this->session->userdata('username'),
                'tgl_pengajuan' => date("Y-m-d"),
                'judul_laporan' => htmlspecialchars($this->input->post('judul_laporan_aspirasi', true)),
                'isi_laporan' => htmlspecialchars($this->input->post('isi_laporan_aspirasi', true)),
                'tujuan_instansi' => htmlspecialchars($this->input->post('tujuan_instansi_aspirasi', true)),
                'kategori_laporan' => htmlspecialchars($this->input->post('kategori_laporan_aspirasi', true)),
                'status' => "0",
                'date_created' => date("H:i:s")
            ];

            // var_dump($data);
            // die;

            $this->db->insert('laporan', $data);

            $this->session->set_flashdata('message-success', '<div class="text-white text-center capitalize">Berhasil mengajukan aspirasi</div>');
            redirect('laporan_saya');
        }
    }
}
