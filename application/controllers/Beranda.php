<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beranda extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['page'] = 'Beranda';
        $data['user'] = $this->db->get_where('masyarakat', [
            'username' => $this->session->userdata('username'),
        ])->row_array();

        $this->load->view('masyarakat/template/header');
        $this->load->view('masyarakat/beranda', $data);
        $this->load->view('masyarakat/template/footer');
    }
}
