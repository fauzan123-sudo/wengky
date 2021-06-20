<?php 

$this->load->view('layout/header');
$data['data_link'] = $active_link;
$this->load->view('layout/menu',$data);
$this->load->view('layout/header_content');

?>
<div class="container-fluid mb-4">
	<div class="row  bg-white mt-3 rounded overflow-hidden shadow-tin">
		<div class="col p-0">
			<div class="row ">
				<div class="col">
					<?php $data['bc'] = $breadcump; $this->load->view('layout/breadcump',$data); ?>
					<a id="print_data" href="<?= base_url() ?>index.php/admin/print_gaji" target="_blank" class="btn-primary btn rounded-0 float-right"><i class="fa fa-print"></i> Report</a>
					<button id="tambah_data" type="button" class="btn-danger btn rounded-0 float-right" data-target="#tambah_gaji" data-toggle="modal"><i class="fa fa-plus"></i> Tambah</button>
					
				</div>
			</div>
			<div class="row m-2">
				<div class="col p-4">
					
						<table class="table table-striped w-100 pl" style="width:100%;" id="datatable">
							
							<thead class="bg-blue-1 text-white ">
								<tr>
									<th>No</th>
									<th>Action</th>
									<th>Nama</th>
									<th>NIP</th>
									<th>Gaji Pokok</th>
									<th>Asuransi</th>
									<th>Potongan</th>
									
								</tr>
							</thead>
							<tbody id="table_gaji">
								
							</tbody>
							
						</table>
				
				</div>
			</div>
			
		</div>
	</div>




</div>
<div id="tambah_gaji" class="modal fade bg-transparent" tabindex="-1" >
	<div class="modal-dialog">
		<div class="modal-content bg-blue-2">
			<div class="modal-header border-bottom-danger  font-weight-bold text-white">
				
				<h5 class="modal-title font-weight-bold"><i class="far fa-plus-square"></i> Tambah Gaji</h5>
        		<button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
         		 <span aria-hidden="true">&times;</span>
         		</button>
			</div>
			<form id="idata_gaji" >
			<div class="modal-body bg-white">
					<div class="form-group">
				    <label for="in_karyawan">Nama Pegawai</label>
				   
				    <select class="custom-select" name="in_karyawan" required>
				    	<option selected disabled>Pilih Karyawan</option>
				    	<?php 
				    		$data = $this->m_data->read_data('pegawai')->result();
				    		foreach ($data as $key ) { ?>

				    		<option value="<?= $key->id_pegawai ?>"><?= $key->nama ?></option>
				    	<?php } ?>
				    	
				    </select>
				  </div>
				 
				  <div class="form-group">
				    <label for="in_gaji">Gaji Pokok</label>
				     <div class="input-group mb-3">
					  <div class="input-group-prepend">
					    <span class="input-group-text" id="basic-addon1">RP.</span>
					  </div>
					  <input type="number" class="form-control" name="in_gaji" required>
					</div>
				  </div>
				  <div class="form-group">
				    <label for="in_asuransi">Asuransi</label>
				    <div class="input-group mb-3">
					  <div class="input-group-prepend">
					    <span class="input-group-text" id="basic-addon1">RP.</span>
					  </div>
					  <input type="number" class="form-control" name="in_asuransi" required>
					</div>
				  </div>
				   <div class="form-group">
				    <label for="in_potongan">Potongan</label>
				    <div class="input-group mb-3">
					  <div class="input-group-prepend">
					    <span class="input-group-text" id="basic-addon1">RP.</span>
					  </div>
					  <select class="custom-select" name="in_potongan" required>
				    	<option selected disabled>Pilih Potongan</option>
				    	<?php 
				    		$data = $this->m_data->read_data('potongan')->result();
				    		foreach ($data as $key ) { ?>

				    		<option value="<?= $key->potongan ?>"><?= $key->potong_gaji ?></option>
				    	<?php } ?>
				    	
				    </select>

					</div>
				  </div>
				
			</div>
			<div class="modal-footer">
				<button class="btn btn-success" type="submit" id="simpan-data">Simpan</button>
				<button class="btn btn-transparent text-white" type="button" data-dismiss="modal">Batal</button>
			</div>
			</form>
		</div>
	</div>
</div>

<div id="update_gaji" class="modal fade bg-transparent" tabindex="-1" >
	<div class="modal-dialog">
		<div class="modal-content bg-blue-2">
			<div class="modal-header border-bottom-danger  font-weight-bold text-white">
				
				<h5 class="modal-title font-weight-bold"><i class="far fa-edit"></i> Edit Gaji</h5>
        		<button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
         		 <span aria-hidden="true">&times;</span>
         		</button>
			</div>
			<form id="updata_gaji" >
			<div class="modal-body bg-white">
					<div class="form-group">
				    <label for="up_karyawan">Nama Pegawai</label>
				   
				    <select class="custom-select" name="up_karyawan" required>
				    	<option selected disabled>Pilih Karyawan</option>
				    	<?php 
				    		$data = $this->m_data->read_data('pegawai')->result();
				    		$no = 1;
				    		foreach ($data as $key ) { ?>

				    		<option class="nama_karyawan<?= $no ?>" value="<?= $key->id_pegawai ?>"><?= $key->nama ?></option>
				    	<?php $no++; } ?>
				    	
				    </select>
				  </div>
				 
				  <div class="form-group">
				    <label for="up_gaji">Gaji Pokok</label>
				     <div class="input-group mb-3">
					  <div class="input-group-prepend">
					    <span class="input-group-text" id="basic-addon1">RP.</span>
					  </div>
					  <input type="number" class="form-control" name="up_gaji" id="up_gaji" required>
					</div>
				  </div>
				  <div class="form-group">
				    <label for="up_asuransi">Asuransi</label>
				    <div class="input-group mb-3">
					  <div class="input-group-prepend">
					    <span class="input-group-text" id="basic-addon1">RP.</span>
					  </div>
					  <input type="number" class="form-control" name="up_asuransi" id="up_asuransi" required>
					</div>
				  </div>
				   <div class="form-group">
				    <label for="up_potongan">Potongan</label>
				    <div class="input-group mb-3">
					  <div class="input-group-prepend">
					    <span class="input-group-text" id="basic-addon1">RP.</span>
					  </div>
					  <select class="custom-select" name="up_potongan" required>
				    	<option selected disabled>Pilih Potongan</option>
				    	<?php 
				    		$data = $this->m_data->read_data('potongan')->result();
				    		$no = 1;
				    		foreach ($data as $key ) { ?>
				    		<!-- potongan (id_potongan) -->
				    		<option class="potongan<?= $no ?>" value="<?= $key->potongan ?>"><?= $key->potong_gaji ?></option>
				    	<?php $no++; } ?>
				    	
				    </select>

					</div>
				  </div>
				
			</div>
			<div class="modal-footer">
				<button class="btn btn-success" type="submit" id="simpan-data">Simpan</button>
				<button class="btn btn-transparent text-white" type="button" data-dismiss="modal">Batal</button>
			</div>
			</form>
		</div>
	</div>
</div>



<?php 

$this->load->view('layout/footer');

?>
<script type="text/javascript">

$(document).ready(function () {
	var id_gaji;
	ambil_data() ;	
		function ambil_data() {



			$('#datatable').DataTable({
				"scrollX":true,
				"processing": true, //Feature control the processing indicator.
	            "serverSide": true,
	            "width" : 100,
	            "language": {
            		processing: '<div style="display: flex; flex-direction: column; justify-content: center; align-items: center; text-align: center;min-height: 100vh; position:fixed; right:0; left:0; top:0; background:rgb(0,0,0, 0.5);height:100vh;"><div style="width:6rem; height:6rem;" class="spinner-border bg-blue text-danger" role="status"></div><label class="text-white">Sedang Memuat data ... </label></div>'},
	          	"order" :[],
				"ajax" :{
					 url: "<?= base_url() ?>index.php/admin/read_gaji",
	       			 type:"post"
				},
				"columnDefs":[
					{
						"targets" : [0,1,3],
						"orderable" : false
					},
				],
			});
		}
		
		
		$('#idata_gaji').submit(function (e) {
			e.preventDefault();
			var formData = new FormData(this);

			$.ajax({
					type : 'post',
					
					url : '<?= base_url() ?>index.php/admin/idata_gaji',
					data : new FormData(this),
					processData : false,
					contentType : false,
					cache : false,
					async : false,
					success : function (data) {
						Swal.fire(
						  'Data gaji',
						  'Berhasil Tersimpan',
						  'success'
						);
						
						$('#tambah_gaji').modal('hide');
						$('#datatable').DataTable().destroy();
						ambil_data() ;
					},
					error: function (xhr, ajaxOptions, thrownError) { // Ketika terjadi error
				        Swal.fire(
						  'Data gaji',
						  'Gagal Tersimpan, Pastikan semua sudah terisi !!',
						  'error'
						);
				    }

				});
		});


		$(document).on('click','.edit',function () {
			var id = $(this).attr('id');
			$.ajax({
				type : 'ajax',
				dataType : 'JSON',
				url : '<?= base_url() ?>index.php/admin/data_gaji_by/'+id,
				success : function (data) {
					console.log(data);
					id_gaji = data[0].id_gaji;
					var status1 = true;
					var status2 = true;
					var no1 = 1;
					var no2 = 1;
					while(status1){
						var id_pegawai_php = $('.nama_karyawan'+no1).val();
						if (id_pegawai_php == data[0].id_pegawai) {
							$('.nama_karyawan'+no1).attr('selected','selected');
							status1 = false;
						}
						no1++;
					}
					while(status2){
						var id_potongan_php = $('.potongan'+no2).val();
						if (id_potongan_php == data[0].potongan) {
							$('.potongan'+no2).attr('selected','selected');
							status2 = false;
						}
						no2++;
					}
					$('#up_asuransi').val(data[0].asuransi);
					$('#up_gaji').val(data[0].gaji_pokok);

					$('#update_gaji').modal('show');
				}
			})
			
		})
		
		$(document).on('submit','#updata_gaji',function (e) {
			e.preventDefault();

			var formData = new FormData(this);

			$.ajax({
					type : 'post',
					
					url : '<?= base_url() ?>index.php/admin/updata_gaji/'+id_gaji,
					data : new FormData(this),
					processData : false,
					contentType : false,
					cache : false,
					async : false,
					success : function (data) {
						console.log(data);
						Swal.fire(
						  'Data Gaji',
						  'Berhasil Tersimpan',
						  'success'
						);
						
						$('#update_gaji').modal('hide');
						$('#datatable').DataTable().destroy();
						ambil_data() ;

					},
					error: function (xhr, ajaxOptions, thrownError) { // Ketika terjadi error
				        Swal.fire(
						  'Data Karyawan',
						  'Gagal Tersimpan, Pastikan semua sudah terisi !!',
						  'error'
						);
				    }

				});
		});
		$(document).on('click','.delete-data',function () {
			var id = $(this).attr('id');
			$.ajax({
				type : 'ajax',
				url : '<?= base_url() ?>index.php/admin/delete_gaji/'+id,
				dataType : 'JSON',
				
				success : function () {
					Swal.fire(
						'Data gaji',
						'Berhasil Terhapus',
						'success'
						);
					$('#datatable').DataTable().destroy();
					ambil_data();
				

					},
				error: function (xhr, ajaxOptions, thrownError) { // Ketika terjadi error
					Swal.fire(
						'Data gaji',
						'Gagal Terhapus',
						'error'
						);
					}

			});
		})
		
	});

		
	

</script>