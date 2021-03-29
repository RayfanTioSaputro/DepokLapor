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
        return $data;
    }

    public function getAllRow()
    {
        $data = $this->getAll();
        return $data->num_rows();
    }
}
