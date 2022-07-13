<?php
defined('BASEPATH') or exit('No direct script access allowed');

include APPPATH . 'third_party/PHPExcel/PHPExcel.php';

class Program extends CI_Controller
{
     function __construct()
     {
          parent::__construct();
     }

     public function index()
     {
          $data = [
               'judul' => 'Daftar Program',
               'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
               'program' => $this->db->get('program')->result(),
               'kodeprog' => $this->M_invoice->kodeprog(),
          ];
          $this->template->load('Template/Content', 'Program/List', $data);
     }
     public function tambah()
     {
          $data = [
               'kodeprog' => $this->input->get('kodeprog'),
               'namaprog' => $this->input->get('namaprog'),
          ];
          $save = $this->db->insert('program', $data);
          if ($save) {
               echo json_encode(['status' => 1]);
          } else {
               echo json_encode(['status' => 2]);
          }
     }
     public function ubah()
     {
          $where = [
               'kodeprog' => $this->input->get('kodeprogu'),
          ];
          $data = [
               'namaprog' => $this->input->get('namaprogu'),
          ];
          $save = $this->db->update('program', $data, $where);
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
               $this->db->delete('program');
               echo json_encode(['status' => 1]);
          } else {
               echo json_encode(['status' => 2]);
          }
     }
     public function data()
     {
          $id = $this->input->get('id');
          $data = $this->db->get_where('program', ['id' => $id])->row_array();
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
               redirect('Program');
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
                              'kodeprog' => $row['A'],
                              'namaprog' => $row['B'],
                         ));
                    }
                    $numrow++;
               }
               $this->db->insert_batch('program', $data);
               unlink(realpath('excel/' . $data_upload['file_name']));
               redirect('Program');
          }
     }
     public function template()
     {
          $this->load->view('Program/Template');
     }
}
