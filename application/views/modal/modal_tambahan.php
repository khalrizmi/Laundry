<!--  /* ==================================================
    Modal info akun 
    =====================================================*/ -->
<div class="modal" id="modal-info-akun">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
		    <button type="button" class="close" data-dismiss="modal">&times;</button>
		    <h4 class="modal-title"><b class='glyphicon glyphicon-info-sign'></b> Informasi Akun</h4>
		  </div>
		  <div class="modal-body">
		    <div class="respon">   
		      <center><img src="<?php echo base_url() ?>assets/img/profile.ico" alt="" width='25%'></center> <br/>
		      <table class='table table-bordered'>
		        <tbody>
		          <tr>
		            <td width="15%">Nama</td>
		            <td><?php echo $this->session->userdata('nama_user') ?></td>
		          </tr>
		          <tr>
		            <td>Alamat</td>
		            <td><?php echo $this->session->userdata('alamat_user') ?></td>
		          </tr>
		          <tr>
		            <td>Telepon</td>
		            <td><?php echo $this->session->userdata('telepon_user') ?></td>
		          </tr>
		          <tr>
		            <td>Akses</td>
		            <td><?php echo $this->session->userdata('level') ?></td>
		          </tr>          
		          <tr>          
		          </tbody>
		        </table> 
		      </div>
		    </div>
		    <div class="modal-footer">
		      <div class="pull-left">
		        <div class="notif-modal"></div>
		        <img class='ajax-loader'>     
		      </div>      
		      <div class='modal-btn'>
		        <button type="button" class="btn btn-danger" data-dismiss="modal"><b class='glyphicon glyphicon-remove'></b> Tutup</button>      
		      </div>
		    </div>
		</div>
	</div>
</div>


<!--  /* ==================================================
    Modal ubah kata sandi
    =====================================================*/ -->
<div class="modal" id="modal-ubah-sandi">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
	      <button type="button" class="close" data-dismiss="modal">&times;</button>
	      <h4 class="modal-title"><b class='glyphicon glyphicon-info-sign'></b> Ubah Kata Sandi</h4>
	    </div>
	    <div class="modal-body">
	      <div class="respon">    
	        <form id="form-ubah-kata-sandi" method="post">
	          <div class="form-group">
	            <label>Kata Sandi Sekarang</label>
	            <input placeholder='Masukan Kata Sandi Lama' class="form-control required" type="password" name="p1" id="p1">
	          </div>
	          <div class="form-group">
	            <label>Kata Sandi Baru</label>
	            <input placeholder='Masukan Kata Sandi Baru' class="form-control required" type="password" name="p1n" id="p1n">
	          </div>
	          <div class="form-group">
	            <label>Konfirmasi Kata Sandi Baru</label>
	            <input onkeyup="cocok_pw()" placeholder='Konfirmasi Kata Sandi Baru' class="form-control required" type="password" name="p2n" id="p2n">
	          </div> 
	      </div>
	    </div>
	    <div class="modal-footer">
	      <div class="pull-left">
	        <div class="notif-modal"></div>   
	      </div>      
	      <div class='modal-btn'>
	        <button disabled type="submit" class="btn btn-primary" id='btn-ubah-kata-sandi'>
	          <b class='glyphicon glyphicon-save'></b>
	          Simpan
	        </button>
	        </form>  
	        <button type="button" class="btn btn-danger" data-dismiss="modal">
	          <b class='glyphicon glyphicon-remove'></b>
	          Batal
	        </button>          
	      </div>
	    </div>
		</div>
	</div>
</div>


<!--  /* ==================================================
    Modal backup and restore
    =====================================================*/ -->
<div class="modal" id="modal-backup">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
	      <button type="button" class="close" data-dismiss="modal">&times;</button>
	      <h4 class="modal-title">Backup &amp; Restore</h4>
	    </div>
	    <div class="modal-body">
	      <div class="respon">
	        <script type="text/javascript">
	          $(document).ready(function(){
	            $("#hidden").hide();
	          })
	          $(document).on('change' , '#option' , function(){
	            if ($("#option").val() == 'restore') {        
	              $("#hidden").show();
	            }else {
	              $("#hidden").hide();
	            }
	          })
	        </script>          
	        <form id='form-backuprestore'>
	          <div class="form-group">
	            <label>Fungsi ini Masih Belum Sempurna</label>
	            <select id="option" name="option" class="form-control required" required="">
	              <option value="">Pilih Opsi</option>    
	              <option value="backup">Backup</option>
	              <option value="restore">Restore</option>
	            </select> 
	          </div>
	          <div class="form-group" id="hidden">
	            <input id="filerestore" class="form-control" type="file" name="file">
	          </div>    
	          <div class="form-group">
	            <input id="password-confirm" placeholder='Masukan Password' class="form-control required" type="password" name="password">
	          </div>                  
	        </form>           
	      </div>
	      <div class="modal-footer">
	        <div class="pull-left">
	          <div class="notif-modal"></div>
	          <img class='ajax-loader'>     
	        </div>                
	        <div class='modal-btn'>
	          <button id='btn-backup-restore' type="button" class="btn btn-primary"><b class='glyphicon glyphicon-file'></b> Proses</button>
	          <button type="button" class="btn btn-danger" data-dismiss="modal"><b class='glyphicon glyphicon-remove'></b> Batal</button>              
	        </div>
	      </div>         
	    </div>
		</div>
	</div>
</div>



<!--  /* ==================================================
    SCRIPT ubah kata sandi
    =====================================================*/ -->
<script>

	<?php echo "var url='".base_url()."';"; ?>
	
	$(document).ready(function(){
		$("#form-ubah-kata-sandi").on('submit', function(e){
			e.preventDefault();
			$("#btn-ubah-kata-sandi").prop('disabled', true);
			if($("#p1").val() == "") $("#p1").focus();
			else if($("#p1n").val() == "") $("#p1n").focus();
			else if($("#p2n").val() == "") $("#p2n").focus();
			else {
				$.ajax({
					url: url+'login/cek_pw/'+$("#p1").val(),
					data: 'get',
					dataType: 'html',
					success: function(pesan){
						if(pesan == "sukses"){
							$.ajax({
								url: url+'login/ubah_pw/'+$("#p2n").val(),
								data: 'get',
								dataType: 'html',
								success: function(d){
									if(d == "sukses"){
										swal({
					                        title: "Success!",
					                        text:  "Password Sudah Diupdate",
					                        type: "success",
					                        timer: 2000,
					                        showConfirmButton: true
					                    });
					                    window.setTimeout(function(){ 
											   location.reload();
										} ,2000);
									}
									else  swal ( "Oops" ,  "Password belum diubah!" ,  "error" );
								}
							})
						}
						else  swal ( "Oops" ,  "Password Lama salah!" ,  "error" );
					}
				});
			};
		})
	})

	function cocok_pw(){
		$p1n = $("#p1n").val();
		$p2n = $("#p2n").val();
		if($p2n == $p1n) $("#btn-ubah-kata-sandi").prop('disabled', false); 
		else             $("#btn-ubah-kata-sandi").prop('disabled', true); 
	}

	function cek_pw_lama(){
		$.ajax({
			url: url+'login/cek_pw/'+$("#p1").val(),
			data: 'get',
			dataType: 'html',
			success: function(pesan){
				if(pesan == "sukses") return true;
				else              		return false;
			}
		})
	}


</script>
