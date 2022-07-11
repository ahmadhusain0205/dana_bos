<?php
class M_invoice extends CI_Model
{
     public function kodeprog()
     {
          $sql = "SELECT kodeprog AS kodeprog FROM program ORDER BY kodeprog DESC LIMIT 1";
          $query = $this->db->query($sql);
          if ($query->num_rows() > 0) {
               $row = $query->row();
               $n = (substr($row->kodeprog, 1)) + 1;
               $no = sprintf("%'.06d", $n);
          } else {
               $no = "000001";
          }
          $invoice = "P" . $no;
          return $invoice;
     }
     public function kodepen()
     {
          $sql = "SELECT kodepen AS kodepen FROM pendidikan ORDER BY kodepen DESC LIMIT 1";
          $query = $this->db->query($sql);
          if ($query->num_rows() > 0) {
               $row = $query->row();
               $n = (substr($row->kodepen, 2)) + 1;
               $no = sprintf("%'.06d", $n);
          } else {
               $no = "000001";
          }
          $invoice = "SP" . $no;
          return $invoice;
     }
}
