<?php 
    	$nilai = substr($kode['kode'], -6);
    	$tambah = $nilai + 1;

    	if($tambah < 10){
    		$auto_kode = "VV00000".$tambah;
    	}else if($tambah < 100){
    		$auto_kode = "VV0000".$tambah;
    	}else if($tambah < 1000){
    		$auto_kode = "VV000".$tambah;
    	}else if($tambah < 10000){
    		$auto_kode = "VV00".$tambah;
    	}else if($tambah < 100000){
    		$auto_kode = "VV0".$tambah;
    	}else if($tambah < 1000000){
    		$auto_kode = "VV".$tambah;
    	}
?>
<div class="container-fluid">
  <form id="form-table-member" method="post">
    <div class="row">
      <div class="col-lg-12"> 
        <div class="panel panel-primary panel-custom">
          <div class="panel-heading">
            <button type="button" class="btn btn-success" onclick="tampilTambah()"><b class='glyphicon glyphicon-plus'></b> Tambah Member</button>      
            <button id='refresh_table_kasir' type='button' class='btn btn-primary pull-right'><b class='glyphicon glyphicon-refresh'></b> Refresh</button>            
            <span class="btn-hapus-pilihan" style="display:none">
              <button id='tombol-konfirmasi-hapus-kasir-pilihan' type="button" class="pull-right btn btn-danger" data-toggle='modal' data-target='#modal-hapus-kasir-pilihan'><b class='glyphicon glyphicon-trash'></b> Hapus Member</button>
            </span>                 
          </div>
          <div class="panel-body">            
            <table id="table_member" class="table table-bordered table-hover" cellspacing="0" width="100%">
              <thead>
			    <th>No Member</th>
			    <th>Nama</th>
			    <th>Telepon</th>
			    <th>Alamat</th>
			    <!-- <th>Tgl Aktivitas</th> -->
			    <!-- <th>Tgl NO Aktivitas</th> -->
			    <th>Jumlah Stam</th>
			    <th>Opsi</th>
              </thead> 
              <tbody>
				<?php 
					foreach($data as $row):
				?>
				<tr>
					<td><?= $row->no_member ?></td>
					<td><?= $row->nama ?></td>
					<td><?= $row->telepon ?></td>
					<td><?= $row->alamat ?></td>
					<!-- <td><?= $row->tgl_aktivitas ?></td> -->
					<!-- <td><?= $row->tgl_no_aktivitas ?></td> -->
					<td><?= $row->jumlah_stam ?></td>
					<td>
						<button type="button" class="btn btn-primary" onclick="tampilEdit('<?php echo $row->no_member ?>')"><b class='glyphicon glyphicon-edit'></b> Ubah</button>&nbsp;
						<button type="button" class='btn btn-danger' onclick="konfirmasi('<?php echo $row->no_member ?>')"><b class='glyphicon glyphicon-trash'></b> Hapus</button>
					</td>
				</tr>
				<?php endforeach; ?>
				</tbody>      
            </table>

          </div>
        </div>                                 
      </div>
    </div>
  </form>    
</div>    

<div id="modal-tambah-member" class="modal" tabindex="-1">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><b class='glyphicon glyphicon-info-sign'></b> Tambah Member</h4>
      </div>
      <div class="modal-body">
          <form method="post" id="form-tambah-member">
            <div class='row'>
              <div class='col-md-6 col-sm-6 col-xs-6'>
                <div class="form-group">
                  <label>Nama</label>
                  <input type="text" class="form-control" placeholder="Nama" name="nama" id="f1">
                </div>
                <div class="form-group">
                  <label>Telepon</label>
                  <input onkeyup="return numberonly(this)" placeholder='Telepon' class="form-control required" type="text" name="telepon" id="f2">
                </div>
                <div class="form-group">
                  <label>Alamat</label>
                  <textarea rows="4" id="f3" name="alamat" placeholder="Alamat" class="form-control required"></textarea>
                </div>            
              </div>
              <div class='col-md-6 col-sm-6 col-xs-6'>
                <div class="form-group">
                  <label>No Member</label>
                  <input placeholder='No Member' class="form-control required" type="text value="<?php echo $auto_kode ?>"" name="username" id="f4" readonly>
                </div>
                <div class="form-group">
                  <label>Tgl Aktivitas</label>
                  <input placeholder="Tanggal Aktivitas" class="form-control required datepicker_all" type="text" name="aktivitas" id="f5">
                </div>
                <div class="form-group">
                  <label>Tgl No Aktivitas</label>
                  <input placeholder="Tanggal Aktivitas" class="form-control required datepicker_all" type="text" name="noaktivitas" id="f6">
                </div>
                <div class="form-group form-radio">
                  <label>Jumlah Stam</label><br/>
                  <input onkeyup="return numberonly(this)" placeholder='Jumlah Stam' class="form-control required" type="text" name="jumlah_stam" id="f7">
                </div>                          
              </div>            
            </div>        
          </form>         
      </div>
      <div class="modal-footer">
        <div class='modal-btn'>
          <button type="submit" class="btn btn-primary" id='btn-tambah-member'>
            <b class='glyphicon glyphicon-save'></b>
            Simpan
          </button>
          <button type="submit" class="btn btn-primary" id='btn-edit-member'>
            <b class='glyphicon glyphicon-save'></b>
            Update
          </button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">
            <b class='glyphicon glyphicon-remove'></b>
            Batal
          </button>
        </div>
      </div>    
    </div>
  </div>
</div>



<script>
		<?php echo "var url='".base_url()."';"; ?>
		var edit_id;

		$(document).ready(function() {
			$('#table_member').DataTable();
		} );

		//refreshtable
		$("#refresh_table_kasir").click(function(){
			window.location.href=url+'member';
		})

		function validation(){
			if($("#f1").val()=="") $("#f1").focus();
			else if($("#f2").val()=="") $("#f2").focus();
			else if($("#f3").val()=="") $("#f3").focus();
			else if($("#f4").val()=="") $("#f4").focus();
			else if($("#f5").val()=="") $("#f5").focus();
			else if($("#f6").val()=="") $("#f6").focus();
			else if($("#f7").val()=="") $("#f7").focus();
			else return true;
		}

		function tampilTambah(){
			$("#btn-tambah-member").show();
			$("#btn-edit-member").hide();
			$("#modal-tambah-member").modal('show');
			$('#f1').val('');
			$('#f2').val('');
			$('#f3').val('');
			$('#f4').val('<?php echo $auto_kode ?>');
			$('#f5').val('');
			$('#f6').val('');
			$('#f7').val('');
		}
		function tampilEdit(id){
			$("#btn-tambah-member").hide();
			$("#btn-edit-member").show();
			$("#modal-tambah-member").modal('show');
			edit_id = id;
			$.ajax({
				url: url+'member/edit/'+id,
				type: 'get',
				dataType: 'json',
				success: function(data){
					$('#f1').val(data.nama);
					$('#f2').val(data.telepon);
					$('#f3').html(data.alamat);
					$('#f4').val(data.no_member);
					$('#f5').val(data.tgl_aktivitas);
					$('#f6').val(data.tgl_no_aktivitas);
					$('#f7').val(data.jumlah_stam);
				}
			})
		}

		// Tambah
		$(document).on('click','#btn-tambah-member',function(){
			if (validation()==true){
				var btn = $(this);
     		 	btn.prop('disabled',true);
				$.ajax({
					url: url+'member/input',
					type: 'post',
					data: $("#form-tambah-member").serialize(),
					dataType: 'html'
				})
				.done(function(data){
					btn.prop('disabled', false);
					if(data == "sukses"){
						swal({
                             title: "Success!",
                             text:  "Data telah diinput",
                             type: "success",
                             timer: 1500,
                             showConfirmButton: true
                        });
                        window.setTimeout(function(){ 
							location.reload();
						} ,1500);
					}
					else{
						swal("Oh noes!", "The AJAX request failed!", "error");
					}
				})
			}
		});
		// Edit
		$(document).on('click','#btn-edit-member',function(){
			if (validation()==true){
				var btn = $(this);
     		 	btn.prop('disabled',true);
				$.ajax({
					url: url+'member/update/'+edit_id,
					type: 'post',
					data: $("#form-tambah-member").serialize(),
					dataType: 'html'
				})
				.done(function(data){
					btn.prop('disabled', false);
					if(data == "sukses"){
						swal({
                             title: "Success!",
                             text:  "Data telah diupdate",
                             type: "success",
                             timer: 1500,
                             showConfirmButton: true
                        });
                        window.setTimeout(function(){ 
							location.reload();
						} ,1500);
					}
					else{
						swal("Oh noes!", "The AJAX request failed!", "error");
					}
				})
			}
		});

		
		// Delete
		function konfirmasi(id) {
			event.preventDefault(); // prevent form submit
			var form = event.target.form; // storing the form
			        swal({
			  title: "Apakah data akan dihapus?",
			  text: "Data akah terhapus secara permanent",
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
					url: url+'member/delete/'+id,
					type: 'GET',
					dataType: 'html',
					success: function(){
							swal({
                                title: "Success!",
                                text:  "You are now following",
                                type: "success",
                                timer: 2500,
                                showConfirmButton: true
                            });
                            window.setTimeout(function(){ 
							    location.reload();
							} ,2500);
					}
				});
			  } else {
			    swal.close();
			  }
			});
		}

		
	</script>
