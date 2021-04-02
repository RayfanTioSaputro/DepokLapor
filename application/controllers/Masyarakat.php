<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Masyarakat extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->load->library('form_validation');
        $this->load->model('masyarakatmodel');
        $this->load->model('petugasmodel');
    }

    public function index()
    {
        $data['page'] = 'Masyarakat';
        $data['user'] = $this->db->get_where('petugas', [
            'username' => $this->session->userdata('username-2'),
        ])->row_array();
        $data['masyarakat'] = $this->masyarakatmodel->getAll();
        $level = $this->session->userdata('username-2');
        $data['level'] = $this->petugasmodel->getByLevel($level);

        $this->load->view('petugas/template/header', $data);
        if ($this->session->userdata('status-2') == "login") {
            $this->load->view('petugas/menu_masyarakat/index', $data);
        } else if ($this->session->userdata('status-2') != "login") {
            $this->session->set_flashdata('message-warning', '<div class="text-white text-center text-capitalize">Harap Login Terlebih Dahulu</div>');
            redirect('auth_petugas');
        }
        $this->load->view('petugas/template/footer');
    }

    public function delete()
    {
        $id = $this->input->post('idDelete');

        $this->db->where('id', $id);
        $this->db->delete('masyarakat');

        $this->session->set_flashdata('message-success', '<div class="text-white text-center text-capitalize">Berhasil Menghapus Masyarakat</div>');
        redirect('masyarakat');
    }
}
