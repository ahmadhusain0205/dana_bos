<div class="row">
     <div class="col">
          <div class="card shadow mb-4">
               <div class="card-body">
                    <div class="h4">MANAGEMENT ROLE MEMBER</div>
                    <hr>
                    <div class="table-responsive">
                         <table id="table-role" class="table table-striped table-bordered table-hover">
                              <thead>
                                   <tr class="text-center">
                                        <th width="1%">No</th>
                                        <th>Username</th>
                                        <th>Nama</th>
                                        <th>Role</th>
                                        <th width="10%">Aksi</th>
                                   </tr>
                              </thead>
                              <tbody>
                                   <?php $no = 1;
                                   foreach ($role as $r) : ?>
                                        <tr>
                                             <td><?= $no++; ?></td>
                                             <td><?= $r->username; ?></td>
                                             <td><?= $r->nama; ?></td>
                                             <td><?= $r->role; ?></td>
                                             <td class="text-center">
                                                  <?php if ($r->on_off == 1) : ?>
                                                       <button class="btn btn-sm btn-circle btn-warning" type="button" disabled><i class="fas fa-sync-alt"></i></button>
                                                  <?php else : ?>
                                                       <button class="btn btn-sm btn-circle btn-warning" type="button" onclick="ubah(<?= $r->id; ?>)"><i class="fas fa-sync-alt"></i></button>
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
                              <label for="username" class="col-sm-4 col-form-label">Username</label>
                              <div class="col-sm-8">
                                   <input type="text" class="form-control" id="username" name="username" readonly>
                              </div>
                         </div>
                         <div class="form-group row">
                              <label for="namaprog" class="col-sm-4 col-form-label">Nama Program</label>
                              <div class="col-sm-8">
                                   <select name="role" id="role" class="form-control select2_role" style="width: 100%;">
                                        <option value="">-- Pilih --</option>
                                        <option value="1">Bendahara</option>
                                        <option value="2">Kepala Sekolah</option>
                                        <option value="3">Pengawas</option>
                                   </select>
                              </div>
                         </div>
                    </div>
                    <div class="modal-footer">
                         <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Tutup</button>
                         <button type="button" onclick="save()" class="btn btn-primary btn-sm">Ubah</button>
                    </div>
               </form>
          </div>
     </div>
</div>

<script>
     $('.select2_role').select2();
     $(document).ready(function() {
          var table = $('#table-role').DataTable({
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
     function ubah(id) {
          $('#ubah_modal').modal('show');
          $.ajax({
               url: "<?php echo base_url(); ?>Role/data/?id=" + id,
               type: "GET",
               dataType: "JSON",
               success: function(data) {
                    $('#username').val(data.username);
               }
          });
     }

     function save() {
          var username = $('#username').val();
          var role = $('#role').val();
          if (role == '') {
               Swal.fire({
                    icon: 'error',
                    title: 'ROLE',
                    text: 'Tidak boleh kosong !',
               });
          }
          if (role != '') {
               $.ajax({
                    url: "<?= site_url('Role/ubah/?username=') ?>" + username + "&role=" + role,
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
                                   location.href = "<?php echo base_url() ?>Role";
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
</script>