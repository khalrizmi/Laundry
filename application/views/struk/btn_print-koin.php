<div id="modal-cetak-person" class="modal" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><b class='glyphicon glyphicon-info-sign'></b> Invoice </h4>
      </div>
      <div class="modal-body">
          <div class="row">
	        <div class="col-xs-12">
	    		<div class="row">
	    			<div class="col-xs-6">
	    				<address>
	    				<strong>Laundry :</strong><br>
	    					Ruko Pasar Bersih J-8 &nbsp;
	    					Phone: 08787 4060 950<br>
	    					Sentul City-Bogor &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	    					Email: vivalaundry19@gmail.com
	    				</address>
	    			</div>
	    			<div class="col-xs-6 text-right">
	    				<address>
	        			<strong>Nomor Invoice :</strong><br>
	    					<div id="m_invoice"></div>
	    				</address>
	    			</div>
	    		</div>
	    		<div class="row">
	    			<div class="col-xs-6">
	    				<address>
	    					<strong>Data Pelanggan :</strong><br>
	    					<div id="m_nama"></div><br>
	    					<div id="m_telepon"></div>
	    				</address>
	    			</div>
	    			<div class="col-xs-6 text-right">
	    				<address>
	    					<strong>Order Date :</strong><br>
	    					<div id="m_tgl"></div><br>
	    					<strong>Operator :</strong><br>
	    					<div id="m_operator"></div><br>
	    				</address>
	    			</div>
	    		</div>
	    	</div>
	    </div>
	    
	    <div class="row">
	    	<div class="col-md-12">
	    		<div class="panel panel-default">
	    			<div class="panel-heading">
	    				<h3 class="panel-title"><strong>Order summary</strong></h3>
	    			</div>
	    			<div class="panel-body">
	    				<div class="table-responsive">
	    					<div id="last"></div>
	    				</div>
	    			</div>
	    		</div>
	    	</div>
	    </div>  
      </div>
      <div class="modal-footer">
        <div class='modal-btn'>
          <!-- <button type="submit" class="btn btn-primary" id='btn-print-person'>
            <b class='glyphicon glyphicon-print'></b>
            Print
          </button> -->
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

	function cetakPerson(id){
			$("#modal-cetak-person").modal('show');
			$("#tabel_latihan").remove();
			edit_id = id;
			$.ajax({
				url: url+'tampil_order/print_person_koin/'+id,
				type: 'get',
				dataType: 'html',
				success: function(data){
					var table = "<table class='table table-condensed' id='tabel_latihan'> "+
	    						"<thead>" +
	                                "<tr>" +
	        							"<td><strong>Nama Item</strong></td>" +
	        							"<td class='text-center'><strong>Jumlah</strong></td>" +
	        							"<td class='text-center'><strong>Satuan</strong></td>" +
	        							"<td class='text-center'><strong>Harga</strong></td>" +
	        							"<td class='text-right'><strong>Jumlah</strong></td>" +
	                                "</tr>" +
	    						"</thead>" +
	    						"<tbody>" + data +
	    							"<tr id='last'>" +
		    							"<td class='no-line'></td>" +
		    							"<td class='no-line'></td>" +
		    							"<td class='no-line'></td>" +
		    							"<td class='no-line text-center'><strong>Total</strong></td>" +
		    							"<td class='no-line text-right' id='total_harga'></td>" +
		    						"</tr>" +
	    						"</tbody>" 
	    					"</table>";
					$(table).insertBefore("#last");
				},
				error: function(data){
					alert(data);
				}
			});
			data_person(id);
			
		}
		
		
		function data_person(id){
			$.ajax({
				url: url+'tampil_order/data_person/'+id,
				type: 'get',
				dataType: 'json',
				success: function(data){
					format_angka(data.total_bon);
					$("#m_invoice").html(id);
					$("#m_nama").html(data.nama);
					$("#m_telepon").html(data.no_hp);
					$("#m_tgl").html(data.tgl_masuk);
					$("#m_operator").html(data.operator);
					$("#total_harga").html(format_angka(data.total_bon));
				}
			});
		}

		function format_angka(angka){
			var bilangan = angka;
			var reverse = bilangan.toString().split('').reverse().join(''),
				ribuan  = reverse.match(/\d{1,3}/g);
				ribuan  = ribuan.join('.').split('').reverse().join('');
			if(ribuan)
				return ribuan;
		}

	
</script>
    
