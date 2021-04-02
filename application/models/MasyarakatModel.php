<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MasyarakatModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAll()
    {
        $data = $this->db->query('SELECT * FROM masyarakat');
        return $data->result();
    }

    public function getAllRow()
    {
        $data = $this->db->query('SELECT * FROM masyarakat');
        return $data->num_rows();
    }
}
