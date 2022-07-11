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
}
