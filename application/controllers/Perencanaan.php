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
          // $i_pen = $this->input->post('standar_pendidikan');
          // $sql_pen = $this->db->get_where('pendidikan', ['kodepen' => $i_pen])->row_array();
          $i_keg = $this->input->post('kegiatan');
          $sql_keg = $this->db->get_where('kegiatan', ['kodekeg' => $i_keg])->row_array();
          $i_prog = $this->input->post('program');
          $sql_prog = $this->db->get_where('program', ['kodeprog' => $i_prog])->row_array();
          $i_subkeg = $this->input->post('subkegiatan');
          $sql_subkeg = $this->db->get_where('subkegiatan', ['id' => $i_subkeg])->row_array();
          $i_subprog = $this->input->post('subprogram');
          $sql_subprog = $this->db->get_where('subprogram', ['id' => $i_subprog])->row_array();
          $kodeper = $this->M_invoice->kodeper();
          $data = array(
               'kodeper' => $kodeper,
               // 'standar_pendidikan' => $sql_pen['namapen'],
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
          echo json_encode(['status' => 1, 'kodeper' => $kodeper]);
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
               'kodeper' => $this->input->get('kodeper'),
               'namabarang' => $namabarang,
               'satuan' => $satuan,
               'qty' => $qty,
               'harga' => $harga,
               'jumlah' => $jumlah,
          ];
          $this->db->insert('perencanaan_uraian', $data);
          // echo json_encode($data);
     }
     public function data()
     {
          $id = $this->input->get('id');
          $data = $this->db->get_where('perencanaan', ['id' => $id])->row_array();
          echo json_encode($data);
     }
     public function hapus($id)
     {
          if ($id != '') {
               $sql = $this->db->get_where('perencanaan', ['id' => $id])->row_array();
               $kodeper = $sql['kodeper'];
               $this->db->where('kodeper', $kodeper);
               $this->db->delete('perencanaan_uraian');

               $this->db->where('id', $id);
               $this->db->delete('perencanaan');
               echo json_encode(['status' => 1]);
          } else {
               echo json_encode(['status' => 2]);
          }
     }
     public function edit($kodeper)
     {
          $data = [
               'judul' => 'Detail ' . strtoupper($kodeper),
               'invoice' => $kodeper,
               'queryx' => $this->db->get_where('perencanaan', ['kodeper' => $kodeper])->row(),
               'query' => $this->db->get_where('perencanaan_uraian', ['kodeper' => $kodeper])->result(),
               'jumdetail' => $this->db->get_where('perencanaan_uraian', ['kodeper' => $kodeper])->num_rows(),
               'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
          ];
          $this->template->load('Template/Content', 'Perencanaan/Edit', $data);
     }
     public function update_header()
     {
          // $i_pen = $this->input->post('standar_pendidikan');
          // $sql_pen = $this->db->get_where('pendidikan', ['kodepen' => $i_pen])->row_array();
          $i_keg = $this->input->post('kegiatan');
          $sql_keg = $this->db->get_where('kegiatan', ['kodekeg' => $i_keg])->row_array();
          $i_prog = $this->input->post('program');
          $sql_prog = $this->db->get_where('program', ['kodeprog' => $i_prog])->row_array();
          $i_subkeg = $this->input->post('subkegiatan');
          $sql_subkeg = $this->db->get_where('subkegiatan', ['id' => $i_subkeg])->row_array();
          $i_subprog = $this->input->post('subprogram');
          $sql_subprog = $this->db->get_where('subprogram', ['id' => $i_subprog])->row_array();
          $data = array(
               'kodeper' => $this->input->get('kodeper'),
               // 'standar_pendidikan' => $sql_pen['namapen'],
               'kegiatan' => $sql_keg['namakeg'],
               'subkegiatan' => $sql_subkeg['namasubkeg'],
               'program' => $sql_prog['namaprog'],
               'subprogram' => $sql_subprog['namasubprog'],
               'triwulan' => $this->input->post('triwulan'),
               'subtotal' => $this->input->get('subtotal'),
               'total' => $this->input->get('total'),
               'tanggal' => date('Y-m-d', time()),
          );
          $this->db->where('kodeper', $this->input->get('kodeper'));
          $this->db->delete('perencanaan');

          $where = [
               'kodeper' => $this->input->get('kodeper'),
          ];
          $this->db->where($where);
          $this->db->delete('perencanaan_uraian');

          $this->db->insert('perencanaan', $data);
          echo json_encode(['status' => 1]);
          // echo json_encode($data);
     }
     public function update_detail()
     {
          $kodeper = $this->input->get('kodeper');
          $namabarang = $this->input->get('namabarang');
          $satuan = $this->input->get('satuan');
          $qty = $this->input->get('qty');
          $harga = $this->input->get('harga');
          $jumlah = $this->input->get('jumlah');
          $data = [
               'kodeper' => $kodeper,
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
