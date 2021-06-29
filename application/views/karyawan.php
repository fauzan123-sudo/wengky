<?php 

$this->load->view('layout/header');
$data['data_link'] = $active_link;
$this->load->view('layout/menu',$data);

$this->load->view('layout/header_content');

?>
<div class="container-fluid mb-4">
	<?php $data['bc'] = $breadcump; $this->load->view('layout/breadcump',$data); ?>
	<div class="row shadow-tin bg-white mt-1 mx-2 rounded overflow-hidden">
		<div class="col p-0">
			<div class="row ">
				<div class="col">
					
					<a id="print_data" href="<?= base_url() ?>index.php/admin/print_karyawan" target="_blank" class="btn-primary btn rounded-0 float-right"><i class="fa fa-print"></i> Report</a>
					<button id="tambah_data" type="button" class="btn-danger btn rounded-0 float-right" data-target="#tambah_karyawan" data-toggle="modal"><i class="fa fa-plus"></i> Tambah</button>
					<button id="update_qr" type="button" class="btn-warning btn rounded-0 float-right"><i class="fa fa-qrcode"></i> Update QR Code</button>
				</div>
			</div>
			<div class="row m-2">
				<div class="col p-4">
					
						<table class="table w-100" id="datatable">
							
							<thead class=" text-blue " >
								<tr>
									<th>No</th>
									<th>Action</th>
									<th>NIP</th>
									<th>Nama</th>
									<!-- <th>Tempat Lahir</th> -->
									<th>Tanggal Lahir</th>
									<!-- <th>Alamat</th> -->
									<th>Email</th>
									<th>Telepon	</th>
									<th>Jabatan</th>
									
								<!-- 	<th>Username</th>
									<th>Foto</th>
									<th>QR CODE</th> -->
									
								</tr>
							</thead>
							<tbody id="table_karyawan">
								
							</tbody>
							
						</table>
				
				</div>
			</div>
			
		</div>
	</div>




</div>
<div id="tambah_karyawan" class="modal fade bg-transparent" tabindex="-1" >
	<div class="modal-dialog">
		<div class="modal-content bg-blue-2">
			<div class="modal-header font-weight-bold text-white">
				
				<h6 class="modal-title font-weight-bold"><i class="far fa-plus-square"></i> Tambah Karyawan</h6>
        		<button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
         		 <span aria-hidden="true">&times;</span>
         		</button>
			</div>
			<div class="modal-body bg-white">
				<form id="data_create" >

					<div class="row">
						<div class="col">
							<div class="form-group">
							    <label for="in_username">Username</label>
							    <input type="text" class="form-control" name="in_username" required>
							  </div>
							  <div class="form-group">
							    <label for="in_nama">Nama</label>
							    <input type="text" class="form-control" name="in_nama" required>
							  </div>
							  <div class="form-group">
							    <label for="in_tempat">Tempat</label>
							    <input type="text" class="form-control" name="in_tempat" required>
							  </div>
							   <div class="form-group">
							    <label for="in_tgl_lhr">Tanggal Lahir</label>
							    <input type="date" class="form-control" name="in_tgl_lhr" required>
							  </div>
							  <div class="form-group">
							    <label for="in_tlp">Telepon</label>
							    <input type="text" class="form-control" name="in_tlp" required>
							  </div>
							  <div class="form-group">
							    <label for="in_jabatan">Jabatan</label>
							    <select class="custom-select" name="jabatan">
							    	<option selected="" disabled>Pilih Jabatan</option>
							    	<?php foreach ($jabatan as $key => $value): ?>
							    		<option value="<?= $value->nama ?>"><?= $value->nama ?></option>
							    	<?php endforeach;?>
							    </select>
							  </div>
						</div>
						<div class="col">
							<div class="form-group">
							    <label for="in_email">Email</label>
							    <input type="email" class="form-control" name="in_email" required>
							  </div>
							   <div class="form-group">
							    <label for="in_nip">NIP</label>
							    <input type="text" class="form-control" name="in_nip" id="in_nip" required>
							  </div>
							   <div class="form-group">
							    <label for="in_alamat">Alamat</label>
							    <textarea class="form-control" name="in_alamat" required></textarea>
							  </div>
							  <div class="alert alert-danger alert-foto-in d-none">Ukuran file tidak boleh lebih dari 1024kb</div>
							  <div class="custom-file ">	
							  	
							    <input type="file" class="custom-file-input upload_foto " id="1" name="in_foto" required>
							    <label class="custom-file-label" for="validatedCustomFile">Pilih Foto ...... </label>
							  </div>
							  <img id="view_image1" class="w-100 mt-2 img-thumbnail" style="display: none;"> 
						</div>
					</div>
					


					  
				
			</div>
			<div class="modal-footer">
				<button class="btn btn-success" type="submit" id="simpan-data">Simpan</button>
				<button class="btn btn-transparent text-white" data-dismiss="modal">Batal</button>
			</div>
			</form>
		</div>
	</div>
</div>
<div id="update_karyawan" class="modal fade bg-transparent" tabindex="-2" >
	<div class="modal-dialog">
		<div class="modal-content bg-blue-2">
			<div class="modal-header  font-weight-bold text-white">
				<h6 class="modal-title font-weight-bold"><i class="far fa-edit"></i> Edit Karyawan</h6>
        		<button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
         		 <span aria-hidden="true">&times;</span>
         		</button>
			</div>
			<div class="modal-body bg-white">
				<form id="data_update">
					<div class="row">
						<div class="col">
							<div class="form-group">
							    <label for="up_username">Username</label>
							    <input type="text" class="form-control" name="up_username" id="up_username" >
							  </div>
							  <div class="form-group">
							    <label for="up_nama">Nama</label>
							    <input type="text" class="form-control" name="up_nama" id="up_nama">
							  </div>
							  <div class="form-group">
							    <label for="up_tempat">Tempat</label>
							    <input type="text" class="form-control" name="up_tempat" id="up_tempat">
							  </div>
							   <div class="form-group">
							    <label for="up_tgl_lhr">Tanggal Lahir</label>
							    <input type="date" class="form-control" name="up_tgl_lhr" id="up_tgl_lhr">
							  </div>
							  <div class="form-group">
							    <label for="up_tlp">Telepon</label>
							    <input type="text" class="form-control" name="up_tlp" id="up_tlp">
							  </div>
							  <div class="form-group">
							    <label for="up_jabatan">Jabatan</label>
							    <select class="custom-select" name="up_jabatan">
							    	<option disabled>Pilih Jabatan</option>
							    	
							    </select>
							  </div>
						</div>
						<div class="col">
							
							  <div class="form-group">
							    <label for="up_email">Email</label>
							    <input type="email" class="form-control" name="up_email" id="up_email">
							  </div>
							   <div class="form-group">
							    <label for="up_nip">NIP</label>
							    <input type="text" class="form-control" name="up_nip" id="up_nip">
							  </div>
							   <div class="form-group">
							    <label for="up_alamat">Alamat</label>
							    <textarea class="form-control" name="up_alamat" id="up_alamat"></textarea>
							  </div>
							  <div class="alert alert-danger alert-foto-up d-none">Ukuran file tidak boleh lebih dari 1024kb</div>
							  <div class="custom-file">

							    <input type="file" class="custom-file-input upload_foto" id="2" name="up_foto" >
							    <label class="custom-file-label" for="validatedCustomFile">Pilih Foto ...... </label>
							  </div>
							  <img id="view_image2" class="w-100 mt-2 img-thumbnail"> 
						</div>
					</div>
					
					  
				
			</div>
			<div class="modal-footer">
				<button class="btn btn-success" type="submit" id="simpan-update">Simpan</button>
				<button class="btn btn-transparent text-white" data-dismiss="modal">Batal</button>
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
var id_karyawan;
	ambil_data() ;
		function ambil_data() {


			var i;
			$.ajax({
				type : "ajax",
				async : false,
				dataType : "json",
				url : "<?= base_url() ?>index.php/admin/jml_karyawan",
				success : function (data) {
					console.log(data);
					var data_fix_nip = data + 1;
					var nip_fix;
					var nip = data_fix_nip.toString();
					if (nip.length==1) {
							nip_fix = "0000"+nip;
						}else if (nip.length==2) {
							nip_fix = "000"+nip;
						}else if (nip.length==3) {
							nip_fix = "00"+nip;
						}else if (nip.length==4) {
							nip_fix = "0"+nip;
						}
					$('#in_nip').val(nip_fix);
				}
			});

			$('#datatable').DataTable({
				"scrollX":true,
				"processing": true, //Feature control the processing indicator.
	            "serverSide": true,
	            "hover" : true,
	            "language": {
            		processing: ''},
	          	"order" :[],
				"ajax" :{
					 url: "<?= base_url() ?>index.php/admin/read_pegawai",
	       			 type:"post"
				},
				"columnDefs":[
					{
						"targets" : [0,3,-2,-1],
						"orderable" : false
					},
				],
			
			});
		}
		
		
		$(document).on('submit','#data_create',function (e) {
			e.preventDefault();
			var formData = new FormData(this);

			$.ajax({
					type : 'post',
					
					url : '<?= base_url() ?>index.php/admin/idata_karyawan',
					data : new FormData(this),
					processData : false,
					contentType : false,
					cache : false,
					async : false,
					success : function (data) {
						Swal.fire(
						  'Data Karyawan',
						  'Berhasil Tersimpan',
						  'success'
						);
						
						$('#tambah_karyawan').modal('hide');
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

		$(document).on('submit','#data_update',function (e) {
			e.preventDefault();

			var formData = new FormData(this);

			$.ajax({
					type : 'post',
					
					url : '<?= base_url() ?>index.php/admin/up_karyawan/'+id_karyawan,
					data : new FormData(this),
					processData : false,
					contentType : false,
					cache : false,
					async : false,
					success : function (data) {
						console.log(data);
						Swal.fire(
						  'Data Karyawan',
						  'Berhasil Tersimpan',
						  'success'
						);
						
						$('#update_karyawan').modal('hide');
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

		$(document).on('click','.edit',function () {
			var id = $(this).attr('id');
			var htmlOpt = "";
			// console.log("cek jabatan ",getJabatan());
			$.ajax({
				type : 'ajax',
				dataType : 'JSON',
				url : '<?= base_url() ?>index.php/admin/data_karyawan_by/'+id,
				success : function (data) {
					console.log(data);
					id_karyawan = data[0].nip;
			
					
					$('#up_username').val(data[0].username);
					$('#up_nama').val(data[0].nama);
					$('#up_tempat').val(data[0].tempat_lahir);
					$('#up_tgl_lhr').val(data[0].tgl_lahir);
					$('#up_tlp').val(data[0].no_tlp);
					
					$.ajax({
						url: '<?= base_url() ?>departement/getData',
						type: 'POST',
						dataType: 'JSON',
					})
					.done(function(jabatan) {
						for (var i = 0; i < jabatan.length; i++) {
							if (jabatan[i].nama == data[0].jabatan) {
								htmlOpt += "<option selected value='"+jabatan[i].nama+"'>"+jabatan[i].nama+"</option>";
							}else{
								htmlOpt += "<option value='"+jabatan[i].nama+"'>"+jabatan[i].nama+"</option>";
							}
							
						}
						$('select[name="up_jabatan"]').append(htmlOpt);
					});

					

					// $('#up_jabatan').val(data[0].jabatan);

					

					$('#up_email').val(data[0].email);
					$('#up_nip').val(data[0].nip);
					$('#up_alamat').val(data[0].alamat);
					$('#view_image2').attr('src','<?= base_url() ?>upload/image/pegawai/'+data[0].image);
					$('#update_karyawan').modal('show');
				}
			})
			
		});
		// function getJabatan() {
		// 	var result = [];
		// 	$.ajax({
		// 		url: '<?= base_url() ?>departement/getData',
		// 		type: 'POST',
		// 		dataType: 'JSON',
		// 	})
		// 	.done(function(data) {
		// 		result = data;
		// 	});
			
		// 	return result;
		// }
		
	
		//action delete
		$(document).on('click','.delete-data',function () {
			var id = $(this).attr('id');



			Swal.fire({
			  title: 'Apakah Kamu yakin hapus Data ini?',
			  icon: 'warning',
			  showCancelButton: true,
			  confirmButtonColor: '#3085d6',
			  cancelButtonColor: '#d33',
			  confirmButtonText: 'Ya, Hapus ini!'
			}).then((result) => {
			  if (result.isConfirmed) {
			   		$.ajax({
						type : 'ajax',
						url : '<?= base_url() ?>index.php/admin/delete_karyawan/'+id,
						dataType : 'JSON',
						
						success : function () {
							Swal.fire(
								'Data Karyawan',
								'Berhasil Terhapus',
								'success'
								);


							$('#datatable').DataTable().destroy();
							ambil_data();
						

							},
						error: function (xhr, ajaxOptions, thrownError) { // Ketika terjadi error
							Swal.fire(
								'Data Karyawan',
								'Gagal Terhapus',
								'error'
								);
							}

					});
			  	}
			});


			
		});
		
		//priview gambar
		function readURL(input,status) {
			
			if (input.files && input.files[0]) {
				var reader = new FileReader();
					reader.onload = function (e) {
						if (e != "") {
							$('#view_image'+status).show();
							$('#view_image'+status).attr('src',e.target.result);
						}else{
							$('#view_image'+status).show();
						}
						
					}
					reader.readAsDataURL(input.files[0]);
			}
			
		}
		$('.upload_foto').change(function () {
			var status = $(this).attr('id');
			var file = $(this);
			var files_obj = file[0].files;
			var ukuran_file = files_obj[0].size;

			if (status == 1) {
				if (ukuran_file > 1024000) {
				 	$('.alert-foto-in').removeClass('d-none');
				 	$('.alert-foto-in').addClass('d-block');
				 }else{
				 	$('.alert-foto-in').addClass('d-none');
				 	$('.alert-foto-in').removeClass('d-block');

				 }
			}else if(status == 2){
					if (ukuran_file > 1024000) {
				 	$('.alert-foto-up').removeClass('d-none');
				 	$('.alert-foto-up').addClass('d-block');
				 }else{
				 	$('.alert-foto-up').addClass('d-none');
				 	$('.alert-foto-up').removeClass('d-block');

				 }
			}
		
			readURL(this,status);
		});

		
		
	});
	
	
	
	

</script>