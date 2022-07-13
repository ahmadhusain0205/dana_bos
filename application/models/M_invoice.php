<?php
class M_invoice extends CI_Model
{
     public function kodeper()
     {
          $sql = "SELECT kodeper AS kodeper FROM perencanaan ORDER BY kodeper DESC LIMIT 1";
          $query = $this->db->query($sql);
          if ($query->num_rows() > 0) {
               $row = $query->row();
               $n = (substr($row->kodeper, 1)) + 1;
               $no = sprintf("%'.06d", $n);
          } else {
               $no = "000001";
          }
          $invoice = "PR" . $no;
          return $invoice;
     }
     public function kodekeg()
     {
          $sql = "SELECT kodekeg AS kodekeg FROM kegiatan ORDER BY kodekeg DESC LIMIT 1";
          $query = $this->db->query($sql);
          if ($query->num_rows() > 0) {
               $row = $query->row();
               $n = (substr($row->kodekeg, 1)) + 1;
               $no = sprintf("%'.06d", $n);
          } else {
               $no = "000001";
          }
          $invoice = "K" . $no;
          return $invoice;
     }
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
