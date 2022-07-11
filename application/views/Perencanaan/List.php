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
                                   <tr>
                                        <th width="1%">No</th>
                                        <th>Tanggal</th>
                                        <th>Standar Pendidikan</th>
                                        <th>Nama Kegiatan</th>
                                        <th>Sub Program</th>
                                        <th>Triwulan</th>
                                        <th>Total</th>
                                   </tr>
                              </thead>
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