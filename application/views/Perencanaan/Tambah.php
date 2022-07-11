<div class="row">
     <div class="col">
          <div class="card shadow mb-4">
               <div class="card-body">
                    <div class="h4">TAMBAH PERENCANAAN
                         <a href="<?= site_url('Perencanaan') ?>" type="button" class="btn btn-sm btn-danger float-right">
                              <i class="fas fa-chevron-circle-left"></i> Kembali
                         </a>
                    </div>
                    <hr>
                    <form method="POST" id="form-tambah">
                         <div class="row">
                              <div class="col">
                                   <div class="form-group row">
                                        <label for="standar_pendidikan" class="col-sm-2 col-form-label">Standar Pendidikan</label>
                                        <div class="col-sm-5">
                                             <select name="standar_pendidikan" id="standar_pendidikan" class="form-control select2_pen"></select>
                                        </div>
                                   </div>
                                   <div class="form-group row">
                                        <label for="program" class="col-sm-2 col-form-label">Program</label>
                                        <div class="col-sm-5">
                                             <select name="program" id="program" class="form-control select2_prog" onchange="showsubprog()"></select>
                                        </div>
                                   </div>
                                   <div class="form-group row">
                                        <label for="subprogram" class="col-sm-2 col-form-label">Sub Program</label>
                                        <div class="col-sm-5">
                                             <select name="subprogram" id="subprogram" class="form-control select2_subprog"></select>
                                        </div>
                                   </div>
                              </div>
                         </div>
                    </form>
               </div>
          </div>
     </div>
</div>

<script>
     $(window).on("load", function() {
          initailizeSelect2_subprog(null);
     });

     function showsubprog() {
          var prog = $("#program").val();
          initailizeSelect2_subprog(prog);
     }
</script>