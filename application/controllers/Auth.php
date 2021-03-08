<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->load->library('form_validation');
        $this->load->model('authmodel');

        require_once './assets/vendor/swiftmailer/swift_required.php';
    }

    public function index()
    {
        $this->form_validation->set_rules(
            'username',
            'username',
            'trim|required',
            [
                'required' => 'Harus diisi',
            ]
        );
        $this->form_validation->set_rules(
            'password',
            'password',
            'trim|required',
            [
                'required' => 'Harus diisi',
            ]
        );

        if ($this->form_validation->run() == false) {
            // $data['user'] = $this->authmodel->getUser();            
            $this->load->view('auth/login');
        } else {
            $this->login();
        }
    }

    private function login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->db->get_where('masyarakat', ['username' => $username])->row_array();
        // var_dump($user);
        // die;
        if ($user) {
            if (password_verify($password, $user['password'])) {
                $data = [
                    'username' => $user['username'],
                    'password' => $user['password'],
                    'status' => "login",
                ];
                $this->session->set_userdata($data);
                redirect('beranda');
            } else {
                $this->session->set_flashdata('message', '<div class="text-red-500 text-center mb-4">Password salah</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="text-red-500 text-center mb-4">Username belum terdaftar</div>');
            redirect('auth');
        }
    }

    public function registration()
    {
        $this->form_validation->set_rules(
            'nik',
            'nik',
            'trim|required|min_length[16]|max_length[16]',
            [
                'required' => 'Harus diisi'
            ]
        );
        $this->form_validation->set_rules(
            'nama',
            'nama',
            'trim|required|min_length[3]|max_length[255]',
            [
                'required' => 'Harus diisi',
                'min_length' => 'Minimal 3 karakter'
            ]
        );
        $this->form_validation->set_rules(
            'telp',
            'telp',
            'trim|required|min_length[8]|max_length[13]',
            [
                'required' => 'Harus diisi'
            ]
        );
        $this->form_validation->set_rules(
            'email',
            'email',
            'trim|required|min_length[1]|max_length[45]',
            [
                'required' => 'Harus diisi'
            ]
        );
        $this->form_validation->set_rules(
            'username',
            'username',
            'trim|required|min_length[5]|max_length[25]|is_unique[masyarakat.username]',
            [
                'required' => 'Harus diisi',
                'min_length' => 'Minimal 5 karakter',
                'max_length' => 'Minimal 25 karakter',
                'is_unique' => 'Username tersebut sudah digunakan'
            ]
        );
        $this->form_validation->set_rules(
            'password',
            'password',
            'trim|required|min_length[5]|max_length[255]',
            [
                'required' => 'Harus diisi',
                'min_length' => 'Minimal 5 karakter',
                'max_length' => 'Minimal 32 karakter'
            ]
        );

        if ($this->form_validation->run() == false) {
            $this->load->view('auth/register');
        } else {
            $data = [
                'nik' => htmlspecialchars($this->input->post('nik', true)),
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'telp' => htmlspecialchars($this->input->post('telp', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'username' => htmlspecialchars($this->input->post('username', true)),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            ];

            $this->db->insert('masyarakat', $data);

            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('status');

        redirect('beranda');
    }

    public function forgotPassword()
    {
        $to = $this->input->post('forgotPassword');
        $username = 'greendayy2406@gmail.com';
        $password = 'dxlv htyb xncb wekm';

        $data = $this->authmodel->getByEmail($to);

        if ($to != "") {
            if ($data != NULL) {
                try {
                    $transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, "ssl")
                        ->setUsername($username)
                        ->setPassword($password);

                    $mailer = Swift_Mailer::newInstance($transport);

                    ob_start();
                    include './application/views/reset_password_template.php';
                    $mailContent = ob_get_clean();
                    if (ob_get_length()) ob_end_clean();

                    $message = Swift_Message::newInstance('Request Reset Password')
                        ->setFrom([$username => 'Pengaduan Masyarakat'])
                        ->setTo([$to])
                        ->setBody($mailContent, 'text/html');

                    $result = $mailer->send($message);
                    redirect('auth');
                } catch (Exception $e) {
                    echo $e->getMessage();
                }
            }
        }
    }
}
