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
          $data = array(
               'standar_pendidikan' => $this->input->post('standar_pendidikan'),
               'nama_kegiatan' => $this->input->post('nama_kegiatan'),
               'program' => $this->input->post('program'),
               'sub_program' => $this->input->post('sub_program'),
               'triwulan' => $this->input->post('triwulan'),
               'subtotal' => $this->input->get('subtotal'),
               'total' => $this->input->get('total'),
          );

          // $this->M_perencanaan->save($data);
          // echo json_encode(['status' => 1]);
          echo json_encode($data);
     }
     public function save_detail()
     {
          $get_id = $this->db->query("SELECT id FROM perencanaan order by id desc limit 1")->result();
          foreach ($get_id as $gi) {
               $id_perencanaan = $gi->id;
          }
          $namabarang = $this->input->get('namabarang');
          $satuan = $this->input->get('satuan');
          $qty = $this->input->get('qty');
          $harga = $this->input->get('harga');
          $jumlah = $this->input->get('jumlah');
          $data = [
               'id_perencanaan' => $id_perencanaan,
               'namabarang' => $namabarang,
               'satuan' => $satuan,
               'qty' => $qty,
               'harga' => $harga,
               'jumlah' => $jumlah,
          ];
          $this->db->insert('perencanaan_uraian', $data);
     }
}
