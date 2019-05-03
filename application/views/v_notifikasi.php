<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12"> 

	<div class="row">
		<div class="col-md-8">
		        <div class="panel panel-primary panel-custom">
		          <div class="panel-heading">
		            <b class='glyphicon glyphicon-info-sign'></b> 
			          <b style='padding:6px 0;display: inline-block'>
			            Order Satuan Selesai 
			          </b>              
		            <span class="btn-hapus-pilihan" style="display:none">
		              <button id='tombol-konfirmasi-hapus-kasir-pilihan' type="button" class="pull-right btn btn-danger" data-toggle='modal' data-target='#modal-hapus-kasir-pilihan'><b class='glyphicon glyphicon-trash'></b> Hapus Kasir</button>
		            </span>                 
		          </div>
		          <div class="panel-body">            
		            <table id="table_order" class="table table-bordered table-hover" cellspacing="0" width="100%">
		              <thead>
		                <th>Nomor Urut</th>
						<th>Nama</th>
						<th>Alamat</th>
						<th>Status</th>
		              </thead> 
		              <tbody>
		              	<?php foreach($data_satuan as $row): ?>
		              		<tr>
		              			<td><?php echo $row->no_bon ?></td>
		              			<td><?php echo $row->nama ?></td>
		              			<td><?php echo $row->alamat ?></td>
		              			<td>
		              				<button type="button" class='btn btn-primary' onclick="konfirmasi('<?php echo $row->id ?>')"><b class='glyphicon glyphicon-upload'></b> Ambil</button>
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
			            Recent Ambil
			          </b>              
		          </div>
		          <div class="panel-body">            
		            <table id="table_order" class="table table-bordered table-hover" cellspacing="0" width="100%">
		              <thead>
		                <th>Nomor Urut</th>
						<th>Nama</th>
						<th>Status</th>
		              </thead> 
		              <tbody>
		              	<?php foreach($recent_satuan as $row): ?>
		              		<tr>
		              			<td><?php echo $row->no_bon ?></td>
		              			<td><?php echo $row->nama ?></td>
		              			<td><b class='glyphicon glyphicon-check'></b></td>
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

<script>
	<?php echo "var url='".base_url()."';"; ?>
	$(document).ready(function() {
			$('#table_order').DataTable();
			$('#table_order2').DataTable();
		} );

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
    
