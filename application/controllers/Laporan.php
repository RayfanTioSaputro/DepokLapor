<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Dompdf\Dompdf;

class Laporan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model('laporanmodel');
        $this->load->model('masyarakatmodel');
        $this->load->model('petugasmodel');

        require_once 'application/libraries/dompdf/autoload.inc.php';
        $dompdf = new Dompdf();
        $options = $dompdf->getOptions();
        $options->setDefaultFont('Helvetica');
        $dompdf->setOptions($options);
    }

    public function pengaduan($method = "", $id = "")
    {
        $data['page'] = 'Laporan Pengaduan';
        $data['user'] = $this->db->get_where('petugas', [
            'username' => $this->session->userdata('username-2'),
        ])->row_array();
        $data['laporan'] = $this->laporanmodel->getAllLaporanPengaduan();
        $data['masyarakat'] = $this->masyarakatmodel->getAll();
        $data['petugas'] = $this->petugasmodel->getAll();
        $level = $this->session->userdata('username-2');
        $data['level'] = $this->petugasmodel->getByLevel($level);

        $this->load->view('petugas/template/header', $data);
        switch ($method) {
            case 'generatePDF':
                $data['page'] = 'Laporan';
                // $data['laporan'] = $this->laporanmodel->getAllByIdLaporan($id);
                ob_start();
                include './application/views/petugas/laporan/laporan_pengaduan/pdf.php';
                // var_dump(include './application/views/petugas/laporan/laporan_pengaduan/pdf.php');
                // die;
                $html = ob_get_clean();
                if (ob_get_length()) ob_end_clean();
                $dompdf->loadHtml($html);
                $dompdf->setPaper('A4', 'portrait');
                $dompdf->render();
                $dompdf->stream('laporan_pengaduan_' . date('d-m-Y_His') . '.pdf', ['Attachment' => false]);
                break;
            case 'detail':
                $data['page'] = 'Detail';
                $data['laporan'] = $this->laporanmodel->getAllByIdLaporan($id);

                if ($this->session->userdata('status-2') == "login") {
                    $this->load->view('petugas/laporan/laporan_pengaduan/detail', $data);
                } else if ($this->session->userdata('status-2') != "login") {
                    $this->session->set_flashdata('message-warning', '<div class="text-white text-center text-capitalize">Harap Login Terlebih Dahulu</div>');
                    redirect('auth_petugas');
                }
                break;
            case 'beriTanggapan':
                $data['page'] = 'Beri Tanggapan';
                $data['laporan'] = $this->laporanmodel->getAllByIdLaporan($id);
                $data['tanggapan'] = $this->laporanmodel->getTanggapan($id);

                if ($this->session->userdata('status-2') == "login") {
                    $this->load->view('petugas/laporan/laporan_pengaduan/tanggapan', $data);
                } else if ($this->session->userdata('status-2') != "login") {
                    $this->session->set_flashdata('message-warning', '<div class="text-white text-center text-capitalize">Harap Login Terlebih Dahulu</div>');
                    redirect('auth_petugas');
                }
                break;
            case 'tanggapan':
                $id = $this->input->post('idTanggapan');

                $data = [
                    'id_laporan' => $id,
                    'pemberi_tanggapan' => $this->session->userdata('username-2'),
                    'role_pemberi_tanggapan' => "Petugas",
                    'isi_tanggapan' => htmlspecialchars($this->input->post('tanggapan', true)),
                    'date_created' => date("H:i:s")
                ];

                // var_dump($data);
                // die;

                $this->db->insert('tanggapan_laporan', $data);

                $this->session->set_flashdata('message-success', '<div class="text-white text-center text-capitalize">Berhasil Menanggapi Laporan</div>');
                redirect('laporan/pengaduan/beriTanggapan/' . $id);
                break;
            case 'acceptLaporan':
                $id = $this->input->post('idUpdate');
                $data = [
                    "status" => "Proses"
                ];

                $this->db->set($data);
                $this->db->where('id', $id);
                $this->db->update('laporan');

                $this->session->set_flashdata('message-success', '<div class="text-white text-center text-capitalize">Berhasil Menerima Pengaduan</div>');
                redirect('laporan/pengaduan');
                break;
            case 'delete':
                $id = $this->input->post('idDelete');

                $this->db->where('id', $id);
                $this->db->delete('laporan');

                $this->session->set_flashdata('message-success', '<div class="text-white text-center text-capitalize">Berhasil Menghapus Laporan</div>');
                redirect('laporan/pengaduan');
                break;
            default:
                if ($this->session->userdata('status-2') == "login") {
                    $this->load->view('petugas/laporan/laporan_pengaduan/index', $data);
                } else if ($this->session->userdata('status-2') != "login") {
                    $this->session->set_flashdata('message-warning', '<div class="text-white text-center text-capitalize">Harap Login Terlebih Dahulu</div>');
                    redirect('auth_petugas');
                }
                break;
        }
        $this->load->view('petugas/template/footer');
    }

    public function aspirasi($method = "", $id = "")
    {
        $data['page'] = 'Laporan Aspirasi';
        $data['user'] = $this->db->get_where('petugas', [
            'username' => $this->session->userdata('username-2'),
        ])->row_array();
        $data['laporan'] = $this->laporanmodel->getAllLaporanAspirasi();
        $level = $this->session->userdata('username-2');
        $data['level'] = $this->petugasmodel->getByLevel($level);

        $this->load->view('petugas/template/header', $data);
        switch ($method) {
            case 'detail':
                $data['page'] = 'Detail';
                $data['laporan'] = $this->laporanmodel->getAllByIdLaporan($id);

                if ($this->session->userdata('status-2') == "login") {
                    $this->load->view('petugas/laporan/laporan_aspirasi/detail', $data);
                } else if ($this->session->userdata('status-2') != "login") {
                    $this->session->set_flashdata('message-warning', '<div class="text-white text-center text-capitalize">Harap Login Terlebih Dahulu</div>');
                    redirect('auth_petugas');
                }
                break;
            case 'beriTanggapan':
                $data['page'] = 'Beri Tanggapan';
                $data['laporan'] = $this->laporanmodel->getAllByIdLaporan($id);
                $data['tanggapan'] = $this->laporanmodel->getTanggapan($id);

                if ($this->session->userdata('status-2') == "login") {
                    $this->load->view('petugas/laporan/laporan_aspirasi/tanggapan', $data);
                } else if ($this->session->userdata('status-2') != "login") {
                    $this->session->set_flashdata('message-warning', '<div class="text-white text-center text-capitalize">Harap Login Terlebih Dahulu</div>');
                    redirect('auth_petugas');
                }
                break;
            case 'tanggapan':
                $id = $this->input->post('idTanggapan');

                $data = [
                    'id_laporan' => $id,
                    'pemberi_tanggapan' => $this->session->userdata('username-2'),
                    'role_pemberi_tanggapan' => "Petugas",
                    'isi_tanggapan' => htmlspecialchars($this->input->post('tanggapan', true)),
                    'date_created' => date("H:i:s")
                ];

                // var_dump($data);
                // die;

                $this->db->insert('tanggapan_laporan', $data);

                $this->session->set_flashdata('message-success', '<div class="text-white text-center text-capitalize">Berhasil Menanggapi Laporan</div>');
                redirect('laporan/aspirasi/beriTanggapan/' . $id);
                break;
            case 'acceptLaporan':
                $id = $this->input->post('idUpdate');
                $data = [
                    "status" => "Proses"
                ];

                $this->db->set($data);
                $this->db->where('id', $id);
                $this->db->update('laporan');

                $this->session->set_flashdata('message-success', '<div class="text-white text-center text-capitalize">Berhasil Menerima Aspirasi</div>');
                redirect('laporan/aspirasi');
                break;
            case 'delete':
                $id = $this->input->post('idDelete');

                $this->db->where('id', $id);
                $this->db->delete('laporan');

                $this->session->set_flashdata('message-success', '<div class="text-white text-center text-capitalize">Berhasil Menghapus Laporan</div>');
                redirect('laporan/aspirasi');
                break;
            default:
                if ($this->session->userdata('status-2') == "login") {
                    $this->load->view('petugas/laporan/laporan_aspirasi/index', $data);
                } else if ($this->session->userdata('status-2') != "login") {
                    $this->session->set_flashdata('message-warning', '<div class="text-white text-center text-capitalize">Harap Login Terlebih Dahulu</div>');
                    redirect('auth_petugas');
                }
                break;
        }
        $this->load->view('petugas/template/footer');
    }

    public function kategori($method = "", $id = "")
    {
        $data['page'] = 'Manajemen Kategori';
        $data['user'] = $this->db->get_where('petugas', [
            'username' => $this->session->userdata('username-2'),
        ])->row_array();
        $data['laporan'] = $this->laporanmodel->getAllLaporanAspirasi();
        $level = $this->session->userdata('username-2');
        $data['level'] = $this->petugasmodel->getByLevel($level);
    }

    public function kategori_laporan($method = "")
    {
        $data['page'] = 'Kategori Laporan';
        $data['user'] = $this->db->get_where('petugas', [
            'username' => $this->session->userdata('username-2'),
        ])->row_array();
        $data['kategori_laporan'] = $this->laporanmodel->getAllKategoriLaporan();
        $level = $this->session->userdata('username-2');
        $data['level'] = $this->petugasmodel->getByLevel($level);

        $this->load->view('petugas/template/header', $data);
        switch ($method) {
            case 'create':
                $data = [
                    'kategori_laporan' => htmlspecialchars($this->input->post('add_kategori_laporan', true)),
                ];

                $this->db->insert('laporan_2', $data);

                $this->session->set_flashdata('message-success', '<div class="text-white text-center text-capitalize">Berhasil Menambahkan Kategori Laporan</div>');
                redirect('laporan/kategori_laporan');
                break;
            case 'update':
                $id = $this->input->post('idUpdate');
                $data = [
                    'kategori_laporan' => $this->input->post('update_kategori_laporan'),
                ];

                $this->db->set($data);
                $this->db->where('id', $id);
                $this->db->update('laporan_2');

                $this->session->set_flashdata('message-success', '<div class="text-white text-center text-capitalize">Berhasil Mengubah Kategori Laporan</div>');
                redirect('laporan/kategori_laporan');
                break;
            case 'delete':
                $id = $this->input->post('idDelete');

                $data = [
                    'kategori_laporan' => NULL,
                ];

                $this->db->set($data);
                $this->db->where('id', $id);
                $this->db->update('laporan_2');

                $this->session->set_flashdata('message-success', '<div class="text-white text-center text-capitalize">Berhasil Menghapus Kategori Laporan</div>');
                redirect('laporan/kategori_laporan');
                break;
            default:
                if ($this->session->userdata('status-2') == "login") {
                    $this->load->view('petugas/laporan/kategori_laporan/index', $data);
                } else if ($this->session->userdata('status-2') != "login") {
                    $this->session->set_flashdata('message-warning', '<div class="text-white text-center text-capitalize">Harap Login Terlebih Dahulu</div>');
                    redirect('auth_petugas');
                }
                break;
        }
        $this->load->view('petugas/template/footer');
    }

    public function tujuan_instansi($method = "")
    {
        $data['page'] = 'Tujuan Instansi';
        $data['user'] = $this->db->get_where('petugas', [
            'username' => $this->session->userdata('username-2'),
        ])->row_array();
        $data['tujuan_instansi'] = $this->laporanmodel->getAllTujuanInstansi();
        $level = $this->session->userdata('username-2');
        $data['level'] = $this->petugasmodel->getByLevel($level);

        $this->load->view('petugas/template/header', $data);
        switch ($method) {
            case 'create':
                $data = [
                    'tujuan_instansi' => htmlspecialchars($this->input->post('add_tujuan_instansi', true)),
                ];

                $this->db->insert('laporan_2', $data);

                $this->session->set_flashdata('message-success', '<div class="text-white text-center text-capitalize">Berhasil Menambahkan Tujuan Instansi</div>');
                redirect('laporan/tujuan_instansi');
                break;
            case 'update':
                $id = $this->input->post('idUpdate');
                $data = [
                    'tujuan_instansi' => $this->input->post('update_tujuan_instansi'),
                ];

                $this->db->set($data);
                $this->db->where('id', $id);
                $this->db->update('laporan_2');

                $this->session->set_flashdata('message-success', '<div class="text-white text-center text-capitalize">Berhasil Mengubah Tujuan Instansi</div>');
                redirect('laporan/tujuan_instansi');
                break;
            case 'delete':
                $id = $this->input->post('idDelete');

                $data = [
                    'tujuan_instansi' => NULL,
                ];

                $this->db->set($data);
                $this->db->where('id', $id);
                $this->db->update('laporan_2');

                $this->session->set_flashdata('message-success', '<div class="text-white text-center text-capitalize">Berhasil Menghapus Tujuan Instansi</div>');
                redirect('laporan/tujuan_instansi');
                break;
            default:
                if ($this->session->userdata('status-2') == "login") {
                    $this->load->view('petugas/laporan/tujuan_instansi/index', $data);
                } else if ($this->session->userdata('status-2') != "login") {
                    $this->session->set_flashdata('message-warning', '<div class="text-white text-center text-capitalize">Harap Login Terlebih Dahulu</div>');
                    redirect('auth_petugas');
                }
                break;
        }
        $this->load->view('petugas/template/footer');
    }
}
