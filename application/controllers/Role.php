<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Role extends CI_Controller
{
     function __construct()
     {
          parent::__construct();
     }
     public function index()
     {
          $data = [
               'judul' => 'Management Tole',
               'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
               'role' => $this->db->query("select a.*, (select role from role where id=a.id_role) as role from user a")->result(),
          ];
          $this->template->load('Template/Content', 'Role/List', $data);
     }
     public function data()
     {
          $id = $this->input->get('id');
          $data = $this->db->get_where('user', ['id' => $id])->row_array();
          echo json_encode($data);
     }
     public function ubah()
     {
          $where = [
               'username' => $this->input->get('username'),
          ];
          $data = [
               'id_role' => $this->input->get('role'),
          ];
          $save = $this->db->update('user', $data, $where);
          if ($save) {
               echo json_encode(['status' => 1]);
          } else {
               echo json_encode(['status' => 2]);
          }
     }
}
