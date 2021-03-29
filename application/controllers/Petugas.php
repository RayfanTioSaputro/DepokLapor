<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Petugas extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->load->library('form_validation');
        $this->load->model('petugasmodel');
    }

    public function index()
    {
        $data['page'] = 'Petugas';
        $data['petugas'] = $this->petugasmodel->getAll();

        $this->load->view('petugas/template/header', $data);
        $this->load->view('petugas/menu_petugas/index', $data);
        $this->load->view('petugas/template/footer');
    }

    public function add($method = "")
    {
        $data['page'] = 'Petugas';

        $this->load->view('petugas/template/header', $data);

        switch ($method) {
            case 'create':
                $this->form_validation->set_rules(
                    'nama',
                    'Nama Lengkap',
                    'trim|required|min_length[3]|max_length[255]',
                    [
                        'min_length' => 'Minimal 3 karakter'
                    ]
                );
                $this->form_validation->set_rules(
                    'telp',
                    'No. Telpon',
                    'trim|required|min_length[8]|max_length[13]',
                    [
                        'min_length' => 'Minimal 8 karakter',
                        'max_length' => 'Maksimal 13 karakter'
                    ]
                );
                $this->form_validation->set_rules(
                    'email',
                    'Email',
                    'trim|required|min_length[1]|max_length[45]',
                    [
                        'min_length' => 'Minimal 1 karakter',
                    ]
                );
                $this->form_validation->set_rules(
                    'username',
                    'Username',
                    'trim|required|min_length[5]|max_length[25]|is_unique[petugas.username]',
                    [
                        'min_length' => 'Minimal 5 karakter',
                        'max_length' => 'Maksimal 25 karakter',
                        'is_unique' => 'Username tidak dapat digunakan'
                    ]
                );
                $this->form_validation->set_rules(
                    'password',
                    'Password',
                    'trim|required|min_length[5]|max_length[255]',
                    [
                        'min_length' => 'Minimal 5 karakter',
                        'max_length' => 'Maksimal 32 karakter'
                    ]
                );

                // var_dump($this->form_validation->run() == false);
                // die;
                if ($this->form_validation->run() == false) {
                    redirect('petugas/add');
                } else {
                    $data = [
                        'nama' => htmlspecialchars($this->input->post('nama', true)),
                        'telp' => htmlspecialchars($this->input->post('telp', true)),
                        'email' => htmlspecialchars($this->input->post('email', true)),
                        'username' => htmlspecialchars($this->input->post('username', true)),
                        'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                        'level' => 'Petugas',
                        'date_created' => time()
                    ];

                    $this->db->insert('petugas', $data);

                    $this->session->set_flashdata('message-success', '<div class="text-white text-center text-capitalize">Berhasil Menambahkan Petugas</div>');
                    redirect('petugas');
                }
                break;
            default:
                $this->load->view('petugas/menu_petugas/tambah_petugas', $data);
                break;
        }
        $this->load->view('petugas/template/footer');
    }

    public function edit($method = "", $id)
    {
        $data['page'] = 'Petugas';
        $data['petugas'] = $this->petugasmodel->getById($id);

        $this->load->view('petugas/template/header', $data);

        switch ($method) {
            case 'update':
                $this->form_validation->set_rules(
                    'nama',
                    'Nama Lengkap',
                    'trim|required|min_length[3]|max_length[255]',
                    [
                        'min_length' => 'Minimal 3 karakter'
                    ]
                );
                $this->form_validation->set_rules(
                    'telp',
                    'No. Telpon',
                    'trim|required|min_length[8]|max_length[13]',
                    [
                        'min_length' => 'Minimal 8 karakter',
                        'max_length' => 'Maksimal 13 karakter'
                    ]
                );
                $this->form_validation->set_rules(
                    'email',
                    'Email',
                    'trim|required|min_length[1]|max_length[45]',
                    [
                        'min_length' => 'Minimal 1 karakter',
                    ]
                );
                $this->form_validation->set_rules(
                    'username',
                    'Username',
                    'trim|required|min_length[5]|max_length[25]|is_unique[petugas.username]',
                    [
                        'min_length' => 'Minimal 5 karakter',
                        'max_length' => 'Maksimal 25 karakter',
                        'is_unique' => 'Username tidak dapat digunakan'
                    ]
                );
                $this->form_validation->set_rules(
                    'password',
                    'Password',
                    'trim|required|min_length[5]|max_length[255]',
                    [
                        'min_length' => 'Minimal 5 karakter',
                        'max_length' => 'Maksimal 32 karakter'
                    ]
                );

                // var_dump($this->form_validation->run() == false);
                // die;
                if ($this->form_validation->run() == false) {
                    redirect('petugas/edit');
                } else {

                    $this->session->set_flashdata('message-success', '<div class="text-white text-center text-capitalize">Berhasil Menambahkan Petugas</div>');
                    redirect('petugas');
                }
                break;
            default:
                $this->load->view('petugas/menu_petugas/edit_petugas', $data);
                break;
        }
        $this->load->view('petugas/template/footer');
    }
}
