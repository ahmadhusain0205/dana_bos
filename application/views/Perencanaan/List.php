<div class="row">
     <div class="col">
          <div class="card shadow mb-4">
               <div class="card-body">
                    <div class="h4">PERENCANAAN
                         <a href="<?= site_url('Perencanaan/tambah') ?>" class="btn btn-primary btn-sm float-right" type="button">
                              <i class="fas fa-plus-circle"></i> Tambah
                         </a>
                    </div>
                    <hr>
                    <div class="table-responsive">
                         <table class="table table-striped table-bordered table-hover" id="table-perencanaan">
                              <thead>
                                   <tr class="text-center">
                                        <th width="1%">No</th>
                                        <th>Tanggal</th>
                                        <th>Standar Pendidikan</th>
                                        <th>Kegiatan</th>
                                        <!-- <th>Sub Kegiatan</th> -->
                                        <th>Program</th>
                                        <!-- <th>Sub Program</th> -->
                                        <th>Triwulan</th>
                                        <th width="13%">Total</th>
                                        <th width="10%">Aksi</th>
                                   </tr>
                              </thead>
                              <tbody>
                                   <?php $no = 1;
                                   foreach ($perencanaan as $p) : ?>
                                        <tr>
                                             <td><?= $no++; ?></td>
                                             <td><?= date('d-m-Y', strtotime($p->tanggal)); ?></td>
                                             <td><?= $p->standar_pendidikan; ?></td>
                                             <td><?= $p->kegiatan; ?></td>
                                             <!-- <td><?= $p->subkegiatan; ?></td> -->
                                             <td><?= $p->program; ?></td>
                                             <!-- <td><?= $p->subprogram; ?></td> -->
                                             <td class="text-right"><?= number_format($p->triwulan); ?></td>
                                             <td>Rp. <span class="float-right"><?= number_format($p->total); ?></span></td>
                                             <td class="text-center">
                                                  <button type="button" class="btn btn-sm btn-circle btn-info" onclick="info()"><i class="fas fa-info"></i></button>
                                                  <button type="button" class="btn btn-sm btn-circle btn-warning" onclick="edit()"><i class="fas fa-edit"></i></button>
                                                  <button type="button" class="btn btn-sm btn-circle btn-danger" onclick="hapus()"><i class="fas fa-trash"></i></button>
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