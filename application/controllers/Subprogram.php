<?php
defined('BASEPATH') or exit('No direct script access allowed');

include APPPATH . 'third_party/PHPExcel/PHPExcel.php';

class Subprogram extends CI_Controller
{
     function __construct()
     {
          parent::__construct();
     }

     public function index()
     {
          $data = [
               'judul' => 'Daftar Subrogram',
               'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
               'subprogram' => $this->db->query('select a.*, (select namaprog from program where kodeprog=a.kodeprog) as namaprog from subprogram a')->result(),
          ];
          $this->template->load('Template/Content', 'Subprogram/List', $data);
     }
     public function tambah()
     {
          $data = [
               'kodeprog' => $this->input->get('kodeprog'),
               'namasubprog' => $this->input->get('namasubprog'),
          ];
          $save = $this->db->insert('subprogram', $data);
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
               'kodeprog' => $this->input->get('kodeprogu'),
               'namasubprog' => $this->input->get('namasubprogu'),
          ];
          $save = $this->db->update('subprogram', $data, $where);
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
               $this->db->delete('subprogram');
               echo json_encode(['status' => 1]);
          } else {
               echo json_encode(['status' => 2]);
          }
     }
     public function data()
     {
          $id = $this->input->get('id');
          $data = $this->db->query("select a.*, (select namaprog from program where kodeprog=a.kodeprog) as namaprog from subprogram a where a.id = '$id'")->row_array();
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
               redirect('Subprogram');
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
                              'namasubprog' => $row['B'],
                         ));
                    }
                    $numrow++;
               }
               $this->db->insert_batch('subprogram', $data);
               unlink(realpath('excel/' . $data_upload['file_name']));
               redirect('Subprogram');
          }
     }
     public function template()
     {
          $this->load->view('Subprogram/Template');
     }
}
