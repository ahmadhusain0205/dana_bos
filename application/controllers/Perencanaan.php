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
     public function save_header()
     {
          $i_pen = $this->input->post('standar_pendidikan');
          $sql_pen = $this->db->get_where('pendidikan', ['kodepen' => $i_pen])->row_array();
          $i_keg = $this->input->post('kegiatan');
          $sql_keg = $this->db->get_where('kegiatan', ['kodekeg' => $i_keg])->row_array();
          $i_prog = $this->input->post('program');
          $sql_prog = $this->db->get_where('program', ['kodeprog' => $i_prog])->row_array();
          $i_subkeg = $this->input->post('subkegiatan');
          $sql_subkeg = $this->db->get_where('subkegiatan', ['id' => $i_subkeg])->row_array();
          $i_subprog = $this->input->post('subprogram');
          $sql_subprog = $this->db->get_where('subprogram', ['id' => $i_subprog])->row_array();
          $data = array(
               'kodeper' => $this->M_invoice->kodeper(),
               'standar_pendidikan' => $sql_pen['namapen'],
               'kegiatan' => $sql_keg['namakeg'],
               'subkegiatan' => $sql_subkeg['namasubkeg'],
               'program' => $sql_prog['namaprog'],
               'subprogram' => $sql_subprog['namasubprog'],
               'triwulan' => $this->input->post('triwulan'),
               'subtotal' => $this->input->get('subtotal'),
               'total' => $this->input->get('total'),
               'tanggal' => date('Y-m-d', time()),
          );

          $this->db->insert('perencanaan', $data);
          echo json_encode(['status' => 1]);
          // echo json_encode($data);
     }
     public function save_detail()
     {
          $namabarang = $this->input->get('namabarang');
          $satuan = $this->input->get('satuan');
          $qty = $this->input->get('qty');
          $harga = $this->input->get('harga');
          $jumlah = $this->input->get('jumlah');
          $data = [
               'kodeper' => $this->M_invoice->kodeper(),
               'namabarang' => $namabarang,
               'satuan' => $satuan,
               'qty' => $qty,
               'harga' => $harga,
               'jumlah' => $jumlah,
          ];
          $this->db->insert('perencanaan_uraian', $data);
          // echo json_encode($data);
     }
}
