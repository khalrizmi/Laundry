<div class="container-fluid">


  <div class="row">
    <div class="col-lg-12"> 

	<div class="row">
		<div class="col-md-8">
		        <div class="panel panel-primary panel-custom">
		          <div class="panel-heading">
		            <b class='glyphicon glyphicon-info-sign'></b> 
			          <b style='padding:6px 0;display: inline-block'>
			          	<?php if($script==0): ?>
			          		<?php 
				             if($tanggal  != NULL) echo "Dikerjakan dari Tanggal $tanggal";
				             else echo "Data semua yang sedang dikerjakan ".$list_data->num_rows(); ?>
			          	<?php elseif($script==1): ?>
				          	<?php 
				             if($tanggal  != NULL) echo "Selesai Tanggal $tanggal";
				             else echo "Data semua cucian selesai ".$list_data->num_rows(); ?>
			            <?php elseif($script==2): ?>
			            	<?php 
				             if($tanggal  != NULL) echo "Diambil pada Tanggal $tanggal";
				             else echo "Data semua cucian yang sudah diambil ".$list_data->num_rows(); ?>
			            <?php endif; ?>
			          </b>              
		          </div>
		          <div class="panel-body">            
		          	<div class="row">
		          		<div class="col-md-6">
			          		<div class="form-group">
			          			<label for=""></label>
			          			<select name="jenis_cuci" class="form-control" id="jenis_cuci">
			          				<option value="1" <?php if($jenis==1) echo "selected"; ?>>Satuan</option>
			          				<option value="2" <?php if($jenis==2) echo "selected"; ?>>Koin</option>
			          			</select>
			          		</div>
		          		</div>
		          	</div>
		          	<?php if($jenis==1): ?>
		          	<div class="row">
		          		<div class="col-md-12">
				            <table id="table_order" class="table table-bordered table-hover" cellspacing="0" width="100%">
				              <thead>
				              	<th>Nomor Bon</th>
				                <!-- <th>Nomor Urut</th> -->
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
										<td><?php 
												if($row->ket == 0)	echo "<button class='btn btn-danger'>Dikerjakan</button>";													
												else if($row->ket == 1) echo "<button class='btn btn-success'>Selesai</button>";
												else if($row->ket == 2) echo "<button class='btn btn-primary'>Diambil</button>"; 
											?>
										</td>
										<td>
				              				<button class='btn btn-primary' id="print_satuan" onclick="print('<?= $row->no_bon ?>')"><b class="glyphicon glyphicon-print"></b></button>
				              			</td>
									</tr>
				              	<?php endforeach; ?>
							  </tbody>      
				            </table>
			            </div>
			        </div>

			    	<?php else : ?>
		          	<div class="row">
		          		<div class="col-md-12">
				            <table id="table_order" class="table table-bordered table-hover" cellspacing="0" width="100%">
				              <thead>
				              	<th>Nomor Invoice</th>
				                <!-- <th>Nomor Urut</th> -->
								<th>Nama</th>
								<th>Nomor HP</th>
								<th>Status</th>
								<th>Print</th>
				              </thead> 
				              <tbody>
				              	<?php foreach($list_data->result() as $row): ?>
									<tr>
										<td><?php echo $row->invoice_no ?></td>
										<td><?php echo $row->nama ?></td>
										<td><?php echo $row->no_hp ?></td>
										<td><?php 
												if($row->ket == 0)	echo "<button class='btn btn-danger'>Dikerjakan</button>";													
												else if($row->ket == 1) echo "<button class='btn btn-success'>Selesai</button>";
												else if($row->ket == 2) echo "<button class='btn btn-primary'>Diambil</button>"; 
											?>
										</td>
										<td>
				              				<button class='btn btn-primary' id="print_koin" onclick="print('<?= $row->no_bon ?>')"><b class="glyphicon glyphicon-print"></b></button>
				              			</td>
									</tr>
				              	<?php endforeach; ?>
							  </tbody>      
				            </table>
			            </div>
			        </div>
			    	<?php endif; ?>

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
		          <?php if($script==0): ?>
					<?php if($jenis==1): ?>
			          	<form method="post" id="form_cari" action="<?php echo base_url('dashboard/dikerjakan/satuan'); ?>">
			          <?php else : ?>
			          	<form method="post" id="form_cari" action="<?php echo base_url('dashboard/dikerjakan/koin'); ?>">
			          <?php endif; ?>

					<?php elseif($script==1): ?>
			          <?php if($jenis==1): ?>
			          	<form method="post" id="form_cari" action="<?php echo base_url('dashboard/selesai/satuan'); ?>">
			          <?php else : ?>
			          	<form method="post" id="form_cari" action="<?php echo base_url('dashboard/selesai/koin'); ?>">
			          <?php endif; ?>

					<?php elseif($script==2): ?>
						<?php if($jenis==1): ?>
			          	<form method="post" id="form_cari" action="<?php echo base_url('dashboard/diambil/satuan'); ?>">
			          <?php else : ?>
			          	<form method="post" id="form_cari" action="<?php echo base_url('dashboard/diambil/koin'); ?>">
			          <?php endif; ?>	
					<?php endif; ?>

		          	<table class="table">
		          		<tr>
		          			<td>Tanggal</td>
							<td><input type="text" class="form-control datepicker_all" name="tanggal" id="tanggal" value="<?php echo $filter_tanggal ?>"></td>
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

<?php if($jenis==1) $this->load->view('struk/btn_print-satuan');
      else $this->load->view('struk/btn_print-koin') ?>


<?php if ($script == 0): ?>
<script>
	<?php echo "var url='".base_url()."';"; ?>
	
	$("#jenis_cuci").change(function(){
		if($(this).val() == "1"){
			window.location.href='<?php echo base_url('dashboard/dikerjakan/satuan') ?>';	
		}else if($(this).val() == "2"){
			window.location.href='<?php echo base_url('dashboard/dikerjakan/koin') ?>';	
		}
	})
</script>
<?php elseif ($script == 1): ?>
<script>
	<?php echo "var url='".base_url()."';"; ?>
	
	$("#jenis_cuci").change(function(){
		if($(this).val() == "1"){
			window.location.href='<?php echo base_url('dashboard/selesai/satuan') ?>';	
		}else if($(this).val() == "2"){
			window.location.href='<?php echo base_url('dashboard/selesai/koin') ?>';	
		}
	})
</script>
<?php elseif ($script == 2): ?>
<script>
	<?php echo "var url='".base_url()."';"; ?>
	
	$("#jenis_cuci").change(function(){
		if($(this).val() == "1"){
			window.location.href='<?php echo base_url('dashboard/diambil/satuan') ?>';	
		}else if($(this).val() == "2"){
			window.location.href='<?php echo base_url('dashboard/diambil/koin') ?>';	
		}
	})
</script>
<?php endif; ?>
    
