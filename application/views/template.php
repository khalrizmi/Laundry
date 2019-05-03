<!DOCTYPE html>
<html>
<head>
	<title>Viva Laundry</title>
	<link href='<?php echo base_url(); ?>assets/img/laundry.png' rel='icon' type='image/x-icon'/>
	
	<!-- Bootstrap -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>plugins/bootstrap/css/bootstrap.min.css">
	<script src="<?php echo base_url(); ?>plugins/jquery/jquery.js"></script>
	<script src="<?php echo base_url(); ?>plugins/bootstrap/js/bootstrap.min.js"></script>

	<!-- Datatables -->
	<link rel="stylesheet" href="<?php echo base_url();?>plugins/jquery_data_table/css/jquery.dataTables.min.css" />
	<script src="<?php echo base_url('');?>plugins/jquery_data_table/js/jquery.dataTables.min.js"></script>

	<!-- SweetAlert -->
	<link rel="stylesheet" href="<?php echo base_url();?>plugins/sweetalert/sweetalert.css" />
	<script src="<?php echo base_url();?>plugins/sweetalert/sweetalert.min.js"></script>

	<!-- DatePicker -->
	<link rel="stylesheet" href="<?php echo base_url() ?>plugins/datepicker/css/bootstrap-datepicker.css"/>	
	<script src='<?php echo base_url(); ?>plugins/datepicker/js/bootstrap-datepicker.min.js'></script>

	<!-- Custom -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">

</head>
<body style='background:#fff;'>

	<nav class="navbar navbar-default nav-mobile navbar-custom">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed pull-right" data-toggle="collapse"  id="menu-toggle">
				<span class="glyphicon glyphicon-th-large" aria-hidden="true"></span>
			</button>
			<div class="navbar-brand">
			</div>       
		</div>
	</nav>

	<div id="wrapper">
		
		<!-- Sidebar -->
		<div id="sidebar-wrapper">
		    <ul class="sidebar-nav nav-pills nav-stacked" id="menu">

		        <div class="sidebar-profile">
		        		<div class="sidebar-profile-info">	
										<h1><a href="#" class="sidebar-head">Viva Laundry </a></h1>      
		        		</div>
		            <!-- <div class="sidebar-profile-image"> 
		                <center><img src="<?php echo base_url() ?>assets/img/laundry.png" alt=""></center> 
		            </div> -->
		            <div class="sidebar-profile-info">
		                <div class="btn-sidebar-menu">                    
		                    <a href="javascript:;" id="btn-buka-sidebar" onClick="$('#btn-buka-sidebar , #menu-kedua').hide();$('#btn-tutup-sidebar , #menu-utama').show();$('#btn-tutup-sidebar').css('color','#fff');">
		                        <b class='glyphicon glyphicon-plus'></b>
		                        Buka Pengaturan
		                    </a>          
		                    <a href="javascript:;" id="btn-tutup-sidebar" onClick="$('#btn-tutup-sidebar, #menu-utama').hide();$('#btn-buka-sidebar , #menu-kedua').show();" style='display:none'>
		                        <b class='glyphicon glyphicon-minus'></b>
		                        Tutup Pengaturan
		                    </a> 
		                </div>
		            </div>            
		        </div>   

						<?php $level = $this->session->userdata('level'); ?>
		        <div id="menu-kedua">
		            <li>
		                <a href="<?php echo base_url('dashboard') ?>"><b class='glyphicon glyphicon-duplicate'></b> Dashboard</a>
		            </li>    
						<?php if($level == 'admin') :	 ?>
		                <li>
		                    <a href="<?php echo base_url('karyawan') ?>"><b class='glyphicon glyphicon-duplicate'></b> Karyawan</a>
		                </li>   

		                <li>
		                    <a href="<?php echo base_url('item') ?>"><b class='glyphicon glyphicon-duplicate'></b> Item</a>
		                </li> 

		                <li>
		                    <a href="<?php echo base_url('member') ?>"><b class='glyphicon glyphicon-duplicate'></b> Member</a>
		                </li>  

		                <li class="dropdown">
		                    <a href="#">
				                <b class='glyphicon glyphicon-duplicate'></b>
				                Data
				             </a>
				             <ul class="treeview-menu">
				                <li><a href="<?php echo base_url();?>tampil_order/satuan">&nbsp;<i class="fa fa-circle-o"></i>Satuan</a></li>
				                <li><a href="<?php echo base_url();?>tampil_order/koin">&nbsp;<i class="fa fa-circle-o"></i>Koin</a></li>
				             </ul>
		                </li>   

		                <li>
		                    <a href="laporan.html"><b class='glyphicon glyphicon-duplicate'></b> Laporan</a>
		                </li>  

		                <?php elseif($level == "karyawan"): ?>  

		               <!--  <li>
		                    <a href="<?php echo base_url('notifikasi') ?>"><b class='glyphicon glyphicon-duplicate'></b> Notifikasi <span class="badge badge-danger" id="load_row"></span></a>
		                </li> -->

		                <li>
		                    <a href="<?php echo base_url('order') ?>"><b class='glyphicon glyphicon-duplicate'></b> Order</a>
		                </li>

		                <li>
		                    <a href="<?php echo base_url('mesin') ?>"><b class='glyphicon glyphicon-duplicate'></b> Pemakai Mesin</a>
		                </li>
						
						 <li>
		                    <a href="<?php echo base_url('cuciansatuan') ?>"><b class='glyphicon glyphicon-duplicate'></b> Cucian Satuan</a>
		                </li>


		                <li>
		                    <a href="<?php echo base_url('cuciankoin') ?>"><b class='glyphicon glyphicon-duplicate'></b> Cucian Koin</a>
		                </li>

		                <?php endif; ?>                                  
		        </div>


		        <div id="menu-utama" style="display:none">
		                <li>
		                    <a href="#" data-toggle="modal" data-target="#modal-info-akun"><b class='glyphicon glyphicon-king'></b> Informasi Akun</a>
		                </li>        
		                <li>
		                    <a href="#" data-toggle="modal" data-target="#modal-ubah-sandi"><b class='glyphicon glyphicon-king'></b> Ubah Kata Sandi</a>
		                </li>
		                <li>
		                    <a href="#" data-toggle="modal" data-target="#modal-backup"><b class='glyphicon glyphicon-import'></b> Backup &amp; Restore</a>
		                </li>   
		                <li>
		                    <a id="fungsi-hapus" href="javascript:;"><b class='glyphicon glyphicon-trash'></b> Hapus Data</a>
		                </li>
		                <li>
		                    <a id="fungsi-log" href="javascript:;"><b class='glyphicon glyphicon-sunglasses'></b> Log Aktivitas</a>
		                </li>        
		            <li>
		                <a id="info-aplikasi" href="javascript:;"><b class='glyphicon glyphicon-info-sign'></b> Info Aplikasi</a>
		            </li>
		            <li>
		                <a href="<?php echo base_url('dashboard/logout') ?>"><b class='glyphicon glyphicon-log-out'></b> Keluar</a>
		            </li>
		        </div>      


		    </ul>
		</div> <!-- /Sidebar -->

		<!-- Content -->
		<div id="page-content-wrapper">
			<?php echo $content ?>
		</div> <!-- /Content-->

	</div> <!-- /wrapper-->


	<?php include 'modal/modal_tambahan.php'; ?>

<script>
	 /* ==================================================
    FUNGSI NAVIGASI COLLAPSE 
    =====================================================*/
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    /* ==================================================
    FUNGSI numberonly
    =====================================================*/
    function numberonly(evt) {
			if (/\D/g.test(evt.value)) evt.value = evt.value.replace(/\D/g,'')
				return false;
			return true;
		}
	/* ==================================================
    FUNGSI NAVIGASI CLASS ACTIVE 
    =====================================================*/
    var path = window.location.href;
    $('#menu-kedua li a').each(function() {
        if (this.href === path) {
            $(this).addClass('active');
        }
    });
    /* ==================================================
    FUNGSI DatePicker 
    =====================================================*/
    $('.datepicker_year').datepicker({
	      minViewMode: 2,
	      format: "yyyy",
	      autoclose:true
	  });

    $('.datepicker_all').datepicker({
	      format: "yyyy-mm-dd",
	      autoclose:true
	  });

    /* ==================================================
    FUNGSI Real Time Notifikasi 
    =====================================================*/

    setInterval(function(){
	$("#load_row").load('<?=base_url('notifikasi/load_row')?>')
	}, 2000);

	
</script>
</body>
</html>
