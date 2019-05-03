<div class="container-fluid">

    <div class="login-signup">
      <div class="row">

      </div>


      <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="home">
          <div class="">

            <div class="col-sm-offset-3 col-sm-6">
              <article role="login">
              <h3 class="text-center"><i class="fa fa-lock"></i> Buat Data Baru</h3>
                <form class="signup" method="post" id="form-new">
                  <div class="form-group">
                    <input type="text" name="nama" class="form-control" placeholder="Nama" id="nama">
                  </div>
                  <div class="form-group">
                    <input type="text" name="telepon" class="form-control" placeholder="No Telepon" id="telepon" onkeyup="numberonly(this)">
                  </div>
                  <div class="form-group">
                    <input type="text" name="alamat" class="form-control" placeholder="Alamat" id="alamat">
                  </div>
                  <div class="form-group">
                  	<select name="jenis_cuci" class="form-control" id="jenis_cuci">
                  		<option value="">-- Jenis Cuci --</option>
                  		<option value="1">Satuan</option>
                  		<option value="2">Koin</option>
                  	</select>
                  </div>
                  <div class="form-group">
                    <input type="submit" class="btn btn-success hitung btn-block"  value="SUBMIT">
                  </div>
                </form>

                <footer role="signup" class="text-center">
                  <ul>
                    <li>
                      <a href="#">Viva Laundry</a>
                    </li>
                  </ul>
                </footer>

              </article>
            </div>

          </div>
          <!-- end of row -->
        </div>
        <!-- end of home -->

  </div>
  </div>

</div>

<script>
	<?php echo "var url='".base_url()."';"; ?>

	$("#selectMember").change(function(){
		$.ajax({
			url: url+'order/row_member/'+$(this).val(),
			type: 'get',
			dataType: 'json',
			success: function(data){
								$("#nama_member").val(data.nama);
								$("#telepon_member").val(data.telepon);
								$("#alamat_member").val(data.alamat);
			},
			error: function(e){
								$("#nama_member").val('');
								$("#telepon_member").val('');
								$("#alamat_member").val('');
			}
		})
	})

</script>

<script>
	
	$("#form-new").on('submit', function(e){
		e.preventDefault();
			if($("#nama").val() == "") $("#nama").focus();
			else if($("#telepon").val() == "") $("#telepon").focus();
			else if($("#alamat").val() == "") $("#alamat").focus();
			else if($("#jenis_cuci").val() == "") $("#jenis_cuci").focus();
			else {
				$.ajax({
					url: url+'order/input_person/'+$("#jenis_cuci").val(),
					type: 'post',
					data: $(this).serialize(),
					dataType: 'html',
					success: function(pesan){
						$(".hitung").prop('disabled', true);
						if(pesan == "sukses"){
													swal({
                             title: "Success!",
                             text:  "Data telah diinput",
                             type: "success",
                             timer: 1200,
                             showConfirmButton: true
                        });
                        window.setTimeout(function(){ 
													location.reload();
												} ,1200);
												}
						else {
									swal("Oops!", "Silahkan coba beberapa saat lagi!", "error")
									window.setTimeout(function(){
										location.reload();
									}, 1200);
								}
					},
					error: function(pesan){
						alert(pesan);
					}
				})
			}
	})




	// $("#form-member").on('submit', function(e){
	// 	e.preventDefault();
	// 		if($("#selectMember").val() == "") $("#selectMember").focus();
	// 		else if($("#selectCuci").val() == "") $("#selectCuci").focus();
	// 		else {
	// 			$.ajax({
	// 				url: url+'order/input_person/'+$("#selectCuci").val(),
	// 				type: 'post',
	// 				data: $(this).serialize(),
	// 				dataType: 'html',
	// 				success: function(pesan){
	// 					$(".hitung").prop('disabled', true);
	// 					if(pesan == "sukses"){
	// 												swal({
 //                             title: "Success!",
 //                             text:  "Data telah diinput",
 //                             type: "success",
 //                             timer: 1200,
 //                             showConfirmButton: true
 //                        });
 //                        window.setTimeout(function(){ 
	// 												location.reload();
	// 											} ,1200);
	// 											}
	// 					else {
	// 								swal("Oops!", "Silahkan coba beberapa saat lagi!", "error")
	// 								window.setTimeout(function(){
	// 									location.reload();
	// 								}, 1200);
	// 							}
	// 				},
	// 				error: function(pesan){
	// 					alert(pesan);
	// 				}
	// 			})
	// 		}
	// })

</script>
