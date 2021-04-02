<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PetugasModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAll()
    {
        $data = $this->db->query('SELECT * FROM petugas');
        return $data->result();
    }

    public function getAllRow()
    {
        $data = $this->db->query('SELECT * FROM petugas');
        return $data->num_rows();
    }

    public function getByLevel($level)
    {
        $data = $this->db->query('SELECT level FROM petugas WHERE username=' . '"' . $level . '"');
        return $data->result();
    }
}
