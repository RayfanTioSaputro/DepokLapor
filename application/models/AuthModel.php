<?php
class AuthModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function register($nik, $nama, $telp, $email, $username, $password)
    {
        $data = array(
            'nik' => $nik,
            'nama' => $nama,
            'telp' => $telp,
            'email' => $email,
            'username' => $username,
            'password' => $password,
        );

        $this->db->insert('masyarakat', $data);
    }

    public function getByEmail($to)
    {
        $query = $this->db->query("SELECT * FROM masyarakat WHERE email=" . "'" . $to . "'");
        return $query->result();
    }
}
