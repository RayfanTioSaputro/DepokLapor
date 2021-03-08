<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beranda extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        // $this->load->model('auth');
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('masyarakat', [
            'username' => $this->session->userdata('username'),
        ])->row_array();
        $this->load->view('beranda', $data);
    }
}
