<?php 

$this->load->view('layout/header');
$data['data_link'] = $active_link;
$this->load->view('layout/menu',$data);
$this->load->view('layout/header_content');

?>
<div class="container-fluid">
	<div class="row shadow-tin pl bg-white mt-3 rounded-1 overflow-hidden">
		<div class="col p-0">
			<div class="row ">
				<div class="col">
					<?php $data['bc'] = $breadcump; $this->load->view('layout/breadcump',$data); ?>
					<button id="tambah_data" type="button" class="btn-success btn rounded-0 float-right" data-target="#i_data" data-toggle="modal"><i class="fa fa-plus"></i> Tambah</button>
					<a href="<?= base_url() ?>berita_acara/print_berita" target="_blank" class="btn-primary btn rounded-0 float-right"><i class="fa fa-print"></i> Report</a>
					
				</div>
			</div>
			<div class="row">
				<div class="col m-4">
					<table class="table pl d-block" style="width: 100%"  id="datatable">
						<thead class="bg-blue-1 text-white w-100">
							<tr>
								<th>No</th>
								<th>Opsi</th>
								<th>Title</th>
								<th>Deskripsi</th>
								<th>Gambar</th>
							</tr>
						</thead>
						<tbody id="target-data">
							
						</tbody>
						
					</table>
					
				</div>
			</div>
		</div>
	</div>
</div>
<div id="i_data" class="modal fade bg-transparent pl" tabindex="-3">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header border-bottom-danger  font-weight-bold ">
				<h5 class="modal-title font-weight-bold"><i class="fas fa-plus"></i> Add Berita Acara</h5>
        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
         		 <span aria-hidden="true">&times;</span>
         		</button>
			</div>
			<form id="data-image">
			<div class="modal-body text-center" >
				
					<input type="text" name="title" class="form-control" placeholder="Title Berita" required="">
					<textarea name="isi_berita" placeholder="Isi Berita" class="form-control mt-2" id="exampleFormControlTextarea1" rows="3"></textarea>
					  
					<input type="file" id="1" class="input-file-1 d-none" name="file_image" required="">
				
				<img id="view_image1" class="img-thumbnail mt-2" style="cursor: pointer;width: 100%;" src="<?=  base_url()?>assets/img/place-image.png">
			</div>
			<div class="modal-footer">
				<button class="btn btn-success disabled" type="submit" id="simpan-data">Simpan</button>
				<button class="btn btn-transparent text-secondary" data-dismiss="modal">Batal</button>
			</div>
			</form>
		</div>
	</div>
</div>
<div class="modal fade" id="modal-update">
	<div class="modal-dialog" role="document">
		<form id="data-update">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<h5 class="modal-title"><i class="fa fa-edit"></i> Edit Berita</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				
				</button>
				
			</div>
			<div class="modal-body">
				
					<div class="input-gruop">
						<label>Title</label>
						<input type="title" name="e_title" class="form-control">
					</div>
					<div class="input-gruop">
						<label>Isi</label>
						<textarea  name="e_isi" class="form-control">
							
						</textarea>
					</div>
					<div class="alert alert-danger alert-foto-up d-none">Ukuran file tidak boleh lebih dari 1024kb</div>
				  	<div class="custom-file mt-2 d-none">
				    	<input type="file" class="custom-file-input input-file-2" id="2" name="up_foto" >
				    	<label class="custom-file-label" for="validatedCustomFile">Pilih Foto ...... </label>
				  	</div>
				  	<img id="view_image2" class="w-100 mt-2 img-thumbnail" src="<?=  base_url()?>assets/img/place-image.png"> 
				
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
				<button type="submit" class="btn btn-primary">Simpan</button>
			</div>

		</div><!-- /.modal-content -->
		</form>
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<?php 

$this->load->view('layout/footer');

?>
<script type="text/javascript">
	$(document).ready(function () {
		//priview gambar
		var id_berita;
		var image_lawas;
		read_data();
		function read_data() {

		$('#datatable').DataTable({
			
				"processing": true, //Feature control the processing indicator.
	            "serverSide": true,
	            "hover" : true,
	            "language": {
            		processing: '<div style="display: flex; flex-direction: column; justify-content: center; align-items: center; text-align: center;min-height: 100vh; position:fixed; right:0; left:0; top:0; background:rgb(0,0,0, 0.5);height:100vh;"><div style="width:6rem; height:6rem;" class="spinner-border bg-blue text-danger" role="status"></div><label class="text-white">Sedang Memuat data ... </label></div>'},
	          	"order" :[],
				"ajax" :{
					 url: "<?= base_url() ?>index.php/berita_acara/read_data",
	       			 type:"post"
				},
				"columnDefs":[
					{
						"targets" : [0,1,-1],
						"orderable" : false
					},
				],
			
			});
	 	
	}
		function readURL(input,status) {
			
			if (input.files && input.files[0]) {
				var reader = new FileReader();
					reader.onload = function (e) {
						if (e != "") {
							$('#view_image'+status).attr('src',e.target.result);
						}
						
					}

					reader.readAsDataURL(input.files[0]);
					$("#simpan-data").removeClass('disabled');
			}
			
		}
		$('.input-file-1').change(function () {
			var status = 1;
			var file = $(this);
			var files_obj = file[0].files;
			var ukuran_file = files_obj[0].size;
			if (ukuran_file > 1024000) {
				 Swal.fire(
				  'Data Berita',
				  'Gambar tidak boleh lebih dari 1 Mb',
				  'error'
				);
			}else{
				readURL(this,status);
			}
			
		});
		$('.input-file-2').change(function () {
			var status = 2;
			var file = $(this);
			var files_obj = file[0].files;
			var ukuran_file = files_obj[0].size;
			if (ukuran_file > 1024000) {
				 Swal.fire(
				  'Data Berita',
				  'Gambar tidak boleh lebih dari 1 Mb',
				  'error'
				);
			}else{
				readURL(this,status);
			}
			
		});
		$('#view_image1').click(function () {
			$('.input-file-1').click();
		});
		$('#view_image2').click(function () {
			$('.input-file-2').click();
		});
		$(document).on('submit','#data-image',function (e) {
			e.preventDefault();
			$.ajax({
				type : "post",
				dataType : "json",
				url : '<?= base_url() ?>berita_acara/add_berita',
				data : new FormData(this),
				processData : false,
				contentType : false,
				cache : false,
				async : false,
				success : function (data) {
					Swal.fire(
						  'Data Berita',
						  'Berhasil Tersimpan',
						  'success'
						);
					$('#datatable').DataTable().destroy();
					$('#i_data').modal('hide');
					read_data();
				},
				error: function (xhr, ajaxOptions, thrownError) { // Ketika terjadi error
				        Swal.fire(
						  'Data Berita',
						  'Gagal Tersimpan, Pastikan semua sudah terisi !!',
						  'error'
						);
				    }
			})
		});
		$(document).on('click','.delete-data',function (e) {
			var id = $(this).attr('id');

			$.ajax({
				type : 'ajax',
				url : '<?= base_url() ?>berita_acara/delete_berita/'+id,
				dataType : 'JSON',
				success : function (data) {
					Swal.fire(
						  'Data Berita',
						  'Berhasil Terhapus',
						  'success'
						);
					$('#datatable').DataTable().destroy();
					read_data();
				}

			});
		});
		$(document).on('click','.edit',function (e) {
			var id = $(this).attr('id');
			$.ajax({
				type : 'ajax',
				dataType : 'JSON',
				url : '<?= base_url() ?>index.php/berita_acara/read_berita_by/'+id,
				success : function (data) {
					console.log(data);
					$('input[name=e_title]').val(data[0].title);
					$('textarea[name=e_isi]').val(data[0].isi);
					$('#view_image2').attr('src','<?= base_url() ?>upload/berita/'+data[0].image);
					image_lawas = data[0].image;
					id_berita = data[0].id_berita;
					
				}
			})

		})
		$(document).on('submit','#data-update',function (e) {
			e.preventDefault();

			var formData = new FormData(this);

			$.ajax({
					type : 'post',
					
					url : '<?= base_url() ?>index.php/berita_acara/simpan_update/'+id_berita+'/'+image_lawas,
					data : new FormData(this),
					processData : false,
					contentType : false,
					cache : false,
					async : false,
					success : function (datanya) {
						console.log(datanya);
						if (datanya == 1) {
							Swal.fire(
							  'Data Karyawan',
							  'Berhasil Tersimpan',
							  'success'
							);
							$('#data-update').modal('hide');
							$('#datatable').DataTable().destroy();
							read_data() ;
						}else{
							Swal.fire(
							  'Data Karyawan',
							  'Gagal Tersimpan, Pastikan semua sudah terisi !!',
							  'error'
							);
						}
						
						
						

					},
					error: function (xhr, ajaxOptions, thrownError) { // Ketika terjadi error
				        Swal.fire(
						  'Data Karyawan',
						  'Gagal Tersimpan, Gagal mengirim data ke server !!',
						  'error'
						);
				    }

				});
		});
	});
</script>