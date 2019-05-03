<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12"> 

	<div class="row">
		<div class="col-md-8">
		        <div class="panel panel-primary panel-custom">
		          <div class="panel-heading">
		            <b class='glyphicon glyphicon-info-sign'></b> 
			          <b style='padding:6px 0;display: inline-block'>
			          	<?php 
			          		if($tanggal==NULL && $jenis==0){
			          			echo "Semua Order Satuan";
			          		}else if($tanggal && $jenis==0){
			          			echo "Semua Order Satuan Tanggal $tanggal";
			          		}
			          		else if($tanggal==NULL && $jenis==1){
			          			echo "Sedang dikerjakan $tanggal";
			          		}else if($tanggal && $jenis==1){
			          			echo "Sedang dikerjakan $tanggal";
			          		}
			          		else if($tanggal==NULL && $jenis==2){
			          			echo "Sudah selesai $tanggal";
			          		}else if($tanggal && $jenis==2){
			          			echo "Sudah selesai $tanggal";
			          		}
			          		else if($tanggal==NULL && $jenis==3){
			          			echo "Sudah diambil $tanggal";
			          		}else if($tanggal && $jenis==3){
			          			echo "Sudah diambil $tanggal";
			          		}
			          	 ?>
			          </b>              
		            <span class="btn-hapus-pilihan" style="display:none">
		              <button id='tombol-konfirmasi-hapus-kasir-pilihan' type="button" class="pull-right btn btn-danger" data-toggle='modal' data-target='#modal-hapus-kasir-pilihan'><b class='glyphicon glyphicon-trash'></b> Hapus Kasir</button>
		            </span>                 
		          </div>
		          <div class="panel-body">      
		            <table id="table_order" class="table">
		              <thead>
		                <th>Nomor Invoice</th>
						<th>Nama</th>
						<th>Nomor HP</th>
						<th>Status</th>
						<th>Print</th>
		              </thead> 
		              <tbody>
		              	<?php foreach($list_data->result() as $row): ?>
		              		<tr>
		              			<td><?php echo $row->no_bon ?></td>
		              			<td><?php echo $row->nama ?></td>
		              			<td><?php echo $row->no_hp ?></td>
		              			<td>
		              				<?php if($row->ket == 0): ?>
										<button class="btn btn-danger">Dikerjakan</button>
		              				<?php elseif($row->ket == 1): ?>
		              				  	<button class="btn btn-success" onclick="selesai('<?= $row->id ?>','<?= $row->no_bon ?>')">Selesai</button>
		              				<?php elseif($row->ket == 2): ?>
		              				  	<button class='btn btn-primary'>Diambil</button>
		              				<?php endif; ?>
		              			</td>
		              			<td>
		              				<button class='btn btn-primary' onclick="print('<?= $row->no_bon ?>')"><b class="glyphicon glyphicon-print"></b></button>
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
		          	<form method="post" id="form_cari" action="<?php echo base_url('cuciansatuan'); ?>">
		          	<table class="table">
		          		<tr>
		          			<td>Status</td>
							<td>
								<select name="status" id="status" class="form-control">
									<option value="0" <?php if($jenis == 0) echo "selected"; ?>></option>
									<option value="1" <?php if($jenis == 1) echo "selected"; ?>>Dikerjakan</option>
									<option value="2" <?php if($jenis == 2)  echo "selected";?>>Selesai</option>
									<option value="3" <?php if($jenis == 3) echo "selected"; ?>>Diambil</option>
								</select>
							</td>
		          		</tr>
		          		<tr>
		          			<td>Tanggal</td>
							<td><input type="text" class="form-control datepicker_all" name="tanggal" id="tanggal" value="<?php echo $tanggal ?>"></td>
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

		        <div class="panel panel-primary panel-custom">
		          <div class="panel-heading">
		            <b class='glyphicon glyphicon-info-sign'></b> 
			          <b style='padding:6px 0;display: inline-block'>
			            Recent Ambil
			          </b>              
		          </div>
		          <div class="panel-body">            
		            <table id="table_order" class="table table-bordered table-hover" cellspacing="0" width="100%">
		              <thead>
		                <th>Nomor Urut</th>
						<th>Nama</th>
						<th>Nomor HP</th>
		              </thead> 
		              <tbody>
		              	<?php foreach($list_recent->result() as $row): ?>
							<tr>
								<td><?= $row->no_bon ?></td>
								<td><?= $row->nama ?></td>
								<td><?= $row->no_hp ?></td>
							</tr>
		              	<?php endforeach; ?>
					  </tbody>      
		            </table>

		          </div>
		        </div>                                 
		     
	    </div>

	    
     </div>

    </div><!-- col -->
  </div><!-- row -->
</div><!-- container -->   


<?php include 'struk/btn_print-satuan.php'; ?>




<script>
	<?php echo "var url='".base_url()."';"; ?>

	// function dikerjakan(id, invoice){
	// 	event.preventDefault(); // prevent form submit
	// 		var form = event.target.form; // storing the form
	// 		        swal({
	// 		  title: "Apakah data sudah selesai?",
	// 		  text: invoice,
	// 		  type: "warning",
	// 		  showCancelButton: true,
	// 		  confirmButtonColor: "#2ecc71",
	// 		  confirmButtonText: "Selesai!",
	// 		  cancelButtonText: "kembali!",
	// 		  closeOnConfirm: false,
	// 		  closeOnCancel: false
	// 		},
	// 		function(isConfirm){
	// 		  if (isConfirm) {
	// 		    $.ajax({
	// 				url: url+'cuciansatuan/selesai_satuan/'+id,
	// 				type: 'GET',
	// 				dataType: 'html',
	// 				success: function(pesan){
	// 					if(pesan == "sukses"){
	// 						swal({
 //                                title: "Success!",
 //                                text:  "You are now following",
 //                                type: "success",
 //                                timer: 1500,
 //                                showConfirmButton: true
 //                            });
 //                            window.setTimeout(function(){ 
	// 						    location.reload();
	// 						} ,1500);
	// 					}
	// 				},
	// 				error: function(pesan){
	// 					alert(pesan);
	// 				}
	// 			});
	// 		  } else {
	// 		    swal.close();
	// 		  }
	// 		});
	// }

	function selesai(id, invoice){
		event.preventDefault(); // prevent form submit
			var form = event.target.form; // storing the form
			        swal({
			  title: "Apakah data akan diambil?",
			  text: invoice,
			  type: "warning",
			  showCancelButton: true,
			  confirmButtonColor: "#3498db",
			  confirmButtonText: "Selesai!",
			  cancelButtonText: "kembali!",
			  closeOnConfirm: false,
			  closeOnCancel: false
			},
			function(isConfirm){
			  if (isConfirm) {
			    $.ajax({
					url: url+'cuciansatuan/ambil_satuan/'+id,
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
    
