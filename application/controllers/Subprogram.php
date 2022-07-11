<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
}
