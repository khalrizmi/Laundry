<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12">          

     <!--  <div class="alert alert-success alert-dismissable">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Selamat Datang <?php echo $this->session->userdata('nama_user'); ?> !</strong> <strong>Anda Memiliki Hak Akses <?php echo $this->session->userdata('level'); ?></strong>
      </div> -->

      <div class="panel panel-primary panel-custom">
        <div class="panel-heading">                
          <b class='glyphicon glyphicon-info-sign'></b> 
          <b style='padding:6px 0;display: inline-block'>
            Statistik 
          </b> 
        </div>
        <div class="panel-body panel_statistik">
           <!-- Info boxes -->
						<div class="row">
							<div class="col-md-4">
						        <div class="panel panel-primary panel-custom">
						          <div class="panel-heading">
						            <b class='glyphicon glyphicon-info-sign'></b> 
							          <b style='padding:6px 0;display: inline-block'>
							            ORDER
							          </b>              
						          </div>
						          <div class="panel-body">
						          <form method="post" id="form_cari" action="<?php echo base_url('mesin/tanggal') ?>">
						          	<table class="table">
						          		<tr>
						          			<td>Hari ini</td>
						          			<td align="right"><b><?php echo $order_hariini ?></b></td>
						          		</tr>
						          		<tr>
						          			<td>Semua</td>
														<td align="right"><b><?php echo $order_semua ?></b></td>
						          		</tr>
						          		<tr>
						          			<td></td>
						          			<td align="right">
						          				<button type="button" class="btn btn-primary">Detail <b class="glyphicon glyphicon-arrow-right"></b></button>
						          			</td>
						          		</tr>
						          	</table>
						          </form>            
						          </div>
						        </div>                                 
					   	 </div>

					   	 <div class="col-md-8">
					   	 		<div class="row">
					   	 			<div class="col-md-12">
					   	 				<a href="<?= base_url('tampil_order/satuan/').$this->session->userdata('operator_id')  ?>" class="thumbnail">
													<img class="img" src="<?php echo base_url('img/boy-4.png') ?>">
													<div class="caption text-center">
														<h4>Data Satuan</h4>
													</div>
											</a>		
					   	 			</div>
					   	 		</div>
					   	 		<div class="row">
					   	 			<div class="col-md-12">
					   	 				<a href="<?= base_url('tampil_order/satuan/').$this->session->userdata('operator_id')  ?>" class="thumbnail">
													<img class="img" src="<?php echo base_url('img/boy-4.png') ?>">
													<div class="caption text-center">
														<h4>Data Satuan</h4>
													</div>
											</a>		
					   	 			</div>
					   	 		</div>
					   	 </div>
						</div>

						<div class="row">
							<div class="col-md-4">
						        <div class="panel panel-primary panel-custom">
						          <div class="panel-heading">
						            <b class='glyphicon glyphicon-info-sign'></b> 
							          <b style='padding:6px 0;display: inline-block'>
							            DIKERJAKAN
							          </b>              
						          </div>
						          <div class="panel-body">
						          <form method="post" id="form_cari" action="<?php echo base_url('mesin/tanggal') ?>">
						          	<table class="table">
						          		<tr>
						          			<td>Hari ini</td>
						          			<td align="right"><b><?php echo $dikerjakan_hariini ?></b></td>
						          		</tr>
						          		<tr>
						          			<td>Semua</td>
														<td align="right"><b><?php echo $dikerjakan_semua ?></b></td>
						          		</tr>
						          		<tr>
						          			<td></td>
						          			<td align="right">
						          				<a href="<?= base_url('dashboard/dikerjakan/satuan'); ?>" class="btn btn-primary">Detail <b class="glyphicon glyphicon-arrow-right"></b></a>
						          			</td>
						          		</tr>
						          	</table>
						          </form>            
						          </div>
						        </div>                                 
					   	 </div>

					   	 <div class="col-md-4">
						        <div class="panel panel-primary panel-custom">
						          <div class="panel-heading">
						            <b class='glyphicon glyphicon-info-sign'></b> 
							          <b style='padding:6px 0;display: inline-block'>
							            SELESAI
							          </b>              
						          </div>
						          <div class="panel-body">
						          <form method="post" id="form_cari" action="<?php echo base_url('mesin/tanggal') ?>">
						          	<table class="table">
						          		<tr>
						          			<td>Hari ini</td>
						          			<td align="right"><b><?php echo $selesai_hariini ?></b></td>
						          		</tr>
						          		<tr>
						          			<td>Semua</td>
														<td align="right"><b><?php echo $selesai_semua ?></b></td>
						          		</tr>
						          		<tr>
						          			<td></td>
						          			<td align="right">
						          				<a href="<?= base_url('dashboard/selesai/satuan'); ?>" class="btn btn-primary">Detail <b class="glyphicon glyphicon-arrow-right"></b></a>
						          			</td>
						          		</tr>
						          	</table>
						          </form>            
						          </div>
						        </div>                                 
					   	 </div>

					   	 <div class="col-md-4">
						        <div class="panel panel-primary panel-custom">
						          <div class="panel-heading">
						            <b class='glyphicon glyphicon-info-sign'></b> 
							          <b style='padding:6px 0;display: inline-block'>
							            DIAMBIL
							          </b>              
						          </div>
						          <div class="panel-body">
						          <form method="post" id="form_cari" action="<?php echo base_url('selesai/satuan') ?>">
						          	<table class="table">
						          		<tr>
						          			<td>Hari ini</td>
						          			<td align="right"><b><?php echo $diambil_hariini ?></b></td>
						          		</tr>
						          		<tr>
						          			<td>Semua</td>
														<td align="right"><b><?php echo $diambil_semua ?></b></td>
						          		</tr>
						          		<tr>
						          			<td></td>
						          			<td align="right">
						          				<a href="<?= base_url('dashboard/diambil/satuan'); ?>" class="btn btn-primary">Detail <b class="glyphicon glyphicon-arrow-right"></b></a>
						          			</td>
						          		</tr>
						          	</table>
						          </form>            
						          </div>
						        </div>                                 
					   	 </div>
						</div>
        </div>            
      </div>


    </div><!-- col -->
  </div><!-- row -->
</div><!-- container -->    
    
