<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12">       

      <div class="panel panel-primary panel-custom">
        <div class="panel-heading">                
          <b class='glyphicon glyphicon-user'></b> 
          <b style='padding:6px 0;display: inline-block'>
            Order 
          </b> 
        </div>
        <div class="panel-body panel_statistik">

        	<div class="row">
				<div class="col-md-6">
					<table class="table">
						<tr>
							<td align="right">Invoice No : </td>
							<td><input type="text" class="form-control" readonly name="no_invoice" value="<?php echo $data['no_urut'] ?>"></td>
						</tr>
						<tr>
							<td align="right">Nama : </td>
							<td><input type="text" class="form-control" readonly value="<?php echo $data['nama'] ?>"></td>
							<input name="nama" type="hidden" value="<?php echo $data['nama'] ?>">
						</tr>	
					</table>
				</div>
				<div class="col-md-6">
					<table class="table">
						<tr>
							<td align="right">Order Date : </td>
							<td><input type="text" class="form-control" readonly name="order_date" value="<?php echo $data['tgl_masuk'] ?>"></td>
						</tr>
						<tr>
							<td align="right">Telepon : </td>
							<td><input type="text" class="form-control" readonly name="no_bon" value="<?php echo $data['telepon'] ?>"></td>
						</tr>
					</table>
				</div>
			</div> <!-- row -->

			<div class="row">
				<div class="col-md-6">
				<!-- ==============================
							FORM SEMUA
				============================== -->
				<form method="post" id="form-save-all">
					<table class="table">
						<tr>
							<td>Item Description</td>
							<td>Harga</td>
							<!-- <td>Diskon</td> -->
							<td>Jumlah</td>
						</tr>
						<?php $no=0; foreach($item_koin->result() as $row): $no++;
							if($no==1):
								$harga = $row->harga_normal - $row->diskon_promo;
								echo "<input type='hidden' name='harga_koin' id='harga_koin' value='$harga' />";
							else :
						?>
						<tr>
							<td><?php echo $row->nama_item ?></td>
							<td><?php echo $row->harga_normal ?></td>
							<!-- <td><?php echo $row->diskon_promo ?></td> -->
							<td><input type="text" name="<?= "jumlah$no" ?>" id="<?= "jumlah$no" ?>" class="form-control" style="width: 100px" value="0"
							onkeyup="keyup()"
							onblur="if(this.value==''){this.value='0'}" onfocus="if(this.value=='0'){this.value=''}"></td>
						</tr>
						<input type="hidden" name="<?= "id_item$no" ?>" id="<?= "id_item$no" ?>" value="<?= $row->id_item ?>">
						<input type="hidden" name="<?= "nama_item$no" ?>" id="<?= "nama_item$no" ?>" value="<?= $row->nama_item ?>">
						<input type="hidden" name="<?= "harga_item$no" ?>" id="<?= "harga_item$no" ?>" value="<?= $row->harga_normal ?>">
						<input type="hidden" name="<?= "diskon_item$no" ?>" id="<?= "diskon_item$no" ?>" value="<?= $row->diskon_promo ?>">

						<?php endif;endforeach; ?>
						<?php echo "<script>var no=$no</script>"; ?>
					</table>
				</div>
				<div class="col-md-6">
					<table class="table">
						<tr>
							<td>Mesin</td>
							<td>Nomor Mesin</td>
							<td>Jumlah Koin</td>
						</tr>
						<tr>
							<td>Washer</td>
							<td>
								<select class="form-control" name="nomor_washer0" id="no_washer0">
									<option value="0">-- Pilih Mesin --</option>
									<?php for($i=0;$i<=10;$i++){
										if($i%2==1) 
											echo "<option value='$i'>$i</option>";
									} ?>
								</select>
							</td>
							<td>
								<input type="text" class="form-control" name="jml_washer0" id="jml_washer0" value="0"
								onkeyup="keyup()" 
								onblur="if(this.value==''){this.value='0'}" onfocus="if(this.value=='0'){this.value=''}">
							</td>
						</tr>
						<tr>
							<td>Drayer</td>
							<td>
								<select class="form-control" name="nomor_drayer0" id="no_drayer0">
									<option value="0">-- Pilih Mesin --</option>
									<?php for($i=1;$i<=10;$i++){
										if($i%2==0) 
											echo "<option value='$i'>$i</option>";
									} ?>
								</select>
							</td>
							<td>
								<input type="text" class="form-control" name="jml_drayer0" id="jml_drayer0" value="0"
								onkeyup="keyup()" 
								onblur="if(this.value==''){this.value='0'}" onfocus="if(this.value=='0'){this.value=''}">
							</td>
						</tr>
						<tr id="last"></tr>
					</table>
					<a href="#tambah_mesin" data-toggle="modal" style="float: right;" class="text-primary"><b class="glyphicon glyphicon-plus"></b>Tambah Mesin</a>
				</div>
			</div>

			<div class="row">
				<div class="col-md-5">
					<table class="table">
						<tr>
							<td align="right">Grand Total : </td>
							<td><input type="text" name="grand_total" readonly class="form-control" id="grand_total" value="0"></td>
						</tr>
					</table>
				</div>
				<div class="col-md-offset-1 col-md-5">
					<table class="table">
						<tr>
							<td align="right">Total Koin : </td>
							<td><input type="text" name="total_koin" readonly class="form-control" id="total_koin" value="0"></td>
						</tr>
					</table>
				</div>
			</div> <!-- row -->
			<!-- /* ==================================================
		    Inputan  hidden 
		    =====================================================*/ -->  
			<input type="hidden" name="no_invoice" value="<?php echo $data['no_urut']; ?>">
			<input type="hidden" name="nama" value="<?php echo $data['nama'] ?>">
			<input type="hidden" name="telepon" value="<?php echo $data['telepon'] ?>">
			<input type="hidden" name="alamat" value="<?php echo $data['alamat'] ?>">
			<input type="hidden" name="invoice_date" value="<?php echo $data['tgl_masuk'] ?>">
			<input type="hidden" name="jumlah_item" value="<?php echo $no ?>">
			<input type="hidden" name="jumlah_mesin_washer" id="mesin_washer" value="0">
			<input type="hidden" name="jumlah_mesin_drayer" id="mesin_drayer" value="0">
			<!-- <input type="hidden" name="jumlah_koin" id="jumlah_koin" value="0"> -->

			</form>

			<div class="row">
				<div class="col-md-12 text-center">
					<button class="btn btn-primary" id="btn-save-all" disabled=true><b class='glyphicon glyphicon-save'></b> Save</button>
					<button id="btn-hitung" class="btn btn-danger" onclick="refresh()"><b class='glyphicon glyphicon-repeat'></b> Hitung</button>
				</div>
			</div>
          
        </div>            
      </div>

    </div><!-- col -->
  </div><!-- row -->
</div><!-- container -->

<div class="modal fade" id="tambah_mesin">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button class="close" data-dismiss="modal">&times;</button>
				<div class="modal-title">Tambah Mesin</div>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<div class="form-group">
	                  <label>Washer</label>
	                  <input type="text" name="tambah_washer" onkeyup="numberonly(this)" placeholder="Jumlah Mesin" class="form-control" id="jumlah_washer" value="0" 
	                  onblur="if(this.value==''){this.value='0'}" onfocus="if(this.value=='0'){this.value=''}">
	                </div>
	                <div class="form-group">
	                  <label>Drayer</label>
	                  <input type="text" name="tambah_drayer" onkeyup="numberonly(this)" placeholder="Jumlah Mesin" class="form-control" id="jumlah_drayer" value="0"
	                  onblur="if(this.value==''){this.value='0'}" onfocus="if(this.value=='0'){this.value=''}">
	                </div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" id="btn-tambah" data-dismiss="modal"><b class="glyphicon glyphicon-plus"></b>Tambah</button>
				<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
			</div>
		</div>
	</div>
</div>


<script>
	<?php echo "var url='".base_url()."';"; ?>

	var j_washer = 0;
	var j_drayer = 0;
	var select = 0;

	$("#btn-tambah").click(function(){

		if($("#jumlah_washer").val() != "0"){
			for (i=1;i<=$("#jumlah_washer").val();i++) {
				j_washer++;
				var row = '<tr>' +
							'<td>Washer</td>' +
							'<td>' +
								'<select class="form-control" name="nomor_washer'+j_washer+'" id="no_washer'+j_washer+'">' +
									'<option value="0">-- Pilih Mesin --</option>' +
									'<option value="1">1</option>' +
									'<option value="3">3</option>' +
									'<option value="5">5</option>' +
									'<option value="7">7</option>' +
									'<option value="9">9</option>' +
								'</select>' +
							'</td>' +
							'<td>' +
								'<input type="number" class="form-control" name="jml_washer'+j_washer+'" id="jml_washer'+j_washer+'" value=0 onkeyup="keyup()" onblur="checkValue(this)" onfocus="checkValue1(this)">' +
							'</td>' +
						'</tr>'
						$(row).insertBefore("#last");
			}
			$("#mesin_washer").val(j_washer);
		}
		if($("#jumlah_drayer").val() != "0"){
			for (i=1;i<=$("#jumlah_drayer").val();i++) {
				j_drayer++;
				var row = '<tr>' +
							'<td>Drayer</td>' +
							'<td>' +
								'<select class="form-control" name="nomor_drayer'+j_drayer+'" id="no_drayer'+j_drayer+'">' +
									'<option value="0">-- Pilih Mesin --</option>' +
									'<option value="2">2</option>' +
									'<option value="4">4</option>' +
									'<option value="6">6</option>' +
									'<option value="8">8</option>' +
									'<option value="10">10</option>' +
								'</select>' +
							'</td>' +
							'<td>' +
								'<input type="number" class="form-control" name="jml_drayer'+j_drayer+'" id="jml_drayer'+j_drayer+'" value=0 onkeyup="keyup()" onblur="checkValue(this)" onfocus="checkValue1(this)">' +
							'</td>' +
						'</tr>'
						$(row).insertBefore("#last");
			}
			$("#mesin_drayer").val(j_drayer);
		}

	});
	

	function checkValue(obj) {
	  if(obj.value==''){obj.value='0'}
	}
	function checkValue1(obj) {
	  if(obj.value=='0'){obj.value=''}
	}
	function keyup(){
		select = 0;
		$("#btn-save-all").prop('disabled', true);
	}

	var jumlah_koin = 0;
	function refresh(){
		cek_koin_data();
		note_data();
		var a=0,b=0;
		for(i=0;i<=j_washer;i++){
			b = parseInt($("#jml_washer"+i).val());
			a = a + b;
		}
		for(i=0;i<=j_drayer;i++){
			b = parseInt($("#jml_drayer"+i).val());
			a = a + b;
		}
		$("#total_koin").val(a);
		var total_koin = a * $("#harga_koin").val();
		jumlah_koin = total_koin;

		var m = 0;
		for(i=2;i<=no;i++){
			var x = parseInt($("#jumlah"+i).val());
			var y = parseInt($("#harga_item"+i).val());
			var z = parseInt($("#diskon_item"+i).val());
			var l = x * (y-z);
			m = m + l;
		}
		var grand_total = m + total_koin;
		$("#grand_total").val(grand_total);

		if($("#grand_total").val() != 0){
				$("#btn-save-all").prop('disabled', false);
			}

		select = 1;
	}
	function note_data(){
		var drayer_j = 0;
		var washer_j = 0;
		for(i=0;i<=j_washer;i++){
			var a = $("#no_washer"+i).val();
			if(a!=0){
				drayer_j++;
			}
		}
		for(i=0;i<=j_drayer;i++){
			var a = $("#no_drayer"+i).val();
			if(a!=0){
				washer_j++;
			}
		}
		var hasil = "";
		var mesin = "Mesin Drayer : "+drayer_j+"\nMesin Washer : "+washer_j;
		hasil = hasil + mesin;
		// return mesin;
		for(i=2;i<=no;i++){
			var nama = $("#nama_item"+i).val();
			var jumlah_input = $("#jumlah"+i).val()
			if(jumlah_input != 0){
				var item_description = "\n"+nama+" : "+jumlah_input;
				hasil = hasil + item_description;
			}
		}
		return hasil;
	}

	function cek_koin_data(){
		for(i=0;i<=j_washer;i++){
			var a = $("#no_washer"+i).val();
			var b = $("#jml_washer"+i).val();
			if(a!=0 && b==0){
				$("#jml_washer"+i).focus();
				return false;
			}else if(a==0 && b!=0){
				$("#no_washer"+i).focus();
				return false;
			}
		}
		for(i=0;i<=j_drayer;i++){
			var a = $("#no_drayer"+i).val();
			var b = $("#jml_drayer"+i).val();
			if(a!=0 && b==0){
				$("#jml_drayer"+i).focus();
				return false;
			}else if(a==0 && b!=0){
				$("#no_drayer"+i).focus();
				return false;
			}
		}
		return true;
	}

	function array_washer(){
		var washer_array = [];
			for(i=0;i<=j_washer;i++){
				washer_array[i] = $("#no_washer"+i).val();
			}
		var jsonString = JSON.stringify(washer_array);
		return jsonString;
	}

	function koin_washer(){
		var a = [];
		for(i=0;i<=j_washer;i++){
			a[i] = $("#jml_washer"+i).val();
		}
		var jsonString = JSON.stringify(a);
		return jsonString;
	}

	function array_drayer(){
		var a = [];
		for(i=0;i<=j_drayer;i++){
			a[i] = $("#no_drayer"+i).val();
		}
		var jsonString = JSON.stringify(a);
		return jsonString;
	}
	function koin_drayer(){
		var a = [];
		for(i=0;i<=j_drayer;i++){
			a[i] = $("#jml_drayer"+i).val();
		}
		var jsonString = JSON.stringify(a);
		return jsonString;
	}

	$("#btn-save-all").click(function(){
		if($("#grand_total").val() == 0) refresh();
		else if($("#total_koin").val() == 0) alert('silahkan masukan koin dan nomor mesin');
		else if(select==0){ alert("Silahkan klik tombol hitung!"); $("#btn-hitung").focus();}
		else {
			if(cek_koin_data()== true){
				event.preventDefault(); // prevent form submit
				var form = event.target.form; // storing the form
				        swal({
				  title: "Jumlah Data!",
				  text: note_data(),
				  type: "warning",
				  showCancelButton: true,
				  confirmButtonColor: "#DD6B55",
				  confirmButtonText: "Hapus!",
				  cancelButtonText: "kembali!",
				  closeOnConfirm: false,
				  closeOnCancel: false
				},
				function(isConfirm){
				  if (isConfirm) {
				    $.ajax({
						url: url+'order/input_all_koin',
						type: 'post',
						data: $("#form-save-all").serialize()+"&array_washer="+array_washer()+"&koin_washer="+koin_washer()+"&array_drayer="+array_drayer()+"&koin_drayer="+koin_drayer()+"&qty_koin="+$("#total_koin").val()+"&jumlah_koin="+jumlah_koin,
						dataType: 'html',
						success:function(pesan){
							$("#btn-save-all").prop('disabled', true);
							if(pesan == "sukses"){
								swal({
		                             title: "Success!",
		                             text:  "Data telah disimpan",
		                             type: "success",
		                             timer: 1500,
		                             showConfirmButton: true
		                        });
		                        window.setTimeout(function(){ 
									location.reload();
								} ,1500);
							}
							else swal("Opps!", "Coba beberapa saat lagi!", "error");
						},
						error:function(e){
							alert(e);
						}
					})
				  } else {
				    swal.close();
				  }
				});
			}else{
				alert('Data mesin belum lengkap');
			}
		}
	})

	function konfirmasi(id, nobon) {
			
		}


</script>
