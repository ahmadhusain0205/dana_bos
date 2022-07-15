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
                    <form method="POST" id="form_tambah">
                         <div class="row">
                              <div class="col">
                                   <!-- <div class="form-group row">
                                        <label for="standar_pendidikan" class="col-sm-2 col-form-label">Standar Pendidikan</label>
                                        <div class="col-sm-5">
                                             <select name="standar_pendidikan" id="standar_pendidikan" class="form-control select2_pen"></select>
                                        </div>
                                   </div> -->
                                   <div class="form-group row">
                                        <label for="kegiatan" class="col-sm-2 col-form-label">Kegiatan</label>
                                        <div class="col-sm-5">
                                             <select name="kegiatan" id="kegiatan" class="form-control select2_keg" onchange="showsubkeg()"></select>
                                        </div>
                                   </div>
                                   <div class="form-group row">
                                        <label for="subkegiatan" class="col-sm-2 col-form-label">Sub Kegiatan</label>
                                        <div class="col-sm-5">
                                             <select name="subkegiatan" id="subkegiatan" class="form-control select2_subkeg"></select>
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
                                   <div class="form-group row">
                                        <label for="triwulan" class="col-sm-2 col-form-label">Triwulan</label>
                                        <div class="col-sm-5">
                                             <select name="triwulan" id="triwulan" class="form-control select2_triwulan">
                                                  <option value="1">Ke 1 (satu)</option>
                                                  <option value="2">Ke 2 (dua)</option>
                                                  <option value="3">Ke 3 (tiga)</option>
                                                  <option value="4">Ke 4 (empat)</option>
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
                                                       <th>Delete</th>
                                                       <th width="20%">Nama Barang</th>
                                                       <th>Satuan</th>
                                                       <th width="10%">Volume</th>
                                                       <th>Harga</th>
                                                       <th>Jumlah</th>
                                                  </tr>
                                             </thead>
                                             <tbody>
                                                  <tr>
                                                       <td>
                                                            <button type='button' onclick="hapusBarisIni(1)" class='btn btn-danger btn-sm btn-circle' id="del1"><i class='fa fa-trash'></i>
                                                       </td>
                                                       <td>
                                                            <input name="namabarang[]" id="namabarang1" type="text" class="form-control">
                                                       </td>
                                                       <td>
                                                            <input name="satuan[]" id="satuan1" type="text" class="form-control">
                                                       </td>
                                                       <td>
                                                            <input name="qty[]" onchange="totalline(1);qtyc(1)" value="1" id="qty1" type="text" class="form-control">
                                                       </td>
                                                       <td>
                                                            <input name="harga[]" onchange="totalline(1); cekharga(1);" value="0" id="harga1" type="text" class="form-control">
                                                       </td>
                                                       <td>
                                                            <input name="jumlah[]" id="jumlah1" type="text" class="form-control" size="40%" readonly value="0">
                                                       </td>
                                                  </tr>
                                             </tbody>
                                        </table>
                                   </div>
                                   <div class="row">
                                        <div class="col">
                                             <button type="button" onclick="tambah()" class="btn btn-primary btn-sm btn-circle" style="margin-left: 10px;">
                                                  <i class="fa fa-plus"></i>
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
                                             <input type="text" id="sub_total" name="sub_total" class="form-control" readonly value="0">
                                        </div>
                                   </div>
                                   <div class="row g-3 align-items-center mb-3">
                                        <div class="col-4">
                                             <label for="total" class="col-form-label">Total</label>
                                        </div>
                                        <div class="col-8">
                                             <input type="text" id="total" name="total" class="form-control" readonly value="0">
                                        </div>
                                   </div>
                              </div>
                         </div>
                         <div class="row justify-content-center">
                              <div class="col-3 offset-9">
                                   <button type="button" onclick="save()" class="btn btn-info btn-sm float-right"><i class="fas fa-save"></i> Simpan</button>
                              </div>
                         </div>
                    </form>
               </div>
          </div>
     </div>
</div>

<script>
     $(window).on("load", function() {
          $('.select2_subprog').attr('disabled', true);
          $('.select2_subkeg').attr('disabled', true);
          $('.select2_triwulan').select2();
          initailizeSelect2_subprog(null);
     });

     function showsubprog() {
          var prog = $("#program").val();
          initailizeSelect2_subprog(prog);
          $('.select2_subprog').attr('disabled', false);
     }

     function showsubkeg() {
          var keg = $("#kegiatan").val();
          initailizeSelect2_subkeg(keg);
          $('.select2_subkeg').attr('disabled', false);
     }
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
     var idrow = 2;
     if (idrow == 2) {
          $('#del1').attr('disabled', true);
     }
</script>

<script>
     function tambah() {
          var table = document.getElementById('datatable');
          rowCount = table.rows.length;
          arr.push(idrow);
          var x = document.getElementById('datatable').insertRow(rowCount);
          var td1 = x.insertCell(0);
          var td2 = x.insertCell(1);
          var td3 = x.insertCell(2);
          var td4 = x.insertCell(3);
          var td5 = x.insertCell(4);
          var td6 = x.insertCell(5);
          var button = "<td id='kolom" + idrow + "'><button type='button' onclick=hapusBarisIni(" + idrow + ") id=del" + idrow + " class='btn btn-danger btn-sm btn-circle'><i class='fa fa-trash'></td>";
          var barang = "<td><input name='namabarang[]' id='namabarang" + idrow + "' class='form-control'></td>";
          var satuan = "<td><input name='satuan[]' id='satuan" + idrow + "' class='form-control'></td>";
          var qty = "<td><input name='qty[]' id=qty" + idrow + " onchange='totalline(" + idrow + "); qtyc(" + idrow + ")' value=1  type='text' class='form-control rightJustified'></td>";
          var harga = "<td><input name='harga[]'  id=harga" + idrow + " onchange='totalline(" + idrow + ");cekharga(" + idrow + ");' value='0'  type='text' class='form-control rightJustified'> </td>";
          var jum = "<td><input name='jumlah[]' id=jumlah" + idrow + " type='text' class='form-control rightJustified' size='40%' readonly value='0'></td>";
          td1.innerHTML = button;
          td2.innerHTML = barang;
          td3.innerHTML = satuan;
          td4.innerHTML = qty;
          td5.innerHTML = harga;
          td6.innerHTML = jum;
          idrow++;
     }

     function hapusBarisIni(param) {
          var x = document.getElementById('datatable').deleteRow(arr.indexOf(param) + 1);
          arr.splice(arr.indexOf(param), 1);
          rowCount--;
          total();
     }
</script>

<!-- aritmatika rp -->
<script>
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
          var hargax = parseInt(row.cells[4].children[0].value.replaceAll(',', ''));
          var jumlah = parseInt(row.cells[3].children[0].value.replaceAll(',', '')) * hargax;
          var subtot = jumlah;
          var tot = jumlah;
          row.cells[5].children[0].value = separateComma(tot);
          total();
     }

     function total() {
          var table = document.getElementById('datatable');
          var rowCount = table.rows.length;
          tjumlah = 0;
          tppn = 0;
          for (var i = 1; i < rowCount; i++) {
               var row = table.rows[i];
               qty = row.cells[3].children[0].value;
               harga = row.cells[4].children[0].value;
               jumlah = row.cells[5].children[0].value;
               var qty1 = Number(qty.replace(/[^0-9\.]+/g, ""));
               var harga1 = Number(harga.replace(/[^0-9\.]+/g, ""));
               var jumlah1 = Number(jumlah.replace(/[^0-9\.]+/g, ""));
               tjumlah = tjumlah + (qty1 * harga1);
          }
          document.getElementById("sub_total").value = separateComma(tjumlah);
          document.getElementById("total").value = separateComma(tjumlah + tppn);
     }
</script>

<!-- simpan -->
<script>
     function save() {
          // var standar_pendidikan = document.getElementById('standar_pendidikan').value;
          var nama_kegiatan = document.getElementById('kegiatan').value;
          var subkegiatan = document.getElementById('subkegiatan').value;
          var program = document.getElementById('program').value;
          var subprogram = document.getElementById('subprogram').value;
          var triwulan = document.getElementById('triwulan').value;
          var sub_totalx = document.getElementById('sub_total').value;
          var sub_total = Number(parseInt(sub_totalx.replaceAll(',', '')));
          var totalx = document.getElementById('total').value;
          var total = Number(parseInt(totalx.replaceAll(',', '')));

          // if (standar_pendidikan == '') {
          //      Swal.fire({
          //           icon: 'danger',
          //           title: 'STANDAR PENDIDIKAN',
          //           text: 'Tidak boleh kosong !',
          //      });
          // }
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

          // if (standar_pendidikan != '' && kegiatan != '' && subkegiatan != '' && program != '' && subprogram != '' && triwulan != '') {
          if (kegiatan != '' && subkegiatan != '' && program != '' && subprogram != '' && triwulan != '') {

               $.ajax({
                    url: "<?php echo base_url(); ?>Perencanaan/save_header/?subtotal=" + sub_total + '&total=' + total,
                    type: "POST",
                    data: $("#form_tambah").serialize(),
                    dataType: "JSON",
                    success: function(data) {
                         var kodeper = data.kodeper;
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
                                   url: '<?= site_url() ?>Perencanaan/save_detail/?namabarang=' + namabarang + '&satuan=' + satuan + '&qty=' + qty + '&harga=' + harga + '&jumlah=' + jumlah + '&kodeper=' + kodeper,
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
                                   title: 'TAMBAH DATA',
                                   text: 'Berhasil dilakukan !',
                              }).then((value) => {
                                   location.href = "<?php echo base_url() ?>Perencanaan";
                              });
                         } else {
                              Swal.fire({
                                   icon: 'error',
                                   title: 'TAMBAH DATA',
                                   text: 'Gagal dilakukan !',
                              });
                         }
                    }
               });
          }
     }
</script>