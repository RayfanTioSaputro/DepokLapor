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

    // public function getData()
    // {
    //     $data = $this->db->query('SELECT * FROM petugas WHERE id ORDER BY id');
    //     return $data->result();
    // }

    public function getById($id)
    {
        $data = $this->db->query('SELECT * FROM petugas WHERE id=' . $id);
        return $data->result();
    }
}
