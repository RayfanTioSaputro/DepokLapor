<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LaporanModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAllBySenderLaporan($data)
    {
        $data = $this->db->query('SELECT * FROM laporan WHERE pengaju=' . '"' . $data['user']['username'] . '"' . ' ORDER BY id DESC');
        return $data->result();
    }

    public function getAllBySenderRowLaporan($data)
    {
        $data = $this->db->query('SELECT * FROM laporan WHERE pengaju=' . '"' . $data['user']['username'] . '"');
        return $data->num_rows();
    }

    public function getAllWaitingBySenderLaporan($data)
    {
        $data = $this->db->query('SELECT * FROM laporan WHERE status=' . '"0" AND pengaju=' . '"' . $data['user']['username'] . '"' . ' ORDER BY id DESC');
        return $data->result();
    }

    public function getAllWaitingBySenderRowLaporan($data)
    {
        $data = $this->db->query('SELECT * FROM laporan WHERE status=' . '"0" AND pengaju=' . '"' . $data['user']['username'] . '"');
        return $data->num_rows();
    }

    public function getAllWaitingRowLaporan()
    {
        $data = $this->db->query('SELECT * FROM laporan WHERE status=' . '"0"');
        return $data->num_rows();
    }

    public function getAllProccessBySenderLaporan($data)
    {
        $data = $this->db->query('SELECT * FROM laporan WHERE status=' . '"Proses" AND pengaju=' . '"' . $data['user']['username'] . '"' .  'ORDER BY id DESC');
        return $data->result();
    }

    public function getAllProccessBySenderRowLaporan($data)
    {
        $data = $this->db->query('SELECT * FROM laporan WHERE status=' . '"Proses" AND pengaju=' . '"' . $data['user']['username'] . '"');
        return $data->num_rows();
    }

    public function getAllProccessRowLaporan()
    {
        $data = $this->db->query('SELECT * FROM laporan WHERE status=' . '"Proses"');
        return $data->num_rows();
    }

    public function getAllRowLaporan()
    {
        $data = $this->db->query('SELECT * FROM laporan');
        return $data->num_rows();
    }

    public function getAllByIdLaporan($id)
    {
        $data = $this->db->query('SELECT * FROM laporan WHERE id=' . $id);
        return $data->result();
    }

    public function getAllLaporanPengaduan()
    {
        $data = $this->db->query('SELECT * FROM laporan WHERE tipe_laporan=' . '"Pengaduan"' . 'ORDER BY id DESC');
        return $data->result();
    }

    public function getAllLaporanAspirasi()
    {
        $data = $this->db->query('SELECT * FROM laporan WHERE tipe_laporan=' . '"Aspirasi"' . 'ORDER BY id DESC');
        return $data->result();
    }

    public function getTanggapan($id)
    {
        $data = $this->db->query('SELECT * FROM tanggapan_laporan WHERE id_laporan=' . $id);
        return $data->result();
    }

    public function getTanggapanRow($id)
    {
        $data = $this->db->query('SELECT * FROM tanggapan_laporan WHERE id_laporan=' . $id);
        return $data->num_rows();
    }

    public function getAllKategoriLaporan()
    {
        $data = $this->db->query('SELECT id,kategori_laporan FROM laporan_2 WHERE kategori_laporan IS NOT NULL ORDER BY kategori_laporan ASC');
        return $data->result();
    }

    public function getAllTujuanInstansi()
    {
        $data = $this->db->query('SELECT id,tujuan_instansi FROM laporan_2 WHERE tujuan_instansi IS NOT NULL ORDER BY tujuan_instansi ASC');
        return $data->result();
    }
}
