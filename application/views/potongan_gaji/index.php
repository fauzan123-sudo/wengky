<?php 

$this->load->view('layout/header');
$data['data_link'] = $active_link;
$this->load->view('layout/menu',$data);
$this->load->view('layout/header_content');

?>

<div class="container-fluid">
	<div class="row shadow-tin bg-white mt-1 mx-2 rounded overflow-hidden">
		<div class="col p-0">
			<div class="row ">
				<div class="col">
					
					<button id="tambah_data" type="button" class="btn-danger btn rounded-0 float-right" data-target="#tambah" data-toggle="modal"><i class="fa fa-plus"></i> Tambah</button>	
				</div>
			</div>
			<div class="row m-2">
				<div class="col p-4">
					
						<table class="table w-100" id="datatable">
							
							<thead class=" text-blue " >
								<tr>
									<th width="5%">No</th>
									<th width="10%">Action</th>
									<th>Nama Potongan</th>
									<th>Nilai</th>
								</tr>
							</thead>
							<tbody id="table_departement">
								
							</tbody>
							
						</table>
				
				</div>
			</div>
			
		</div>
	</div>
</div>
<div id="tambah" class="modal fade bg-transparent" tabindex="-2" >
	<div class="modal-dialog">
		<div class="modal-content bg-blue-2">
			<div class="modal-header  font-weight-bold text-white">
				<h6 class="modal-title font-weight-bold"><i class="far fa-edit"></i> Tambah Jenis Potongan</h6>
        		<button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
         		 <span aria-hidden="true">&times;</span>
         		</button>
			</div>
			<div class="modal-body bg-white">
				<form id="data-tambah">
					<div class="row">
						<div class="col">
						  	<div class="form-row">
							    <div class="form-group col-md-8 form-input-potongan">
							      <label for="nama_potongan">Nama Potongan</label>
							      <input type="text" class="form-control" name="nama_potongan[]" id="nama_potongan" required>
							    </div>
							    <div class="form-group col-md-4 form-input-nilai">
							      <label for="nilai">Nilai (%)</label>
							      <input type="number" class="form-control" name="nilai[]" id="nilai" required>
							    </div>
							  </div>
							  <small class="float-right"><label><a id="add_more" href="#">+ Add More</a></label></small>
						</div>
					</div>
					
					  
				
			</div>
			<div class="modal-footer">
				<button class="btn btn-success" type="button" id="simpan">Simpan</button>
				<button class="btn btn-transparent text-white" data-dismiss="modal">Batal</button>
			</div>
			</form>
		</div>
	</div>
</div>

<div id="update" class="modal fade bg-transparent" tabindex="-2" >
	<div class="modal-dialog">
		<div class="modal-content bg-blue-2">
			<div class="modal-header  font-weight-bold text-white">
				<h6 class="modal-title font-weight-bold"><i class="far fa-edit"></i> Tambah Jenis Potongan</h6>
        		<button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
         		 <span aria-hidden="true">&times;</span>
         		</button>
			</div>
			<div class="modal-body bg-white">
				<form id="data-update">
					<div class="row">
						<div class="col">
						  	<div class="form-row">
							    <div class="form-group col-md-8 form-input-potongan">
							      <label for="nama_potongan">Nama Potongan</label>
							      <input type="text" class="form-control" name="nama_potongan" id="nama_potongan" required>
							    </div>
							    <div class="form-group col-md-4 form-input-nilai">
							      <label for="nilai">Nilai (%)</label>
							      <input type="number" class="form-control" name="nilai" id="nilai" required>
							    </div>
							  </div>
						</div>
					</div>
					
					  
				
			</div>
			<div class="modal-footer">
				<button class="btn btn-success" type="button" id="simpanUpdate">Simpan</button>
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

	jQuery(document).ready(function($) {
		getData();
		
		var idUpdate = "";
		$('#add_more').click(function(event) {
			event.preventDefault();
			
			$(".form-input-potongan").append('<input type="text" class="form-control mt-2" name="nama_potongan[]" required>');
			$(".form-input-nilai").append('<input type="number" class="form-control mt-2" name="nilai[]" required>');

			
			
			
		});
		$("#simpan").click(function(event) {
			event.preventDefault();
			var data = $("#data-tambah").serialize();
			$.ajax({
				url: '<?= base_url() ?>potongan_gaji/save',
				type: 'POST',
				dataType: 'JSON',
				data: data,
			})
			.done(function(data) {
				if (data == 1) {
					$(".form-input-potongan").html("");
					$(".form-input-nilai").html("");
					$(".form-input-potongan").append('<label for="nama_potongan">Nama Potongan</label><input type="text" class="form-control mt-2" name="nama_potongan[]" required>');
					$(".form-input-nilai").append('<label for="nama_potongan">Nama Potongan</label><input type="number" class="form-control mt-2" name="nilai[]" required>');

					getData();
					$("#tambah").modal("hide");
					Swal.fire('Simpan!', '', 'success');
				}
			})
		});
		
		
	});



	$(document).on('click', '.edit',function(event) {
			
		event.preventDefault();
		idUpdate = $(this).attr("data-id");
		

		$.ajax({
			url: '<?= base_url() ?>potongan_gaji/getDataBy/'+idUpdate,
			type: 'POST',
			dataType: 'JSON',
		})
		.done(function(data) {
		
			$("#data-update input[name='nama_potongan']").val(data.jenis_potongan);
			$("#data-update input[name='nilai']").val(data.value);
			$("#update").modal("show");

		});
	});

	$(document).on('click', '#simpanUpdate',function(event) {
			
		event.preventDefault();
		var data = $('#data-update').serialize();
		

		$.ajax({
			url: '<?= base_url() ?>potongan_gaji/saveUpdate/'+idUpdate,
			type: 'POST',
			dataType: 'JSON',
			data : data,
		})
		.done(function(data) {
			if (data == 1) {
				getData();
				$("#update").modal("hide");
				Swal.fire('Simpan!', '', 'success');
			}else{
				Swal.fire('Simpan Gagal!', '', 'warning');
			}
			

		});
	});

	$(document).on('click', '.delete',function(event) {
			
		event.preventDefault();
		var id = $(this).attr("data-id");
		

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
					url: '<?= base_url() ?>potongan_gaji/delete/'+id,
					type: 'POST',
					dataType: 'JSON',
				})
				.done(function(data) {
					if (data == 1) {
						getData();
						Swal.fire('Hapus Data!', '', 'success');
					}

				});
		  	}

		});
	});

	function getData() {
		$.ajax({
			url: '<?= base_url() ?>potongan_gaji/getData',
			type: 'GET',
			dataType: 'JSON',
			async:false,
		})
		.done(function(data) {
	
			$("#table_departement tr").remove();
			var no = 1;
			var html = "";
			for (var i = 0; i < data.length; i++) {
				html += "<tr valign='middle'>"+
							"<td>"+no+"</td>"+
							"<td><a class='btn btn-default btn-sm text-info edit' id='edit' data-id='"+data[i].id+"' title='Edit' href='#'><i class='far fa-edit'></i></a><a class='btn btn-default btn-sm text-danger delete' id='delete' title='Hapus' href='#' data-id='"+data[i].id+"'><i class='fas fa-trash-alt'></i></a></td>"+
							"<td>"+data[i].nama+"</td>"+
							"<td>"+data[i].value+"%</td>"+
						"</tr>";
				no++;
			}
			
			$("#table_departement").append(html);
		});
		
		
	}
</script>

