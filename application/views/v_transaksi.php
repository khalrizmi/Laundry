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
							<td align="right">Nomor Bon : </td>
							<td><input type="text" class="form-control" readonly name="no_bon" value="<?php echo $data['no_urut'] ?>"></td>
						</tr>
						<tr>
							<td align="right">Nama : </td>
							<td><input type="text" class="form-control" readonly value="<?php echo $data['nama'] ?>"></td> 
								<input type="hidden" name="nama" value="<?php echo "ha" ?>">
						</tr>	
					</table>
				</div>
				<div class="col-md-6">
					<table class="table">
						<tr>
							<td align="right">Order Date : </td>
							<td><input type="text" class="form-control" readonly name="order_date" value="<?php echo date('Y-m-d') ?>"></td>
						</tr>
						<tr>
							<td align="right">Telepon : </td>
							<td><input type="text" class="form-control" readonly name="no_bon" value="<?php echo $data['telepon'] ?>"></td>
						</tr>
					</table>
				</div>
			</div> <!-- row -->

			<div class="row">
				<div class="col-md-12">
				<form method="post" id="form-save-all">

					<table class="table">
						<tr>
							<td>No</td>
							<td>Jenis Cucian</td>
							<td>Harga</td>
							<td>QTY</td>
							<td>Total Harga</td>
						</tr>
						<?php $no=0; foreach($item_satuan->result() as $row): $no++ ?>
						<tr>
							<td><?php echo $no; ?></td>
							<td><?php echo $row->nama_item ?></td>
							<td><?php echo $row->harga_normal ?></td>
							<input type="hidden"  name="harga" id="<?= "hrg$no" ?>" value="<?= $row->harga_normal ?>">

							<td><input type="number" name="<?= "qty".$no ?>" id="<?= "qty$no" ?>" onkeyup="hitung_satuan(<?= $no ?>)" class="form-control" style="width: 100px" value="0" onblur="if(this.value==''){this.value='0'}" onfocus="if(this.value=='0'){this.value=''}" onchange="hitung_satuan(<?= $no ?>)"></td>
							<input type="hidden" name="<?= "id_item$no" ?>" value="<?= $row->id_item ?>">
							
							<td><input type="text" name="<?= "jml".$no ?>" id="<?= "jml$no" ?>"  class="form-control" style="width: 100px" readonly value="0"></td>

						</tr>
						<?php endforeach;
									echo "<script>var count = ".$no."</script>";
						 ?>
						 <input type="hidden" name="jumlah_semua" value="<?= $no ?>">
					</table>
				</div>
			</div> <!-- row -->

			<div class="row">
				<div class="col-md-offset-1 col-md-5">
					<table class="table">
						<tr>
							<td align="right">Total qty : </td>
							<td><input type="text" name="total_qty" readonly class="form-control" id="total_qty" value="0"></td>
						</tr>
						<tr>
							<td align="right">Grand Total : </td>
							<td><input type="text" name="grand_total" readonly class="form-control" id="grand_total" value="0"></td>
						</tr>
					</table>
				</div>
				<div class="col-md-5">
					<table class="table">
						<tr>
							<td>
								<button type="button" class="btn btn-primary" id="btn-save-all"><b class='glyphicon glyphicon-save'></b> Save</button>
								<button disabled class="btn btn-success"><b class='glyphicon glyphicon-repeat'></b> Reset</button>
							</td>
						</tr>
					</table>
				</div>
			</div> <!-- row -->
			<!-- /* ==================================================
		    Inputan  hidden 
		    =====================================================*/ -->  
			<input type="hidden" name="no_bon" value="<?php echo $data['no_urut']; ?>">
			<input type="hidden" name="nama" value="<?php echo $data['nama'] ?>">
			<input type="hidden" name="telepon" value="<?php echo $data['telepon'] ?>">
			<input type="hidden" name="alamat" value="<?php echo $data['alamat'] ?>">

			</form>

			<!-- <div class="row">
				<div class="col-md-12 text-center">
					<button class="btn btn-primary" id="btn-save-all"><b class='glyphicon glyphicon-save'></b> Save</button>
					<button disabled class="btn btn-success"><b class='glyphicon glyphicon-repeat'></b> Reset</button>
				</div>
			</div> -->
          
        </div>            
      </div>

    </div><!-- col -->
  </div><!-- row -->
</div><!-- container -->



<script>
	<?php echo "var url='".base_url()."';"; ?>
	var select = 0;

	$("#btn-save-all").click(function(){
		if($("#grand_total").val() == 0) alert('Silahkan pilih item');
		else {
			$.ajax({
				url: url+'order/input_all_satuan',
				type: 'post',
				data: $("#form-save-all").serialize(),
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
		}
	})

		
		function hitung_satuan(id){
			select = 1;
			$("#qty"+id).keypress(function(event){
				if(event.which != 8 && isNaN(String.fromCharCode(event.which))){
					event.preventDefault();
				}
			})
			var a = $("#qty"+id).val();
			var b = $("#hrg"+id).val();
			var c = a * b;
			$("#jml"+id).val(c);
			grand_total();
		}

		function grand_total(){
			$("#grand_total").val("0");
			$("#total_qty").val("0");
			for(i=1; i<=count; i++){
				var a = parseInt($("#grand_total").val());
				var b = parseInt($("#jml"+i).val());
				var c = a+b;
				$("#grand_total").val(c);

				var x = parseInt($("#total_qty").val());
				var y = parseInt($("#qty"+i).val());
				var z = x+y;
				$("#total_qty").val(z);
			}
		}

</script>
