<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dasbor extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('masyarakatmodel');
        $this->load->model('petugasmodel');
    }

    public function index()
    {
        $data['page'] = 'Dasbor';
        $data['masyarakat'] = $this->masyarakatmodel->getAllRow();
        $data['petugas'] = $this->petugasmodel->getAllRow();

        $this->load->view('petugas/template/header', $data);
        $this->load->view('petugas/dasbor', $data);
        $this->load->view('petugas/template/footer');
    }
}
