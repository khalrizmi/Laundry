<div class="container-fluid">
  <form id="form-table-item" method="post">
    <div class="row">
      <div class="col-lg-12"> 
        <div class="panel panel-primary panel-custom">
          <div class="panel-heading">
            <button type="button" class="btn btn-success" onclick="tampilTambah()"><b class='glyphicon glyphicon-plus'></b> Tambah Item</button>      
            <button id='refresh_table_kasir' type='button' class='btn btn-primary pull-right'><b class='glyphicon glyphicon-refresh'></b> Refresh</button>            
            <span class="btn-hapus-pilihan" style="display:none">
              <button id='tombol-konfirmasi-hapus-kasir-pilihan' type="button" class="pull-right btn btn-danger" data-toggle='modal' data-target='#modal-hapus-kasir-pilihan'><b class='glyphicon glyphicon-trash'></b> Hapus item</button>
            </span>                 
          </div>
          <div class="panel-body">            
            <table id="table_item" class="table table-bordered table-hover" cellspacing="0" width="100%">
              <thead>
				<th>Nama</th>
				<th>Tipe</th>
				<th>Harga Normal</th>
				<th>Diskon Promo</th>
				<th>Hemat Member</th>
				<th>Opsi</th>
              </thead> 
              <tbody>
				<?php 
					foreach($data as $row):
				?>
				<tr>
					<td><?= $row->nama_item ?></td>
					<td><?php if($row->tipe_item == 1) echo "<label class='label label-info'>Coin</label>";
							  else 					   echo "<label class='label label-danger'>Satuan</label>";
					?></td>
					<td><?= $row->harga_normal ?></td>
					<td><?= $row->diskon_promo ?></td>
					<td><?= $row->hemat_member ?></td>
					<td>
						<button type="button" class="btn btn-primary" onclick="tampilEdit('<?php echo $row->id_item ?>')"><b class='glyphicon glyphicon-edit'></b> Ubah</button>&nbsp;
						<button type="button" class='btn btn-danger' onclick="konfirmasi('<?php echo $row->id_item ?>')"><b class='glyphicon glyphicon-trash'></b> Hapus</button>
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

<div id="modal-tambah-item" class="modal" tabindex="-1">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><b class='glyphicon glyphicon-info-sign'></b> Tambah Item</h4>
      </div>
      <div class="modal-body">
          <form method="post" id="form-tambah-item">
          	<div class="row">
          		<div class="col-md-12 col-sm-12 col-xs-12">
          			<div class="form-group">
          				<label>Nama</label>
                  		<input type="text" name="nama" class="form-control" placeholder="Nama" id="f1">
          			</div>
          		</div>
              <div class='col-md-6 col-sm-6 col-xs-6'>
                <div class="form-group">
                  <label>Harga Normal</label>
                  <input onkeyup="return numberonly(this)" placeholder='Harga Normal' class="form-control required" type="text" name="har_nom" id="f2">
                </div> 
                <div class="form-group">
                  <label>Diskon Promo</label>
                  <input onkeyup="return numberonly(this)" placeholder='Diskon Promo' class="form-control required" type="text" name="dis_prom" id="f3">
                </div>          
              </div>
              <div class='col-md-6 col-sm-6 col-xs-6'>
                <div class="form-group">
                  <label>Hemat Member</label>
                  <input onkeyup="return numberonly(this)" placeholder='Hemat Member' class="form-control required" type="text" name="hem_mem" id="f4">
                </div>  
                <div class="form-group form-radio">
                  <label>Tipe Item</label><br/>
                  <label><input type="radio" id="f5a" name="tipe_item" value='1' checked>Coin</label> &nbsp;&nbsp;
                  <label><input type="radio" id="f5b" name="tipe_item" value='2'>Satuan</label>
                </div>                          
              </div>            
            </div>        
          </form>         
      </div>
      <div class="modal-footer">
        <div class='modal-btn'>
          <button type="submit" class="btn btn-primary" id='btn-tambah-item'>
            <b class='glyphicon glyphicon-save'></b>
            Simpan
          </button>
          <button type="submit" class="btn btn-primary" id='btn-edit-item'>
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
			$('#table_item').DataTable();
		} );

		//refreshtable
		$("#refresh_table_kasir").click(function(){
			window.location.href=url+'item';
		})

		function validation(){
			if($("#f1").val()=="") $("#f1").focus();
			else if($("#f2").val()=="") $("#f2").focus();
			else if($("#f3").val()=="") $("#f3").focus();
			else if($("#f4").val()=="") $("#f4").focus();
			else return true;
		}

		function tampilTambah(){
			$("#btn-tambah-item").show();
			$("#btn-edit-item").hide();
			$("#modal-tambah-item").modal('show');
			$('#f1').val('');
			$('#f2').val('');
			$('#f3').val('');
			$('#f4').val('');
		}
		function tampilEdit(id){
			$("#btn-tambah-item").hide();
			$("#btn-edit-item").show();
			$("#modal-tambah-item").modal('show');
			edit_id = id;
			$.ajax({
				url: url+'item/edit/'+id,
				type: 'get',
				dataType: 'json',
				success: function(data){
					$('#f1').val(data.nama_item);
					$('#f2').val(data.harga_normal);
					$('#f3').val(data.diskon_promo);
					$('#f4').val(data.hemat_member);
					if(data.tipe_item == "1") $('#f5a').prop('checked', true);
					else                      $("#f5b").prop('checked', true);
				}
			})
		}

		// Tambah
		$(document).on('click','#btn-tambah-item',function(){
			if (validation()==true){
				var btn = $(this);
     		 	btn.prop('disabled',true);
				$.ajax({
					url: url+'item/input',
					type: 'post',
					data: $("#form-tambah-item").serialize(),
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
		$(document).on('click','#btn-edit-item',function(){
			if (validation()==true){
				var btn = $(this);
     		 	btn.prop('disabled',true);
				$.ajax({
					url: url+'item/update/'+edit_id,
					type: 'post',
					data: $("#form-tambah-item").serialize(),
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
					url: url+'item/delete/'+id,
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
