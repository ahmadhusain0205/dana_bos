<div class="row">
     <div class="col">
          <div class="card shadow mb-4">
               <div class="card-body">
                    <div class="h4">PROGRAM
                         <button class="btn btn-primary btn-sm float-right" type="button" onclick="tambah_data()">
                              <i class="fas fa-plus-circle"></i> Tambah
                         </button>
                         <a type="button" href="#" class="btn btn-secondary btn-sm float-right my-auto mr-2" onclick="unggah_program()">
                              <i class="fas fa-upload"></i> Unggah
                         </a>
                         <a type="button" href="<?= site_url('Program/template') ?>" class="btn btn-info btn-sm float-right my-auto mr-2">
                              <i class="fas fa-download"></i> Template Excel
                         </a>
                    </div>
                    <hr>
                    <div class="table-responsive">
                         <table class="table table-striped table-bordered table-hover" id="table-perencanaan">
                              <thead>
                                   <tr class="text-center">
                                        <th width="1%">No</th>
                                        <th width="20%">Kode Program</th>
                                        <th>Nama Program</th>
                                        <th width="10%">Aksi</th>
                                   </tr>
                              </thead>
                              <tbody>
                                   <?php $no = 1;
                                   foreach ($program as $p) : ?>
                                        <tr>
                                             <td><?= $no++; ?></td>
                                             <td><?= $p->kodeprog; ?></td>
                                             <td><?= $p->namaprog; ?></td>
                                             <td class="text-center">
                                                  <button class="btn btn-sm btn-circle btn-warning" type="button" onclick="ubah(<?= $p->id; ?>)"><i class="fa fa-edit"></i></button>
                                                  <?php $sql = $this->db->query('select * from subprogram where kodeprog = "' . $p->kodeprog . '"')->result();
                                                  if ($sql) :
                                                  ?>
                                                       <button class="btn btn-sm btn-circle btn-danger" type="button" disabled><i class="fa fa-trash"></i></button>
                                                  <?php else : ?>
                                                       <button class="btn btn-sm btn-circle btn-danger" type="button" onclick="hapus(<?= $p->id; ?>)"><i class="fa fa-trash"></i></button>
                                                  <?php endif; ?>
                                             </td>
                                        </tr>
                                   <?php endforeach; ?>
                              </tbody>
                         </table>
                    </div>
               </div>
          </div>
     </div>
</div>

<div class="modal fade" id="tambah_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
               <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                    </button>
               </div>
               <form method="POST" id="modal_tambah">
                    <div class="modal-body">
                         <div class="form-group row">
                              <label for="kodeprog" class="col-sm-4 col-form-label">Kode Program</label>
                              <div class="col-sm-8">
                                   <input type="text" class="form-control" id="kodeprog" name="kodeprog" readonly value="<?= $kodeprog; ?>">
                              </div>
                         </div>
                         <div class="form-group row">
                              <label for="namaprog" class="col-sm-4 col-form-label">Nama Program</label>
                              <div class="col-sm-8">
                                   <input type="text" class="form-control" id="namaprog" name="namaprog">
                              </div>
                         </div>
                    </div>
                    <div class="modal-footer">
                         <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Tutup</button>
                         <button type="button" onclick="save()" class="btn btn-primary btn-sm">Tambahkan</button>
                    </div>
               </form>
          </div>
     </div>
</div>

<div class="modal fade" id="ubah_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
               <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ubah Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                    </button>
               </div>
               <form method="POST" id="modal_tambah">
                    <div class="modal-body">
                         <div class="form-group row">
                              <label for="kodeprogu" class="col-sm-4 col-form-label">Kode Program</label>
                              <div class="col-sm-8">
                                   <input type="text" class="form-control" id="kodeprogu" name="kodeprogu" readonly>
                              </div>
                         </div>
                         <div class="form-group row">
                              <label for="namaprogu" class="col-sm-4 col-form-label">Nama Program</label>
                              <div class="col-sm-8">
                                   <input type="text" class="form-control" id="namaprogu" name="namaprogu">
                              </div>
                         </div>
                    </div>
                    <div class="modal-footer">
                         <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Tutup</button>
                         <button type="button" onclick="savey()" class="btn btn-primary btn-sm">Ubah</button>
                    </div>
               </form>
          </div>
     </div>
</div>

<div class="modal fade" id="unggah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered modal-sm">
          <div class="modal-content">
               <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Unggah Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                    </button>
               </div>
               <form action="<?= base_url('Program/upload'); ?>" enctype="multipart/form-data" method="POST">
                    <div class="modal-body">
                         <div class="form-group">
                              <input type="file" name="userfile" class="form-control-user">
                         </div>
                    </div>
                    <div class="modal-footer">
                         <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                         <button type="submit" class="btn btn-success">Unggah</button>
                    </div>
               </form>
          </div>
     </div>
</div>

<script>
     function unggah_program() {
          $('#unggah').modal('show');
     }
     $(document).ready(function() {
          var table = $('#table-perencanaan').DataTable({
               "columnDefs": [{
                    "targets": [-1],
                    "orderable": false,
               }],
               "lengthMenu": [
                    [5, 20, 50, -1],
                    [5, 20, 50, 'semua']
               ],
               "oLanguage": {
                    "sEmptyTable": "<div class='text-center'>Data Kosong</div>",
                    "sInfoEmpty": "",
                    "sInfoFiltered": " - Dipilih dari _MAX_ data",
                    "sSearch": "Pencarian Data:",
                    "sInfo": " Jumlah _TOTAL_ Data (_START_ - _END_)",
                    "sLengthMenu": "_MENU_ Baris",
                    "sZeroRecords": "<div class='text-center'>Tida ada data</div>",
                    "oPaginate": {
                         "sPrevious": "Sebelumnya",
                         "sNext": "Berikutnya"
                    }
               },
               "scrollCollapse": false,
               "paging": true,
               "responsive": true,
          });
     });
</script>

<script>
     function tambah_data() {
          $('#tambah_modal').modal('show');
     }

     function ubah(id) {
          $('#ubah_modal').modal('show');
          $.ajax({
               url: "<?php echo base_url(); ?>Program/data/?id=" + id,
               type: "GET",
               dataType: "JSON",
               success: function(data) {
                    $('#kodeprogu').val(data.kodeprog);
                    $('#namaprogu').val(data.namaprog);
               }
          });
     }

     function save() {
          var kodeprog = $('#kodeprog').val();
          var namaprog = $('#namaprog').val();
          if (namaprog == '') {
               Swal.fire({
                    icon: 'error',
                    title: 'NAMA PROGRAM',
                    text: 'Tidak boleh kosong !',
               });
          }
          if (namaprog != '') {
               $.ajax({
                    url: "<?= site_url('Program/tambah/?kodeprog=') ?>" + kodeprog + "&namaprog=" + namaprog,
                    type: "GET",
                    dataType: "JSON",
                    success: function(data) {
                         if (data.status == 1) {
                              $('#tambah_modal').modal('hide');
                              Swal.fire({
                                   icon: 'success',
                                   title: 'TAMBAH DATA',
                                   text: 'Berhasil dilakukan !',
                              }).then((value) => {
                                   location.href = "<?php echo base_url() ?>Program";
                              });
                         } else {
                              $('#tambah_modal').modal('hide');
                              Swal.fire({
                                   icon: 'error',
                                   title: 'TAMBAH DATA',
                                   text: 'Gagal dilakukan !',
                              }).then((value) => {
                                   $('#tambah_modal').modal('show');
                              });
                         }
                    }
               });
          }
     }

     function savey() {
          var kodeprog = $('#kodeprogu').val();
          var namaprog = $('#namaprogu').val();
          if (namaprog == '') {
               Swal.fire({
                    icon: 'error',
                    title: 'NAMA PROGRAM',
                    text: 'Tidak boleh kosong !',
               });
          }
          if (namaprog != '') {
               $.ajax({
                    url: "<?= site_url('Program/ubah/?kodeprogu=') ?>" + kodeprog + "&namaprogu=" + namaprog,
                    type: "GET",
                    dataType: "JSON",
                    success: function(data) {
                         if (data.status == 1) {
                              $('#ubah_modal').modal('hide');
                              Swal.fire({
                                   icon: 'success',
                                   title: 'UBAH DATA',
                                   text: 'Berhasil dilakukan !',
                              }).then((value) => {
                                   location.href = "<?php echo base_url() ?>Program";
                              });
                         } else {
                              $('#ubah_modal').modal('hide');
                              Swal.fire({
                                   icon: 'error',
                                   title: 'UBAH DATA',
                                   text: 'Gagal dilakukan !',
                              }).then((value) => {
                                   $('#ubah_modal').modal('show');
                              });
                         }
                    }
               });
          }
     }

     function hapus(id) {
          $.ajax({
               url: "<?= site_url('Program/data/?id=') ?>" + id,
               type: "GET",
               dataType: "JSON",
               success: function(data) {
                    var namaprog = data.namaprog;
                    Swal.fire({
                         title: 'HAPUS DATA',
                         text: "Yakin ingin menghapus " + namaprog + " ?",
                         icon: 'warning',
                         showCancelButton: true,
                         confirmButtonColor: '#3085d6',
                         cancelButtonColor: '#d33',
                         confirmButtonText: 'Hapus',
                         CancelButtonText: 'Tidak'
                    }).then((result) => {
                         if (result.isConfirmed) {
                              $.ajax({
                                   url: "<?= site_url('Program/hapus/') ?>" + id,
                                   type: "GET",
                                   dataType: "JSON",
                                   success: function(data) {
                                        if (data.status == 1) {
                                             Swal.fire({
                                                  icon: 'success',
                                                  title: 'HAPUS DATA',
                                                  html: 'Berhasil dilakukan',
                                             }).then((value) => {
                                                  location.href = "<?php echo base_url() ?>Program";
                                             });
                                        } else {
                                             Swal.fire(
                                                  'HAPUS DATA',
                                                  'Gagal dilakukan !',
                                                  'error'
                                             );
                                        }
                                   }
                              });
                         }
                    });
               }
          });
     }
</script>