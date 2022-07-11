<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Globali extends CI_Controller
{

     public function __construct()
     {
          parent::__construct();
     }
     public function dataprogram()
     {
          $key = $this->input->post('searchTerm');
          $data = $this->db->query("SELECT kodeprog AS id, CONCAT('[ ',namaprog,' ] ') AS text FROM program WHERE id LIKE '%" . $key . "%' OR kodeprog LIKE '%" . $key . "%' OR namaprog LIKE '%" . $key . "%' ORDER BY namaprog ASC")->result();
          echo json_encode($data);
     }
}
