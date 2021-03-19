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
        if ($user) {
            if ($user['is_active'] == 1) {
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'username' => $user['username'],
                        'password' => $user['password'],
                        'status' => "login",
                    ];
                    $this->session->set_userdata($data);
                    redirect('beranda');
                } else {
                    $this->session->set_flashdata('message', '<div class="text-red-500 text-center capitalize mb-4">Password salah</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="text-red-500 text-center capitalize mb-4">Akun anda belum diaktivasi</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="text-red-500 text-center capitalize mb-4">Username belum terdaftar</div>');
            redirect('auth');
        }
    }

    public function registration()
    {
        $this->form_validation->set_rules(
            'nik',
            'NIK',
            'trim|required|min_length[16]|max_length[16]',
            [
                'min_length' => 'Minimal 16 karakter',
                'max_length' => 'Maksimal 16 karakter'
            ]
        );
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
            'trim|required|min_length[5]|max_length[25]|is_unique[masyarakat.username]',
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
            $this->load->view('auth/register');
        } else {
            $data = [
                'nik' => htmlspecialchars($this->input->post('nik', true)),
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'telp' => htmlspecialchars($this->input->post('telp', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'username' => htmlspecialchars($this->input->post('username', true)),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'is_active' => 0,
                'date_created' => time()
            ];

            $token = base64_encode(random_bytes(32));
            $user_token = [
                'email' => $this->input->post('email', true),
                'token' => $token,
                'date_created' => time()
            ];

            $this->db->insert('masyarakat', $data);
            $this->db->insert('user_token', $user_token);

            $this->sendEmail($token, 'verify');

            $this->session->set_flashdata('message', '<div class="text-green-500 text-center capitalize mb-4">Berhasil register. Silahkan aktivasi akun <br> di email anda</div>');
            redirect('auth');
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

        if ($type == 'verify') {
            $this->email->to($this->input->post('email'));
            $this->email->subject('Aktivasi Akun');
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
                                                        mohon aktivasi akun anda sebelum login
                                                    </h1>
                                                    <span style="display:inline-block; vertical-align:middle; margin:29px 0 26px; border-bottom:1px solid #cecece; width:100px;"></span>
                                                    <p style="color:#455056; font-size:15px;line-height:24px; margin:0;">
                                                        Tautan untuk aktivasi akun telah disiapkan untuk Anda.
                                                        Anda diberi waktu hingga 1 hari untuk aktivasi akun, jika melebihinya maka token untuk aktivasi akan hangus.
                                                    </p>
                                                    <a href="' . base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '" style="background:rgba(79, 70, 229, 1); text-decoration:none !important; font-weight:500; margin-top:35px; color:#fff; text-transform:uppercase; font-size:14px; padding:10px 24px; display:inline-block; border-radius:5px; cursor:pointer">
                                                        Aktivasi Akun
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
        } else if ($type == 'forgot') {
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
                                                    <a href="' . base_url() . 'auth/resetpassword?email=' . $this->input->post('forgotPassword') . '&token=' . urlencode($token) . '" style="background:rgba(79, 70, 229, 1); text-decoration:none !important; font-weight:500; margin-top:35px; color:#fff; text-transform:uppercase; font-size:14px; padding:10px 24px; display:inline-block; border-radius:5px; cursor:pointer">
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

    public function verify()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('masyarakat', ['email' => $email])->row_array();
        // var_dump($user);
        // die;

        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

            if ($user_token) {
                if (time() - $user_token['date_created'] < (60 * 60 * 24)) {
                    $this->db->set('is_active', 1);
                    $this->db->where('email', $email);
                    $this->db->update('masyarakat');

                    $this->db->delete('user_token', ['email' => $email]);
                    $this->session->set_flashdata('message', '<div class="text-green-500 text-center capitalize mb-4">Aktivasi akun berhasil</div>');
                    redirect('auth');
                } else {
                    $this->db->delete('masyarakat', ['email' => $email]);
                    $this->db->delete('user_token', ['email' => $email]);

                    $this->session->set_flashdata('message', '<div class="text-red-500 text-center capitalize mb-4">Aktivasi akun gagal, Token anda expired</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="text-red-500 text-center capitalize mb-4">Aktivasi akun gagal, Token anda salah</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="text-red-500 text-center capitalize mb-4">Aktivasi akun gagal, Email anda salah</div>');
            redirect('auth');
        }
    }

    public function forgotPassword()
    {
        $email = $this->input->post('forgotPassword');
        $user = $this->db->get_where('masyarakat', ['email' => $email, 'is_active' => 1])->row_array();

        if ($user) {
            $token = base64_encode(random_bytes(32));
            $user_token = [
                'email' => $email,
                'token' => $token,
                'date_created' => time()
            ];

            $this->db->insert('user_token', $user_token);
            $this->sendEmail($token, 'forgot');

            $this->session->set_flashdata('message-2', '<div class="text-green-500 text-center capitalize mb-4">Silahkan cek akun email anda untuk reset password</div>');
            redirect('auth');
        } else {
            $this->session->set_flashdata('message-2', '<div class="text-red-500 text-center capitalize mb-4">Email belum terdaftar</div>');
            redirect('auth');
        }
    }

    public function resetPassword()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('masyarakat', ['email' => $email])->row_array();
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
                $this->session->set_flashdata('message', '<div class="text-red-500 text-center capitalize mb-4">setel ulang password gagal,<br> token anda salah</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="text-red-500 text-center capitalize mb-4">setel ulang password gagal,<br> email anda salah</div>');
            redirect('auth');
        }
    }

    public function changePassword()
    {
        if (!$this->session->userdata('reset_email')) {
            redirect('auth');
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
            $this->db->update('masyarakat');

            $this->session->unset_userdata('reset_email');
            $this->session->set_flashdata('message', '<div class="text-green-500 text-center capitalize mb-4">password berhasil dirubah. silahkan login</div>');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('status');

        redirect('beranda');
    }
}
