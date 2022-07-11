<div class="row">
     <div class="col">
          <div class="card shadow mb-4">
               <div class="card-body">
                    <div class="h4">PROGRAM
                         <button class="btn btn-primary btn-sm float-right" type="button" onclick="tambah_data()">
                              <i class="fas fa-plus-circle"></i> Tambah
                         </button>
                    </div>
                    <hr>
                    <div class="table-responsive">
                         <table class="table table-striped table-bordered table-hover" id="table-perencanaan">
                              <thead>
                                   <tr>
                                        <th width="1%">No</th>
                                        <th>Kode Program</th>
                                        <th>Nama Program</th>
                                        <th>Nama Sub Program</th>
                                        <th>Aksi</th>
                                   </tr>
                              </thead>
                              <tbody>
                                   <?php $no = 1;
                                   foreach ($subprogram as $sp) : ?>
                                        <tr>
                                             <td><?= $no++; ?></td>
                                             <td><?= $sp->kodeprog; ?></td>
                                             <td><?= $sp->namaprog; ?></td>
                                             <td><?= $sp->namasubprog; ?></td>
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
                              <label for="kodeprog" class="col-sm-4 col-form-label">Kode Program</label>
                              <div class="col-sm-8">
                                   <select name="kodeprog" id="kodeprog" class="form-control select2_prog" style="width: 100%;"></select>
                              </div>
                         </div>
                         <div class="form-group row">
                              <label for="namasubprog" class="col-sm-4 col-form-label">Nama Sub Program</label>
                              <div class="col-sm-8">
                                   <input type="text" class="form-control" id="namasubprog" name="namasubprog">
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

<script>
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

     function save() {
          var kodeprog = $('#kodeprog').val();
          var namasubprog = $('#namasubprog').val();
          if (namasubprog == '') {
               Swal.fire({
                    icon: 'error',
                    title: 'NAMA PROGRAM',
                    text: 'Tidak boleh kosong !',
               });
          }
          if (namasubprog != '') {
               $.ajax({
                    url: "<?= site_url('Subprogram/tambah/?kodeprog=') ?>" + kodeprog + "&namasubprog=" + namasubprog,
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
                                   location.href = "<?php echo base_url() ?>Subprogram";
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
</script>