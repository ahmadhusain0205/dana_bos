<?php
defined('BASEPATH') or exit('No direct script access allowed');

include APPPATH . 'third_party/PHPExcel/PHPExcel.php';

class Kegiatan extends CI_Controller
{
     function __construct()
     {
          parent::__construct();
     }

     public function index()
     {
          $data = [
               'judul' => 'Daftar Kegiatan',
               'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
               'kegiatan' => $this->db->get('kegiatan')->result(),
               'kodekeg' => $this->M_invoice->kodekeg(),
          ];
          $this->template->load('Template/Content', 'Kegiatan/List', $data);
     }
     public function tambah()
     {
          $data = [
               'kodekeg' => $this->input->get('kodekeg'),
               'namakeg' => $this->input->get('namakeg'),
          ];
          $save = $this->db->insert('kegiatan', $data);
          if ($save) {
               echo json_encode(['status' => 1]);
          } else {
               echo json_encode(['status' => 2]);
          }
     }
     public function ubah()
     {
          $where = [
               'kodekeg' => $this->input->get('kodekegu'),
          ];
          $data = [
               'namakeg' => $this->input->get('namakegu'),
          ];
          $save = $this->db->update('kegiatan', $data, $where);
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
               $this->db->delete('kegiatan');
               echo json_encode(['status' => 1]);
          } else {
               echo json_encode(['status' => 2]);
          }
     }
     public function data()
     {
          $id = $this->input->get('id');
          $data = $this->db->get_where('kegiatan', ['id' => $id])->row_array();
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
               redirect('Kegiatan');
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
                              'namakeg' => $row['B'],
                         ));
                    }
                    $numrow++;
               }
               $this->db->insert_batch('kegiatan', $data);
               unlink(realpath('excel/' . $data_upload['file_name']));
               redirect('Kegiatan');
          }
     }
}
