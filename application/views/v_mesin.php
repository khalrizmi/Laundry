<div class="container-fluid">


  <div class="row">
    <div class="col-lg-12"> 

	<div class="row">
		<div class="col-md-8">
		        <div class="panel panel-primary panel-custom">
		          <div class="panel-heading">
		            <b class='glyphicon glyphicon-info-sign'></b> 
			          <b style='padding:6px 0;display: inline-block'>
			            Pemakai Mesin Hari ini
			          </b>              
		            <span class="btn-hapus-pilihan" style="display:none">
		              <button id='tombol-konfirmasi-hapus-kasir-pilihan' type="button" class="pull-right btn btn-danger" data-toggle='modal' data-target='#modal-hapus-kasir-pilihan'><b class='glyphicon glyphicon-trash'></b> Hapus Kasir</button>
		            </span>                 
		          </div>
		          <div class="panel-body">            
		            <table id="table_order" class="table table-bordered table-hover" cellspacing="0" width="100%">
		              <thead>
		              	<th>Nomor Mesin</th>
		                <!-- <th>Nomor Urut</th> -->
						<th>Nama</th>
						<th>Nomor HP</th>
						<th>Status</th>
		              </thead> 
		              <tbody>
		              	<?php foreach($list_data as $row): ?>
		              		<tr>
		              			<?php if($row->jenis_mesin == 1) echo "<td>W$row->nomor_mesin</td>";
		              			      else echo "<td>D$row->nomor_mesin</td>" ?>
		              			<!-- <td><?php echo $row->no_invoice ?></td> -->
		              			<td><?php echo $row->nama ?></td>
		              			<td><?php echo $row->no_hp ?></td>
								<td>
								<?php 
									if($row->ket == 0){
										echo "<button class='btn btn-danger'>Proses</button>";
									}else if($row->ket == 1){
										echo "<button class='btn btn-danger'>Selesai</button>";
									}else if($row->ket == 2){
										echo "<button class='btn btn-danger'>Diambil</button>";
									}
								 ?>
		              			</td>
		              		</tr>
		              	<?php endforeach; ?>
					  </tbody>      
		            </table>

		          </div>
		        </div>                                 
		     
	    </div>

	    <div class="col-md-4">
		        <div class="panel panel-primary panel-custom">
		          <div class="panel-heading">
		            <b class='glyphicon glyphicon-info-sign'></b> 
			          <b style='padding:6px 0;display: inline-block'>
			            Pencarian
			          </b>              
		          </div>
		          <div class="panel-body">
		          <form method="post" id="form_cari" action="<?php echo base_url('mesin') ?>">
		          	<table class="table">
		          		<tr>
		          			<td>Nomor Mesin</td>
		          			<td>
		          				<select class="form-control"  name="no_mesin" id="no_mesin">
									<option value="0"></option>
									<?php for($i=1;$i<=10;$i++)
												if($i%2==1) echo "<option value='$i'>W$i</option>";  
									?>
									<?php for($i=1;$i<=10;$i++)
												if($i%2==0) echo "<option value='$i'>D$i</option>";  
									?>
								</select>
		          			</td>
		          		</tr>
		          		<tr>
		          			<td>Tanggal</td>
							<td><input type="text" class="form-control datepicker_all" name="tanggal" id="tanggal"></td>
		          		</tr>
		          		<tr>
		          			<td></td>
		          			<td align="right">
		          				<input type="submit" class="btn btn-primary" id="btn-cari" name="cari" value="Cari">
		          			</td>
		          		</tr>
		          	</table>
		          </form>            
		          </div>
		        </div>                                 
	    </div>

	    
     </div>

    </div><!-- col -->
  </div><!-- row -->
</div><!-- container -->    

<script>
	<?php echo "var url='".base_url()."';"; ?>
	


	// Delete
		function konfirmasi(id) {
			event.preventDefault(); // prevent form submit
			var form = event.target.form; // storing the form
			        swal({
			  title: "Apakah data akan diambil?",
			  text: "Data akan diambil",
			  type: "warning",
			  showCancelButton: true,
			  confirmButtonColor: "#000",
			  confirmButtonText: "Ambil!",
			  cancelButtonText: "kembali!",
			  closeOnConfirm: false,
			  closeOnCancel: false
			},
			function(isConfirm){
			  if (isConfirm) {
			    $.ajax({
					url: url+'order/ambil/'+id,
					type: 'GET',
					dataType: 'html',
					success: function(pesan){
						if(pesan == "sukses"){
							swal({
                                title: "Success!",
                                text:  "You are now following",
                                type: "success",
                                timer: 1500,
                                showConfirmButton: true
                            });
                            window.setTimeout(function(){ 
							    location.reload();
							} ,1500);
						}
					},
					error: function(pesan){
						alert(pesan);
					}
				});
			  } else {
			    swal.close();
			  }
			});
		}
</script>
    
