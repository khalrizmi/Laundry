<div class="container-fluid">
			  <form id="form-table-kasir">
			    <div class="row">
			      <div class="col-lg-12"> 
			        <div class="panel panel-primary panel-custom">
			          <div class="panel-heading">
			            <button id='tombol-modal-tambah-kasir' type="button" class="btn btn-success" data-toggle='modal' data-target='#modal-tambah-kasir'><b class='glyphicon glyphicon-plus'></b> Tambah Kasir</button>      
			            <button id='refresh_table_kasir' type='button' class='btn btn-primary pull-right'><b class='glyphicon glyphicon-refresh'></b> Refresh</button>            
			            <span class="btn-hapus-pilihan" style="display:none">
			              <button id='tombol-konfirmasi-hapus-kasir-pilihan' type="button" class="pull-right btn btn-danger" data-toggle='modal' data-target='#modal-hapus-kasir-pilihan'><b class='glyphicon glyphicon-trash'></b> Hapus Kasir</button>
			            </span>                 
			          </div>
			          <div class="panel-body">            
			            <table id="table_kasir" class="table table-bordered table-hover" cellspacing="0" width="100%">
			              <thead>
			                <th><input name="select_all" value="1" type="checkbox"></th>
			                <th>id_kasir</th>
			                <th>nama</th>
			                <th>alamat</th>
			                <th>telepon</th>                 
			                <th>status</th>
			                <th>Akses</th>
			                <th>opsi</th>
			              </thead>       
			            </table>
			          </div>
			        </div>                                 
			      </div>
			    </div>
			  </form>    
			</div>    

			<div id="modal-tambah-kasir" class="modal" tabindex="-1">
			  <div class="modal-dialog modal-lg">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title"><b class='glyphicon glyphicon-info-sign'></b> Tambah Kasir</h4>
			      </div>
			      <div class="modal-body">
			        <div class="respon">
			          <div class="form-group form-input">
			            <label>Jumlah Form Kasir</label><br/>
			            <input onkeyup="return numberonly(this)" id="input-tambah-form-kasir" placeholder='isi Untuk Memunculkan Form Kasir' class="form-control" type="text">
			          </div>
			          <form id="form-tambah-kasir" class="row">       
			          </form> 
			        </div>
			      </div>
			      <div class="modal-footer">
			        <div class="pull-left">
			          <div class="notif-modal"></div>               
			          <img class='ajax-loader'>     
			        </div>      
			        <div class='modal-btn-first'>
			          <button type="submit" class="btn btn-primary" id='tombol-tambah-form-kasir'>
			            <b class='glyphicon glyphicon-plus'></b>
			            Buat
			          </button>
			          <button type="button" class="btn btn-danger" data-dismiss="modal">
			            <b class='glyphicon glyphicon-remove'></b>
			            Batal
			          </button>
			        </div>
			        <div class='modal-btn-2nd' style="display:none">
			          <button type="submit" class="btn btn-primary" id='tombol-tambah-kasir'>
			            <b class='glyphicon glyphicon-plus'></b>
			            Tambah
			          </button>
			          <button type="submit" class="btn btn-danger" id='tombol-ulangi-tambah-form-kasir'>
			            <b class='glyphicon glyphicon-repeat'></b>
			            Buat Ulang
			          </button>                  
			        </div>
			      </div>
			    </div>
			  </div>
			</div>

			<div id="modal-ubah-kasir" class="modal" tabindex="-1">
			  <div class="modal-dialog modal-md">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title"><b class='glyphicon glyphicon-info-sign'></b> Ubah Kasir</h4>
			      </div>
			      <div class="modal-body">
			        <div class="respon">
			          <form id="form-ubah-kasir">
			            <div class='row'>
			              <div class='col-md-6 col-sm-6 col-xs-6'>
			                <input type="hidden" id="val-id-ubah" name='id'>
			                <div class="form-group">
			                  <label>Nama</label>
			                  <input id='nama_kasir' placeholder='Nama' class="form-control required" type="text" name="nama_kasir">
			                </div>
			                <div class="form-group">
			                  <label>Alamat</label>
			                  <textarea rows="4" id="alamat_kasir" name="alamat_kasir" placeholder="Alamat" class="form-control required"></textarea>
			                </div>            
			                <div class="form-group">
			                  <label>Telepon</label>
			                  <input onkeyup="return numberonly(this)" id='telepon_kasir' placeholder='Telepon' class="form-control required" type="text" name="telepon_kasir">
			                </div>           
			              </div>
			              <div class='col-md-6 col-sm-6 col-xs-6'>
			                <div class="form-group">
			                  <label>Username</label>
			                  <input id='username_kasir' placeholder='Username' class="form-control required" type="text" name="username_kasir">
			                  <input id='username_kasir_hidden' placeholder='Username' class="form-control required" type="hidden" name="username_kasir_hidden">                  
			                </div>
			                <div class="form-group">
			                  <label>Password</label>
			                  <input id='password_kasir' placeholder='Kosongkan Jika Tidak Diubah' class="form-control" type="text" name="password_kasir">
			                </div>
			                <div class="form-group form-radio">
			                  <label>Status</label><br/>
			                  <label><input id="status_kasir_e" type="radio" name="status_kasir" value='aktif'>Aktif</label> &nbsp;&nbsp;
			                  <label><input id="status_kasir_d" type="radio" name="status_kasir" value='diblokir'>Blokir</label>
			                </div>      
			                <div class="form-group" id="pilih-akses">
			                  <label>Hak Akses</label>
			                  <select name="akses_kasir[]" class="form-control required selectpicker" data-title="Pilih Hak Akses">
			                    <option value="full">Full Access</option>
			                    <option value="buku,distributor,pasok">Pasok</option>
			                    <option value="buku,penjualan">Kasir</option>
			                  </select>
			                </div>                           
			              </div>            
			            </div>        
			          </form>         
			        </div>
			      </div>
			      <div class="modal-footer">
			        <div class="pull-left">
			          <div class="notif-modal"></div>               
			          <img class='ajax-loader'>                         
			        </div>      
			        <div class='modal-btn'>
			          <button type="submit" class="btn btn-primary" id='tombol-ubah-kasir'>
			            <b class='glyphicon glyphicon-save'></b>
			            Simpan
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

			<div id="modal-hapus-kasir" class="modal" tabindex="-1">
			  <div class="modal-dialog modal-md">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title"><b class='glyphicon glyphicon-info-sign'></b> Konfirmasi Penghapusan Data</h4>
			      </div>
			      <div class="modal-body">
			        <div class="respon">
			          Anda Akan Menghapus Data ?     
			          <input type="hidden" id="val-id-hapus">
			        </div>
			      </div>
			      <div class="modal-footer">
			        <div class="pull-left">
			          <div class="notif-modal"></div>
			          <img class='ajax-loader'>     
			        </div>      
			        <div class='modal-btn'>
			          <button type="submit" class="btn btn-primary" id='tombol-hapus-kasir'>
			            <b class='glyphicon glyphicon-trash'></b>
			            Ya
			          </button>
			          <button type="button" class="btn btn-danger" data-dismiss="modal">
			            <b class='glyphicon glyphicon-remove'></b>
			            Tidak            
			          </button>
			        </div>
			      </div>    
			    </div>
			  </div>
			</div>

			<div id="modal-hapus-kasir-pilihan" class="modal" tabindex="-1">
			  <div class="modal-dialog modal-md">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title"><b class='glyphicon glyphicon-info-sign'></b> Konfirmasi Penghapusan Data Pilihan</h4>
			      </div>
			      <div class="modal-body">
			        <div class="respon">
			          Anda Akan Menghapus Data ?         
			          <input type="hidden" id="val-id-hapus">
			        </div>
			      </div>
			      <div class="modal-footer">
			        <div class="pull-left">
			          <div class="notif-modal"></div>
			          <img class='ajax-loader'>     
			        </div>      
			        <div class='modal-btn'>
			          <button type="submit" class="btn btn-primary" id='tombol-hapus-kasir-pilihan'>
			            <b class='glyphicon glyphicon-trash'></b>
			            Ya
			          </button>
			          <button type="button" class="btn btn-danger" data-dismiss="modal">
			            <b class='glyphicon glyphicon-remove'></b>
			            Tidak            
			          </button>
			        </div>
			      </div>    
			    </div>
			  </div>
</div>  
