<div class="row">
     <div class="col">
          <div class="card shadow mb-4">
               <div class="card-body">
                    <div class="h4">DETAIL PERENCANAAN
                         <a href="<?= site_url('Perencanaan') ?>" type="button" class="btn btn-sm btn-danger float-right">
                              <i class="fas fa-chevron-circle-left"></i> Kembali
                         </a>
                    </div>
                    <hr>
                    <form method="POST" id="form_tambah">
                         <input type="hidden" name="kodeper" id="kodeper" value="<?= $invoice ?>">
                         <div class="row">
                              <div class="col">
                                   <div class="form-group row">
                                        <label for="standar_pendidikan" class="col-sm-2 col-form-label">Standar Pendidikan</label>
                                        <div class="col-sm-5">
                                             <select name="standar_pendidikan" id="standar_pendidikan" class="form-control select2_pen">
                                                  <?php
                                                  if ($queryx->standar_pendidikan) {
                                                       $pendidikan = $this->db->get_where('pendidikan', array('namapen' => $queryx->standar_pendidikan))->row();
                                                  ?>
                                                       <option value="<?= $pendidikan->kodepen; ?>"><?= $pendidikan->namapen; ?></option>
                                                  <?php } ?>
                                             </select>
                                        </div>
                                   </div>
                                   <div class="form-group row">
                                        <label for="kegiatan" class="col-sm-2 col-form-label">Kegiatan</label>
                                        <div class="col-sm-5">
                                             <select name="kegiatan" id="kegiatan" class="form-control select2_keg">
                                                  <?php
                                                  if ($queryx->kegiatan) {
                                                       $pendidikan = $this->db->get_where('kegiatan', array('namakeg' => $queryx->kegiatan))->row();
                                                  ?>
                                                       <option value="<?= $pendidikan->kodekeg; ?>"><?= $pendidikan->namakeg; ?></option>
                                                  <?php } ?>
                                             </select>
                                        </div>
                                   </div>
                                   <div class="form-group row">
                                        <label for="subkegiatan" class="col-sm-2 col-form-label">Sub Kegiatan</label>
                                        <div class="col-sm-5">
                                             <select name="subkegiatan" id="subkegiatan" class="form-control select2_subkeg">
                                                  <?php
                                                  if ($queryx->subkegiatan) {
                                                       $subkegiatan = $this->db->get_where('subkegiatan', array('namasubkeg' => $queryx->subkegiatan))->row();
                                                  ?>
                                                       <option value="<?= $subkegiatan->id; ?>"><?= $subkegiatan->namasubkeg; ?></option>
                                                  <?php } ?>
                                             </select>
                                        </div>
                                   </div>
                                   <div class="form-group row">
                                        <label for="program" class="col-sm-2 col-form-label">Program</label>
                                        <div class="col-sm-5">
                                             <select name="program" id="program" class="form-control select2_prog">
                                                  <?php
                                                  if ($queryx->program) {
                                                       $program = $this->db->get_where('program', array('namaprog' => $queryx->program))->row();
                                                  ?>
                                                       <option value="<?= $program->kodeprog; ?>"><?= $program->namaprog; ?></option>
                                                  <?php } ?>
                                             </select>
                                        </div>
                                   </div>
                                   <div class="form-group row">
                                        <label for="subprogram" class="col-sm-2 col-form-label">Sub Program</label>
                                        <div class="col-sm-5">
                                             <select name="subprogram" id="subprogram" class="form-control select2_subprog">
                                                  <?php
                                                  if ($queryx->subprogram) {
                                                       $subprogram = $this->db->get_where('subprogram', array('namasubprog' => $queryx->subprogram))->row();
                                                  ?>
                                                       <option value="<?= $subprogram->id; ?>"><?= $subprogram->namasubprog; ?></option>
                                                  <?php } ?>
                                             </select>
                                        </div>
                                   </div>
                                   <div class="form-group row">
                                        <label for="triwulan" class="col-sm-2 col-form-label">Triwulan</label>
                                        <div class="col-sm-5">
                                             <select name="triwulan" id="triwulan" class="form-control select2_triwulan">
                                                  <option value="1" <?php if ($queryx->triwulan == 1) {
                                                                           echo 'selected';
                                                                      } ?>>Ke 1 (satu)</option>
                                                  <option value="2" <?php if ($queryx->triwulan == 2) {
                                                                           echo 'selected';
                                                                      } ?>>Ke 2 (dua)</option>
                                                  <option value="3" <?php if ($queryx->triwulan == 3) {
                                                                           echo 'selected';
                                                                      } ?>>Ke 3 (tiga)</option>
                                                  <option value="4" <?php if ($queryx->triwulan == 4) {
                                                                           echo 'selected';
                                                                      } ?>>Ke 4 (empat)</option>
                                             </select>
                                        </div>
                                   </div>
                              </div>
                         </div>
                         <hr>
                         <div class="h6">URAIAN</div>
                         <div class="row">
                              <div class="col">
                                   <div class="table-responsive">
                                        <table id="datatable" class="table table-striped table-bordered table-hover">
                                             <thead>
                                                  <tr class="text-center bg-primary text-white">
                                                       <th width="20%">Nama Barang</th>
                                                       <th>Satuan</th>
                                                       <th width="10%">Volume</th>
                                                       <th>Harga</th>
                                                       <th>Jumlah</th>
                                                  </tr>
                                             </thead>
                                             <tbody>
                                                  <?php $no = 1;
                                                  foreach ($query as $q) : ?>
                                                       <tr>
                                                            <td>
                                                                 <input name="namabarang[]" id="namabarang<?= $no ?>" type="text" class="form-control" value="<?= $q->namabarang; ?>">
                                                            </td>
                                                            <td>
                                                                 <input name="satuan[]" id="satuan<?= $no ?>" type="text" class="form-control" value="<?= $q->satuan; ?>">
                                                            </td>
                                                            <td>
                                                                 <input name="qty[]" onchange="totalline(<?= $no ?>);qtyc(<?= $no ?>)" value="<?= number_format($q->qty) ?>" id="qty<?= $no ?>" type="text" class="form-control">
                                                            </td>
                                                            <td>
                                                                 <input name="harga[]" onchange="totalline(<?= $no ?>); cekharga(<?= $no ?>);" value="<?= number_format($q->harga); ?>" id="harga<?= $no ?>" type="text" class="form-control">
                                                            </td>
                                                            <td>
                                                                 <input name="jumlah[]" id="jumlah<?= $no ?>" type="text" class="form-control" size="40%" readonly value="<?= number_format($q->jumlah) ?>">
                                                            </td>
                                                       </tr>
                                                  <?php $no++;
                                                  endforeach; ?>
                                             </tbody>
                                        </table>
                                   </div>
                                   <div class="row">
                                        <div class="col">
                                             <button type="button" onclick="tambah()" class="btn btn-primary btn-sm btn-circle" style="margin-left: 10px;">
                                                  <i class="fa fa-plus"></i>
                                             </button>
                                             <button type="button" onclick="hapus()" class="btn btn-danger btn-sm btn-circle" style="margin-left: 10px;">
                                                  <i class="fa fa-trash"></i>
                                             </button>
                                        </div>
                                   </div>
                              </div>
                         </div>
                         <div class="row">
                              <div class="col-3 offset-9">
                                   <div class="row g-3 align-items-center mb-3">
                                        <div class="col-4">
                                             <label for="sub_total" class="col-form-label">Sub total</label>
                                        </div>
                                        <div class="col-8">
                                             <input type="text" id="sub_total" name="sub_total" class="form-control" readonly value="<?= number_format($queryx->total); ?>">
                                        </div>
                                   </div>
                                   <div class="row g-3 align-items-center mb-3">
                                        <div class="col-4">
                                             <label for="total" class="col-form-label">Total</label>
                                        </div>
                                        <div class="col-8">
                                             <input type="text" id="total" name="total" class="form-control" readonly value="<?= number_format($queryx->total); ?>">
                                        </div>
                                   </div>
                              </div>
                         </div>
                         <div class="row justify-content-center">
                              <div class="col-3 offset-9">
                                   <button type="button" onclick="update()" class="btn btn-warning btn-sm float-right"><i class="fas fa-sync-alt"></i> Simpan Perubahan</button>
                              </div>
                         </div>
                    </form>
               </div>
          </div>
     </div>
</div>

<script>
     $(window).on("load", function() {
          $('.select2_triwulan').select2();
          var kegiatan = $('#kegiatan').val();
          initailizeSelect2_subkeg(kegiatan);
          var program = $('#program').val();
          initailizeSelect2_subprog(program);
     });
</script>

<!-- master -->
<script>
     function separateComma(val) {
          var sign = 1;
          if (val < 0) {
               sign = -1;
               val = -val;
          }
          let num = val.toString().includes('.') ? val.toString().split('.')[0] : val.toString();
          let len = num.toString().length;
          let result = '';
          let count = 1;
          for (let i = len - 1; i >= 0; i--) {
               result = num.toString()[i] + result;
               if (count % 3 === 0 && count !== 0 && i !== 0) {
                    result = ',' + result;
               }
               count++;
          }
          if (val.toString().includes('.')) {
               result = result + '.' + val.toString().split('.')[1];
          }
          return sign < 0 ? '-' + result : result;
     }
     var arr = [1];
     var idrow = <?= $jumdetail + 1; ?>;
</script>

<script>
     function tambah() {
          var x = document.getElementById('datatable').insertRow(idrow);
          var td1 = x.insertCell(0);
          var td2 = x.insertCell(1);
          var td3 = x.insertCell(2);
          var td4 = x.insertCell(3);
          var td5 = x.insertCell(4);
          var barang = "<td><input name='namabarang[]' id='namabarang" + idrow + "' class='form-control'></td>";
          var satuan = "<td><input name='satuan[]' id='satuan" + idrow + "' class='form-control'></td>";
          var qty = "<td><input name='qty[]' id=qty" + idrow + " onchange='totalline(" + idrow + "); qtyc(" + idrow + ")' value=1  type='text' class='form-control rightJustified'></td>";
          var harga = "<td><input name='harga[]'  id=harga" + idrow + " onchange='totalline(" + idrow + ");cekharga(" + idrow + ");' value='0'  type='text' class='form-control rightJustified'> </td>";
          var jum = "<td><input name='jumlah[]' id=jumlah" + idrow + " type='text' class='form-control rightJustified' size='40%' readonly value='0'></td>";
          td1.innerHTML = barang;
          td2.innerHTML = satuan;
          td3.innerHTML = qty;
          td4.innerHTML = harga;
          td5.innerHTML = jum;
          total();
          idrow++;
     }

     function hapus() {
          if (idrow > 2) {
               var x = document.getElementById('datatable').deleteRow(idrow - 1);
               idrow--;
               total();
          }
     }
</script>

<!-- aritmatika rp -->
<script>
     $(document).ready(function() {
          var table = document.getElementById('datatable');
          var rowCount = table.rows.length;
          for (i = 1; i < rowCount; i++) {
               var qtyx = $('#qty'.i).val();
               var qty = parseInt(qtyx);
               $('#qty'.i).val(separateComma(qty));
               var hargax = $('#harga'.i).val();
               var harga = parseInt(hargax);
               $('#harga'.i).val(separateComma(harga));
               var jumlahx = $('#jumlah'.i).val();
               var jumlah = parseInt(jumlahx);
               $('#jumlah'.i).val(separateComma(jumlah));
          }
     });

     function cekharga(id) {
          var harga = $('#harga' + id).val();
          $('#harga' + id).val(separateComma(harga));
     }

     function qtyc(id) {
          var qty = $('#qty' + id).val();
          $('#qty' + id).val(separateComma(qty));
     }

     function totalline(id) {
          var table = document.getElementById('datatable');
          var row = table.rows[arr.indexOf(id) + 1];
          var hargax = parseInt($('#harga' + id).val().replaceAll(',', ''));
          var jumlah = parseInt($('#qty' + id).val().replaceAll(',', '')) * hargax;
          var subtot = jumlah;
          var tot = jumlah;
          $('#jumlah' + id).val(separateComma(tot));
          total();
     }

     function total() {
          var table = document.getElementById('datatable');
          var rowCount = table.rows.length;
          tjumlah = 0;
          tppn = 0;
          for (var i = 1; i < rowCount; i++) {
               var row = table.rows[i];
               qty = $('#qty' + i).val();
               harga = $('#harga' + i).val();
               jumlah = $('#jumlah' + i).val();
               var qty1 = Number(qty.replace(/[^0-9\.]+/g, ""));
               var harga1 = Number(harga.replace(/[^0-9\.]+/g, ""));
               var jumlah1 = Number(jumlah.replace(/[^0-9\.]+/g, ""));
               tjumlah = tjumlah + (qty1 * harga1);
          }
          document.getElementById("sub_total").value = separateComma(tjumlah);
          document.getElementById("total").value = separateComma(tjumlah + tppn);
     }
</script>

<script>
     function update() {
          var kodeper = $('#kodeper').val();
          var standar_pendidikan = $('#standar_pendidikan').val();
          var nama_kegiatan = document.getElementById('kegiatan').value;
          var subkegiatan = document.getElementById('subkegiatan').value;
          var program = document.getElementById('program').value;
          var subprogram = document.getElementById('subprogram').value;
          var triwulan = document.getElementById('triwulan').value;
          var sub_totalx = document.getElementById('sub_total').value;
          var sub_total = Number(parseInt(sub_totalx.replaceAll(',', '')));
          var totalx = document.getElementById('total').value;
          var total = Number(parseInt(totalx.replaceAll(',', '')));
          if (standar_pendidikan == '') {
               Swal.fire({
                    icon: 'danger',
                    title: 'STANDAR PENDIDIKAN',
                    text: 'Tidak boleh kosong !',
               });
          }
          if (kegiatan == '') {
               Swal.fire({
                    icon: 'danger',
                    title: 'NAMA KEGIATAN',
                    text: 'Tidak boleh kosong !',
               });
          }
          if (subkegiatan == '') {
               Swal.fire({
                    icon: 'danger',
                    title: 'SUB KEGIATAN',
                    text: 'Tidak boleh kosong !',
               });
          }
          if (program == '') {
               Swal.fire({
                    icon: 'danger',
                    title: 'NAMA PROGRAM',
                    text: 'Tidak boleh kosong !',
               });
          }
          if (subprogram == '') {
               Swal.fire({
                    icon: 'danger',
                    title: 'SUB PROGRAM',
                    text: 'Tidak boleh kosong !',
               });
          }
          if (triwulan == '') {
               Swal.fire({
                    icon: 'danger',
                    title: 'TRIWULAN',
                    text: 'Tidak boleh kosong !',
               });
          }
          if (standar_pendidikan != '' && kegiatan != '' && subkegiatan != '' && program != '' && subprogram != '' && triwulan != '') {
               $.ajax({
                    url: "<?= site_url('Perencanaan/update_header?subtotal=') ?>" + sub_total + '&total=' + total + '&kodeper=' + kodeper,
                    type: "POST",
                    data: $("#form_tambah").serialize(),
                    dataType: "JSON",
                    success: function(data) {
                         // console.log(data)
                         var table = document.getElementById('datatable');
                         rowCount = table.rows.length;
                         arr.push(idrow);
                         for (i = 1; i < rowCount; i++) {
                              var namabarang = $('#namabarang' + i).val();
                              var satuan = $('#satuan' + i).val();
                              var qtyx = $('#qty' + i).val();
                              var hargax = $('#harga' + i).val();
                              var jumlahx = $('#jumlah' + i).val();
                              var qty = parseInt(qtyx.replaceAll(',', ''));
                              var harga = parseInt(hargax.replaceAll(',', ''));
                              var jumlah = parseInt(jumlahx.replaceAll(',', ''));
                              $.ajax({
                                   url: '<?= site_url() ?>Perencanaan/update_detail/?namabarang=' + namabarang + '&satuan=' + satuan + '&qty=' + qty + '&harga=' + harga + '&jumlah=' + jumlah + '&kodeper=' + kodeper,
                                   type: 'GET',
                                   dataType: 'JSON',
                                   // success: function(data) {
                                   //      console.log(data)
                                   // }
                              });
                         }
                         if (data.status == 1) {
                              Swal.fire({
                                   icon: 'success',
                                   title: 'UBAH DATA',
                                   text: 'Berhasil dilakukan !',
                              }).then((value) => {
                                   location.href = "<?php echo base_url() ?>Perencanaan";
                              });
                         } else {
                              Swal.fire({
                                   icon: 'error',
                                   title: 'UBAH DATA',
                                   text: 'Gagal dilakukan !',
                              });
                         }
                    }
               });
          }
     }
</script>