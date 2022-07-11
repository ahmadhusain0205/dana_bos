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
          if ($key == "") {
               $limm = "LIMIT 10";
          } else {
               $limm = "";
          }
          $data = $this->db->query("SELECT kodeprog AS id, CONCAT(' [ ',kodeprog,' ] ','-',' [ ',namaprog,' ] ') AS text FROM program WHERE id LIKE '%" . $key . "%' OR kodeprog LIKE '%" . $key . "%' OR namaprog LIKE '%" . $key . "%' ORDER BY kodeprog ASC $limm")->result();
          echo json_encode($data);
     }
     public function datasubprogram($str)
     {
          $key = $this->input->post('searchTerm');
          if ($str != '' || $str != 'null') {
               $data = $this->db->query("SELECT a.kodeprog AS id, CONCAT(' [ ',a.kodeprog,' ] ','-',' [ ',b.namaprog,' ] ','-',' [ ',a.namasubprog,' ] ') AS text FROM subprogram a join program b on a.kodeprog=b.kodeprog WHERE a.kodeprog = '$str' and (a.kodeprog LIKE '%" . $key . "%' OR b.namaprog LIKE '%" . $key . "%' OR a.namasubprog LIKE '%" . $key . "%') ORDER BY namaprog ASC")->result();
          } else {
               $data = $this->db->query("SELECT a.kodeprog AS id, CONCAT('-- PILIH PROGRAM TERLEBIH DAHULU --') AS text FROM subprogram a join program b on a.kodeprog=b.kodeprog WHERE a.kodeprog = '' and (a.kodeprog LIKE '%" . $key . "%' OR b.namaprog LIKE '%" . $key . "%' OR a.namasubprog LIKE '%" . $key . "%') ORDER BY namaprog ASC Limit 1")->result();
          }
          echo json_encode($data);
     }
     public function datapendidikan()
     {
          $key = $this->input->post('searchTerm');
          $data = $this->db->query("SELECT kodepen AS id, CONCAT(' [ ',namapen,' ] ') AS text FROM pendidikan WHERE id LIKE '%" . $key . "%' OR kodepen LIKE '%" . $key . "%' OR namapen LIKE '%" . $key . "%' ORDER BY namapen ASC")->result();
          echo json_encode($data);
     }
}
