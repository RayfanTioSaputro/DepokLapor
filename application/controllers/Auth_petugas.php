<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_petugas extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->load->library('form_validation');
        $this->load->model('authmodel');
    }

    public function index()
    {
        $this->form_validation->set_rules(
            'username',
            'Username',
            'trim|required',
            [
                'required' => 'Harus diisi',
            ]
        );
        $this->form_validation->set_rules(
            'password',
            'Password',
            'trim|required',
            [
                'required' => 'Harus diisi',
            ]
        );

        if ($this->form_validation->run() == false) {
            $this->load->view('petugas/login');
        } else {
            $this->login();
        }
    }

    private function login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->db->get_where('petugas', ['username' => $username])->row_array();
        if ($user) {
            if (password_verify($password, $user['password'])) {
                $data = [
                    'username-2' => $user['username'],
                    'password-2' => $user['password'],
                    'status-2' => "login",
                ];
                $authenticate = $this->db->get_where('petugas', ['username' => $username])->row_array();

                $this->session->set_flashdata('message-success', '<div class="text-white text-center text-capitalize">berhasil masuk sebagai ' . $authenticate['username'] . '</div>');
                $this->session->set_userdata($data);
                redirect('dasbor');
            } else {
                $this->session->set_flashdata('message-error', '<div class="text-white text-center text-capitalize">Password salah</div>');
                redirect('auth_petugas');
            }
        } else {
            $this->session->set_flashdata('message-error', '<div class="text-white text-center text-capitalize">Username belum terdaftar</div>');
            redirect('auth_petugas');
        }
    }

    public function registration()
    {
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

        if ($this->form_validation->run() == false) {
            $this->load->view('petugas/register');
        } else {
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'telp' => htmlspecialchars($this->input->post('telp', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'username' => htmlspecialchars($this->input->post('username', true)),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'level' => 'admin',
                'date_created' => time()
            ];

            $this->db->insert('petugas', $data);

            $this->session->set_flashdata('message-success', '<div class="text-white text-center text-capitalize">Berhasil register</div>');
            redirect('auth_petugas');
        }
    }

    public function sendEmail($token, $type)
    {
        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'greendayy2406@gmail.com',
            'smtp_pass' => 'dxlv htyb xncb wekm',
            'smtp_port' => 465,
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n",
        ];

        $this->load->library('email', $config);
        $this->email->initialize($config);

        $this->email->from('greendayy2406@gmail.com', 'DepokLapor!');

        if ($type == 'forgot') {
            $this->email->to($this->input->post('forgotPassword'));
            $this->email->subject('Reset Password');
            $this->email->message('
            <body marginheight="0" topmargin="0" marginwidth="0" style="margin: 0px; background-color: #f2f3f8;" leftmargin="0">
                <table cellspacing="0" border="0" cellpadding="0" width="100%" bgcolor="#f2f3f8" style="@import url(https://fonts.googleapis.com/css?family=Rubik:300,400,500,700|Open+Sans:300,400,600,700);>
                    <tr>
                        <td>
                            <table style="background-color: #f2f3f8; max-width:670px;  margin:0 auto;" width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td style="height:80px;"></td>
                                </tr>
                                <tr>
                                    <td style="text-align:center;">
                                        <a href="" title="logo" target="_blank" style="text-decoration:none; color:rgba(17, 24, 39, 1); font-size:24px; font-weight:700;">
                                            DepokLapor<span style="color: rgba(79, 70, 229, 1);">!</span>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="height:20px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>
                                        <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0" style="max-width:670px; background:#fff; border-radius:3px; text-align:center;-webkit-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);-moz-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);box-shadow:0 6px 18px 0 rgba(0,0,0,.06);">
                                            <tr>
                                                <td style="height:40px;">&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td style="padding:0 60px;">
                                                    <h1 style="color:rgba(17, 24, 39, 1); font-weight:500; margin:0; font-size:32px; text-transform:capitalize;">
                                                        Anda Telah Meminta Untuk Menyetel Ulang Password Anda
                                                    </h1>
                                                    <span style="display:inline-block; vertical-align:middle; margin:29px 0 26px; border-bottom:1px solid #cecece; width:100px;"></span>
                                                    <p style="color:#455056; font-size:15px;line-height:24px; margin:0;">
                                                        Tautan unik untuk menyetel ulang password telah disiapkan untuk Anda. 
                                                        Untuk mengatur ulang password Anda, klik tautan berikut dan ikuti petunjuknya.
                                                    </p>
                                                    <a href="' . base_url() . 'auth_petugas/resetpassword?email=' . $this->input->post('forgotPassword') . '&token=' . urlencode($token) . '" style="background:rgba(79, 70, 229, 1); text-decoration:none !important; font-weight:500; margin-top:35px; color:#fff; text-transform:uppercase; font-size:14px; padding:10px 24px; display:inline-block; border-radius:5px; cursor:pointer">
                                                        Setel Ulang Password
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="height:40px;">&nbsp;</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>         
                                <tr>
                                    <td style="height:20px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td style="text-align:center;">
                                        <p style="font-size:14px; color:rgba(69, 80, 86, 0.7411764705882353); line-height:18px; margin:0 0 0;">&copy; <strong>www.lapordepok.com</strong></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="height:80px;">&nbsp;</td>
                                </tr>                
                            </table>
                        </td>
                    </tr>
                </table>
            </body>
            ');
        }

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    public function forgotPassword()
    {
        $email = $this->input->post('forgotPassword');
        $user = $this->db->get_where('petugas', ['email' => $email])->row_array();

        if ($user) {
            $token = base64_encode(random_bytes(32));
            $user_token = [
                'email' => $email,
                'token' => $token,
                'date_created' => time()
            ];

            $this->db->insert('user_token', $user_token);
            $this->sendEmail($token, 'forgot');

            $this->session->set_flashdata('message-success-2', '<div class="text-white text-center text-capitalize">Silahkan cek akun email anda untuk reset password</div>');
            redirect('auth_petugas');
        } else {
            $this->session->set_flashdata('message-warning-2', '<div class="text-white text-center text-capitalize">Email belum terdaftar</div>');
            redirect('auth_petugas');
        }
    }

    public function resetPassword()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('petugas', ['email' => $email])->row_array();
        // var_dump($user);
        // die;

        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

            if ($user_token) {
                if (time() - $user_token['date_created'] < (60 * 60 * 1)) {
                    $this->session->set_userdata('reset_email', $email);
                    $this->changePassword();
                }
            } else {
                $this->session->set_flashdata('message-error', '<div class="text-white text-center text-capitalize">setel ulang password gagal,<br> token anda salah</div>');
                redirect('auth_petugas');
            }
        } else {
            $this->session->set_flashdata('message-error', '<div class="text-white text-center text-capitalize">setel ulang password gagal,<br> email anda salah</div>');
            redirect('auth_petugas');
        }
    }

    public function changePassword()
    {
        if (!$this->session->userdata('reset_email')) {
            redirect('auth_petugas');
        }

        $this->form_validation->set_rules(
            'password1',
            'Password',
            'trim|required|min_length[5]|max_length[255]',
            [
                'min_length' => 'Minimal 5 karakter',
                'max_length' => 'Maksimal 32 karakter'
            ]
        );
        $this->form_validation->set_rules(
            'password2',
            'Password',
            'trim|required|min_length[5]|max_length[255]|matches[password1]',
            [
                'min_length' => 'Minimal 5 karakter',
                'max_length' => 'Maksimal 32 karakter',
                'matches' => 'Password tidak sesuai'
            ]
        );

        if ($this->form_validation->run() == false) {
            $this->load->view('reset_password');
        } else {
            $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
            $email = $this->session->userdata('reset_email');

            $this->db->set('password', $password);
            $this->db->where('email', $email);
            $this->db->update('petugas');

            $this->session->unset_userdata('reset_email');
            $this->session->set_flashdata('message-success', '<div class="text-white text-center text-capitalize">password berhasil dirubah. silahkan login</div>');
            redirect('auth_petugas');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('status-2');

        redirect('auth_petugas');
    }
}
