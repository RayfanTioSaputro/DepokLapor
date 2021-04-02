<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Petugas extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->load->model('petugasmodel');
    }

    public function index()
    {
        $data['page'] = 'Petugas';
        $data['user'] = $this->db->get_where('petugas', [
            'username' => $this->session->userdata('username-2'),
        ])->row_array();
        $data['petugas'] = $this->petugasmodel->getAll();
        $level = $this->session->userdata('username-2');
        $data['level'] = $this->petugasmodel->getByLevel($level);

        $this->load->view('petugas/template/header', $data);
        if ($this->session->userdata('status-2') == "login") {
            $this->load->view('petugas/menu_petugas/index', $data);
        } else if ($this->session->userdata('status-2') != "login") {
            $this->session->set_flashdata('message-warning', '<div class="text-white text-center text-capitalize">Harap Login Terlebih Dahulu</div>');
            redirect('auth_petugas');
        }
        $this->load->view('petugas/template/footer');
    }

    public function create()
    {
        $data = [
            'nama' => htmlspecialchars($this->input->post('add_nama', true)),
            'telp' => htmlspecialchars($this->input->post('add_telp', true)),
            'email' => htmlspecialchars($this->input->post('add_email', true)),
            'username' => htmlspecialchars($this->input->post('add_username', true)),
            'password' => password_hash($this->input->post('add_password'), PASSWORD_DEFAULT),
            'level' => 'Petugas',
            'date_created' => time()
        ];

        $this->db->insert('petugas', $data);

        $this->session->set_flashdata('message-success', '<div class="text-white text-center text-capitalize">Berhasil Menambahkan Petugas</div>');
        redirect('petugas');
    }

    public function update()
    {
        $id = $this->input->post('idUpdate');
        $data = [
            'nama' => $this->input->post('update_nama'),
            'telp' => $this->input->post('update_telp'),
            'email' => $this->input->post('update_email'),
            'username' => $this->input->post('update_username'),
            'password' => $this->input->post('updatepassworda')
        ];

        $this->db->set($data);
        $this->db->where('id', $id);
        $this->db->update('petugas');

        $this->session->set_flashdata('message-success', '<div class="text-white text-center text-capitalize">Berhasil Mengubah Petugas</div>');
        redirect('petugas');
    }

    public function delete()
    {
        $id = $this->input->post('idDelete');

        $this->db->where('id', $id);
        $this->db->delete('petugas');

        $this->session->set_flashdata('message-success', '<div class="text-white text-center text-capitalize">Berhasil Menghapus Petugas</div>');
        redirect('petugas');
    }
}
