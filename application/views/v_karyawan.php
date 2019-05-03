<div class="container-fluid">
  <form id="form-table-karyawan" method="post">
    <div class="row">
      <div class="col-lg-12"> 
        <div class="panel panel-primary panel-custom">
          <div class="panel-heading">
            <button type="button" class="btn btn-success" onclick="tampilTambah()"><b class='glyphicon glyphicon-plus'></b> Tambah Karyawan</button>      
            <button id='refresh_table_kasir' type='button' class='btn btn-primary pull-right'><b class='glyphicon glyphicon-refresh'></b> Refresh</button>            
            <span class="btn-hapus-pilihan" style="display:none">
              <button id='tombol-konfirmasi-hapus-kasir-pilihan' type="button" class="pull-right btn btn-danger" data-toggle='modal' data-target='#modal-hapus-kasir-pilihan'><b class='glyphicon glyphicon-trash'></b> Hapus Kasir</button>
            </span>                 
          </div>
          <div class="panel-body">            
            <table id="table_karyawan" class="table table-bordered table-hover" cellspacing="0" width="100%">
              <thead>
                <th>id_Karyawan</th>
				<th>Nama</th>
				<!-- <th>Username</th> -->
				<!-- <th>Password</th> -->
				<th>Alamat</th>
				<th>Telepon</th>
				<th>Status</th>
				<th>Akses</th>
				<!-- <th>Tanggal Buat</th> -->
				<th>Opsi</th>
              </thead> 
              <tbody>
				<?php 
					foreach($data as $row):
				?>
				<tr>
					<td><?= $row->user_id ?></td>
					<td><?= $row->nama ?></td>
					<td><?= $row->alamat ?></td>
					<td><?= $row->telepon ?></td>
					<td>
						<?php if($row->status == 1) echo "<label class='label label-success'>aktif</label>";
								else echo "<label class='label label-danger'>blokir</label>";
						?>
					</td>
					<td>
						<?php if($row->level == "admin") echo "<label class='label label-info'>admin</label>";
								else echo "<label class='label label-danger'>karyawan</label>";
						?>
					</td>
					<!-- <td>
						<a href="#" onclick="edit('<?= $row->user_id ?>')">Edit</a> |
						<a href="#" onclick="hapus('<?= $row->user_id ?>')">Hapus</a>
					</td> -->
					<td>
						<button type="button" class="btn btn-primary" onclick="tampilEdit('<?php echo $row->user_id ?>')"><b class='glyphicon glyphicon-edit'></b> Ubah</button>&nbsp;
						<button type="button" class='btn btn-danger' onclick="konfirmasi('<?php echo $row->user_id ?>')"><b class='glyphicon glyphicon-trash'></b> Hapus</button>
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

<div id="modal-tambah-karyawan" class="modal" tabindex="-1">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><b class='glyphicon glyphicon-info-sign'></b> Tambah Karyawan</h4>
      </div>
      <div class="modal-body">
          <form method="post" id="form-tambah-karyawan">
            <div class='row'>
              <div class='col-md-6 col-sm-6 col-xs-6'>
                <!-- <input type="hidden" id="val-id-ubah" name='id'> -->
                <div class="form-group">
                  <label>Nama</label>
                  <input placeholder='Nama' class="form-control required" type="text" name="nama" id="f1">
                </div>
                <div class="form-group">
                  <label>Alamat</label>
                  <textarea rows="4" id="f2" name="alamat" placeholder="Alamat" class="form-control required"></textarea>
                </div>            
                <div class="form-group">
                  <label>Telepon</label>
                  <input onkeyup="return numberonly(this)" placeholder='Telepon' class="form-control required" type="text" name="telepon" id="f3">
                </div>           
              </div>
              <div class='col-md-6 col-sm-6 col-xs-6'>
                <div class="form-group">
                  <label>Username</label>
                  <input placeholder='Username' class="form-control required" type="text" name="username" id="f4">                 
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <input placeholder="Password" class="form-control required=" type="text" name="password" id="f5">
                </div>
                <div class="form-group form-radio">
                  <label>Status</label><br/>
                  <label><input type="radio" id="f6a" name="status" value='1' checked>Aktif</label> &nbsp;&nbsp;
                  <label><input type="radio" id="f6b" name="status" value='0'>Blokir</label>
                </div>      
                <div class="form-group" id="pilih-akses">
                  <label>Hak Akses</label>
                  <select name="level" class="form-control required selectpicker" id="f7">
                    <option value="">Pilih Hak Akses</option>
                    <option value="admin">Admin</option>
                    <option value="karyawan">Karyawan</option>
                  </select>
                </div>                           
              </div>            
            </div>        
          </form>         
      </div>
      <div class="modal-footer">
        <div class='modal-btn'>
          <button type="submit" class="btn btn-primary" id='btn-tambah-karyawan'>
            <b class='glyphicon glyphicon-save'></b>
            Simpan
          </button>
          <button type="submit" class="btn btn-primary" id='btn-edit-karyawan'>
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
			$('#table_karyawan').DataTable();
		} );

		//refreshtable
		$("#refresh_table_kasir").click(function(){
			window.location.href=url+'karyawan';
		})

		function validation(){
			if($("#f1").val()=="") $("#f1").focus();
			else if($("#f3").val()=="") $("#f3").focus();
			else if($("#f4").val()=="") $("#f4").focus();
			else if($("#f5").val()=="") $("#f5").focus();
			else if($("#f7").val()=="") $("#f7").focus();
			else return true;
		}

		function tampilTambah(){
			$("#btn-tambah-karyawan").show();
			$("#btn-edit-karyawan").hide();
			$("#modal-tambah-karyawan").modal('show');
			$('#f1').val('');
			$('#f2').html('');
			$('#f3').val('');
			$('#f4').val('');
			$('#f5').val('');
		}
		function tampilEdit(id){
			$("#btn-tambah-karyawan").hide();
			$("#btn-edit-karyawan").show();
			$("#modal-tambah-karyawan").modal('show');
			edit_id = id;
			$.ajax({
				url: url+'karyawan/edit/'+id,
				type: 'get',
				dataType: 'json',
				success: function(data){
					$('#f5').val(data.password);
					$('#f1').val(data.nama);
					$('#f2').html(data.alamat);
					$('#f3').val(data.telepon);
					$('#f4').val(data.username);
					if(data.status == 1) $('#f6a').prop('checked', true);
					else                 $('#f6b').prop('checked', true);
					$('#f7').val(data.level);
				}
			})
		}

		// Tambah
		$(document).on('click','#btn-tambah-karyawan',function(){
			if (validation()==true){
				var btn = $(this);
     		 	btn.prop('disabled',true);
				$.ajax({
					url: url+'karyawan/input',
					type: 'post',
					data: $("#form-tambah-karyawan").serialize(),
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
		$(document).on('click','#btn-edit-karyawan',function(){
			if (validation()==true){
				var btn = $(this);
     		 	btn.prop('disabled',true);
				$.ajax({
					url: url+'karyawan/update/'+edit_id,
					type: 'post',
					data: $("#form-tambah-karyawan").serialize(),
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
					url: url+'karyawan/delete/'+id,
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
