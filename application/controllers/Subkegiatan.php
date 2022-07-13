<?php
defined('BASEPATH') or exit('No direct script access allowed');

include APPPATH . 'third_party/PHPExcel/PHPExcel.php';

class Subkegiatan extends CI_Controller
{
     function __construct()
     {
          parent::__construct();
     }

     public function index()
     {
          $data = [
               'judul' => 'Daftar Subkegiatan',
               'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
               'subkegiatan' => $this->db->query('select a.*, (select namakeg from kegiatan where kodekeg=a.kodekeg) as namakeg from subkegiatan a')->result(),
          ];
          $this->template->load('Template/Content', 'Subkegiatan/List', $data);
     }
     public function tambah()
     {
          $data = [
               'kodekeg' => $this->input->get('kodekeg'),
               'namasubkeg' => $this->input->get('namasubkeg'),
          ];
          $save = $this->db->insert('subkegiatan', $data);
          if ($save) {
               echo json_encode(['status' => 1]);
          } else {
               echo json_encode(['status' => 2]);
          }
     }
     public function ubah()
     {
          $where = [
               'id' => $this->input->get('idu'),
          ];
          $data = [
               'kodekeg' => $this->input->get('kodekegu'),
               'namasubkeg' => $this->input->get('namasubkegu'),
          ];
          $save = $this->db->update('subkegiatan', $data, $where);
          if ($save) {
               echo json_encode(['status' => 1]);
          } else {
               echo json_encode(['status' => 2]);
          }
     }
     public function hapus($id)
     {
          if ($id != '') {
               $this->db->where('id', $id);
               $this->db->delete('subkegiatan');
               echo json_encode(['status' => 1]);
          } else {
               echo json_encode(['status' => 2]);
          }
     }
     public function data()
     {
          $id = $this->input->get('id');
          $data = $this->db->query("select a.*, (select namakeg from kegiatan where kodekeg=a.kodekeg) as namakeg from subkegiatan a where a.id = '$id'")->row_array();
          echo json_encode($data);
     }
     public function upload()
     {
          $config['upload_path'] = realpath('excel');
          $config['allowed_types'] = 'xlsx|xls|csv';
          $config['max_size'] = '10000';
          $config['encrypt_name'] = true;
          $this->load->library('upload', $config);
          if (!$this->upload->do_upload()) {
               redirect('Subkegiatan');
          } else {
               $data_upload = $this->upload->data();
               $excelreader = new PHPExcel_Reader_Excel2007();
               $loadexcel = $excelreader->load('excel/' . $data_upload['file_name']);
               $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true, true);
               $data = array();
               $numrow = 1;
               foreach ($sheet as $row) {
                    if ($numrow > 1) {
                         array_push($data, array(
                              'kodekeg' => $row['A'],
                              'namasubkeg' => $row['B'],
                         ));
                    }
                    $numrow++;
               }
               $this->db->insert_batch('subkegiatan', $data);
               unlink(realpath('excel/' . $data_upload['file_name']));
               redirect('Subkegiatan');
          }
     }
     public function template()
     {
          $this->load->view('Subkegiatan/Template');
     }
}
