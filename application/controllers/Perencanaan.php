<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Perencanaan extends CI_Controller
{
     function __construct()
     {
          parent::__construct();
     }

     public function index()
     {
          $data = [
               'judul' => 'Daftar Perencanaan',
               'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
               'perencanaan' => $this->db->get('perencanaan')->result(),
          ];
          $this->template->load('Template/Content', 'Perencanaan/List', $data);
     }
     public function tambah()
     {
          $data = [
               'judul' => 'Tambah Perencanaan',
               'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
          ];
          $this->template->load('Template/Content', 'Perencanaan/Tambah', $data);
     }
     public function subprogram()
     {
          $kodeprog = $this->input->get('kodeprog');
          $data = $this->db->get_where('subprogram', ['kodeprog' => $kodeprog])->result();
          echo json_encode($data);
     }
}
