<div class="container-fluid">
  <form id="form-table-satuan" method="post">
    <div class="row">
      <div class="col-lg-12"> 
        <div class="panel panel-primary panel-custom">
          <div class="panel-heading">
            <button type="button" class="btn btn-danger" onclick="tampilTambah()"><b class='glyphicon glyphicon-print'></b> PDF</button>
            <button type="button" class="btn btn-success" onclick="tampilTambah()"><b class='glyphicon glyphicon-print'></b> EXCEL</button>      
            <button id='refresh_table_satuan' type='button' class='btn btn-primary pull-right'><b class='glyphicon glyphicon-refresh'></b> Refresh</button>            
            <span class="btn-hapus-pilihan" style="display:none">
              <button id='tombol-konfirmasi-hapus-kasir-pilihan' type="button" class="pull-right btn btn-danger" data-toggle='modal' data-target='#modal-hapus-kasir-pilihan'><b class='glyphicon glyphicon-trash'></b> Hapus Kasir</button>
            </span>                 
          </div>
          <div class="panel-body">            
            <table id="table_satuan" class="table table-bordered table-hover" cellspacing="0" width="100%">
              <thead>
                <th>No Bon</th>
			 	<th>Operator</th>
			 	<th>Nama</th>
				<th>No Telepon</th>
				<th>Total Bon</th>
				<th>Opsi</th>
              </thead> 
              <tbody>
				<?php 
					foreach($tampil as $row):
				?>
				<tr>
					<td><?= $row->no_bon ?></td>
					<td><?= $row->operator ?></td>
					<td><?= $row->nama ?></td>
					<td><?= $row->no_hp ?></td>
					<td><?= $row->total_bon ?></td>
					<td>
						<button type="button" class="btn btn-primary" onclick="cetakPerson('<?php echo $row->no_bon ?>')"><b class='glyphicon glyphicon-print'></b> Cetak</button>&nbsp;
						<button disabled type="button" class='btn btn-danger' onclick="konfirmasi('<?php echo $row->no_bon ?>')"><b class='glyphicon glyphicon-trash'></b> Hapus</button>
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
	        			<strong>Nomor Bon :</strong><br>
	    					<div id="m_nobon"></div>
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
	    				<div id="last"></div>
	    			</div>
	    		</div>
	    	</div>
	    </div>  
      </div>
      <div class="modal-footer">
        <div class='modal-btn'>
          <a href="#" onclick="print_click()" class="btn btn-primary"><b class="glyphicon glyphicon-print"></b> Print</a>
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
		var user_id;

		$(document).ready(function() {
			$('#table_satuan').DataTable();
		} );

		//refreshtable
		$("#refresh_table_satuan").click(function(){
			window.location.href=url+'tampil_order/satuan';
		})


		function cetakPerson(id){
			$("#modal-cetak-person").modal('show');
			$("#tabel_latihan").remove();
			user_id = id;
			$.ajax({
				url: url+'tampil_order/print_person_satuan/'+id,
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
				url: url+'tampil_order/data_person_satuan/'+id,
				type: 'get',
				dataType: 'json',
				success: function(data){
					$("#m_nobon").html(id);
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
			return ribuan;
		}
		
		// Print Person
		function print_click(){
			window.open(url+'tampil_order/struck/'+user_id, '_blank');
		}

		
	</script>
