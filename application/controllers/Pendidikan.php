<?php
defined('BASEPATH') or exit('No direct script access allowed');

include APPPATH . 'third_party/PHPExcel/PHPExcel.php';

class Pendidikan extends CI_Controller
{
     function __construct()
     {
          parent::__construct();
     }

     public function index()
     {
          $data = [
               'judul' => 'Daftar Standar Pendidikan',
               'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
               'pendidikan' => $this->db->get('pendidikan')->result(),
               'kodepen' => $this->M_invoice->kodepen(),
          ];
          $this->template->load('Template/Content', 'Pendidikan/List', $data);
     }
     public function tambah()
     {
          $data = [
               'kodepen' => $this->input->get('kodepen'),
               'namapen' => $this->input->get('namapen'),
          ];
          $save = $this->db->insert('pendidikan', $data);
          if ($save) {
               echo json_encode(['status' => 1]);
          } else {
               echo json_encode(['status' => 2]);
          }
     }
     public function ubah()
     {
          $where = [
               'kodepen' => $this->input->get('kodepenu'),
          ];
          $data = [
               'namapen' => $this->input->get('namapenu'),
          ];
          $save = $this->db->update('pendidikan', $data, $where);
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
               $this->db->delete('pendidikan');
               echo json_encode(['status' => 1]);
          } else {
               echo json_encode(['status' => 2]);
          }
     }
     public function data()
     {
          $id = $this->input->get('id');
          $data = $this->db->get_where('pendidikan', ['id' => $id])->row_array();
          echo json_encode($data);
     }
}
