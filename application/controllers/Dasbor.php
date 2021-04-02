<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dasbor extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('masyarakatmodel');
        $this->load->model('petugasmodel');
        $this->load->model('laporanmodel');
    }

    public function index()
    {
        $data['page'] = 'Dasbor';
        $data['user'] = $this->db->get_where('petugas', [
            'username' => $this->session->userdata('username-2'),
        ])->row_array();
        $data['masyarakat'] = $this->masyarakatmodel->getAllRow();
        $data['petugas'] = $this->petugasmodel->getAllRow();
        $data['request_laporan'] = $this->laporanmodel->getAllWaitingRowLaporan();
        $data['proccess_laporan'] = $this->laporanmodel->getAllProccessRowLaporan();
        $level = $this->session->userdata('username-2');
        $data['level'] = $this->petugasmodel->getByLevel($level);

        $this->load->view('petugas/template/header', $data);
        if ($this->session->userdata('status-2') == "login") {
            $this->load->view('petugas/dasbor', $data);
        } else if ($this->session->userdata('status-2') != "login") {
            $this->session->set_flashdata('message-warning', '<div class="text-white text-center text-capitalize">Harap Login Terlebih Dahulu</div>');
            redirect('auth_petugas');
        }
        $this->load->view('petugas/template/footer');
    }
}
