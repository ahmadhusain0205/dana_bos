<div class="row">
     <div class="col">
          <div class="card shadow mb-4">
               <div class="card-body">
                    <div class="h4">SUBKEGIATAN
                         <button class="btn btn-primary btn-sm float-right" type="button" onclick="tambah_data()">
                              <i class="fas fa-plus-circle"></i> Tambah
                         </button>
                         <a type="button" href="#" class="btn btn-secondary btn-sm float-right my-auto mr-2" onclick="unggah_subprogram()">
                              <i class="fas fa-upload"></i> Unggah
                         </a>
                    </div>
                    <hr>
                    <div class="table-responsive">
                         <table class="table table-striped table-bordered table-hover" id="table-perencanaan">
                              <thead>
                                   <tr class="text-center">
                                        <th width="1%">No</th>
                                        <th width="20%">Kode Kegiatan</th>
                                        <th>Nama Kegiatan</th>
                                        <th>Nama Sub Kegiatan</th>
                                        <th width="10%">Aksi</th>
                                   </tr>
                              </thead>
                              <tbody>
                                   <?php $no = 1;
                                   foreach ($subkegiatan as $sp) : ?>
                                        <tr>
                                             <td><?= $no++; ?></td>
                                             <td><?= $sp->kodekeg; ?></td>
                                             <td><?= $sp->namakeg; ?></td>
                                             <td><?= $sp->namasubkeg; ?></td>
                                             <td class="text-center">
                                                  <button class="btn btn-sm btn-circle btn-warning" type="button" onclick="ubah(<?= $sp->id; ?>)"><i class="fa fa-edit"></i></button>
                                                  <button class="btn btn-sm btn-circle btn-danger" type="button" onclick="hapus(<?= $sp->id; ?>)"><i class="fa fa-trash"></i></button>
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
                              <label for="kodekeg" class="col-sm-4 col-form-label">Kode Kegiatan</label>
                              <div class="col-sm-8">
                                   <select name="kodekeg" id="kodekeg" class="form-control select2_keg" style="width: 100%;"></select>
                              </div>
                         </div>
                         <div class="form-group row">
                              <label for="namasubkeg" class="col-sm-4 col-form-label">Nama Sub Kegiatan</label>
                              <div class="col-sm-8">
                                   <input type="text" class="form-control" id="namasubkeg" name="namasubkeg">
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
                              <label for="kodekegu" class="col-sm-4 col-form-label">Kode Kegiatan</label>
                              <div class="col-sm-8">
                                   <input type="hidden" id="idu" name="idu">
                                   <input type="text" class="form-control" id="kodekegu" name="kodekegu" readonly>
                              </div>
                         </div>
                         <div class="form-group row">
                              <label for="namakegu" class="col-sm-4 col-form-label">Nama Kegiatan</label>
                              <div class="col-sm-8">
                                   <input type="text" class="form-control" id="namakegu" name="namakegu">
                              </div>
                         </div>
                         <div class="form-group row">
                              <label for="namasubkegu" class="col-sm-4 col-form-label">Nama Sub Kegiatan</label>
                              <div class="col-sm-8">
                                   <input type="text" class="form-control" id="namasubkegu" name="namasubkegu">
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
               <form action="<?= base_url('SubKegiatan/upload'); ?>" enctype="multipart/form-data" method="POST">
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
     function unggah_subprogram() {
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
               url: "<?php echo base_url(); ?>Subkegiatan/data/?id=" + id,
               type: "GET",
               dataType: "JSON",
               success: function(data) {
                    $('#idu').val(data.id);
                    $('#kodekegu').val(data.kodekeg);
                    $('#namakegu').val(data.namakeg);
                    $('#namasubkegu').val(data.namasubkeg);
               }
          });
     }

     function save() {
          var kodekeg = $('#kodekeg').val();
          var namasubkeg = $('#namasubkeg').val();
          if (namasubkeg == '') {
               Swal.fire({
                    icon: 'error',
                    title: 'NAMA PROGRAM',
                    text: 'Tidak boleh kosong !',
               });
          }
          if (namasubprog != '') {
               $.ajax({
                    url: "<?= site_url('Subkegiatan/tambah/?kodekeg=') ?>" + kodekeg + "&namasubkeg=" + namasubkeg,
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
                                   location.href = "<?php echo base_url() ?>Subkegiatan";
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
          var idu = $('#idu').val();
          var kodekeg = $('#kodekeg').val();
          var namasubkeg = $('#namasubkeg').val();
          if (namasubkeg == '') {
               Swal.fire({
                    icon: 'error',
                    title: 'NAMA SUB KEGIATAN',
                    text: 'Tidak boleh kosong !',
               });
          }
          if (namasubkeg != '') {
               $.ajax({
                    url: "<?= site_url('Subkegiatan/ubah/?id=') ?>" + id + "&kodekegu=" + kodekeg + "&namasubkegu=" + namasubkeg,
                    type: "GET",
                    dataType: "JSON",
                    success: function(data) {
                         if (data.status == 1) {
                              $('#ubah_modal').modal('hide');
                              Swal.fire({
                                   icon: 'success',
                                   title: 'TAMBAH DATA',
                                   text: 'Berhasil dilakukan !',
                              }).then((value) => {
                                   location.href = "<?php echo base_url() ?>Subkegiatan";
                              });
                         } else {
                              $('#ubah_modal').modal('hide');
                              Swal.fire({
                                   icon: 'error',
                                   title: 'TAMBAH DATA',
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
               url: "<?= site_url('Subkegiatan/data/?id=') ?>" + id,
               type: "GET",
               dataType: "JSON",
               success: function(data) {
                    var namakeg = data.namakeg;
                    Swal.fire({
                         title: 'HAPUS DATA',
                         text: "Yakin ingin menghapus " + namakeg + " ?",
                         icon: 'warning',
                         showCancelButton: true,
                         confirmButtonColor: '#3085d6',
                         cancelButtonColor: '#d33',
                         confirmButtonText: 'Hapus',
                         CancelButtonText: 'Tidak'
                    }).then((result) => {
                         if (result.isConfirmed) {
                              $.ajax({
                                   url: "<?= site_url('Subkegiatan/hapus/') ?>" + id,
                                   type: "GET",
                                   dataType: "JSON",
                                   success: function(data) {
                                        if (data.status == 1) {
                                             Swal.fire({
                                                  icon: 'success',
                                                  title: 'HAPUS DATA',
                                                  html: 'Berhasil dilakukan',
                                             }).then((value) => {
                                                  location.href = "<?php echo base_url() ?>Subkegiatan";
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