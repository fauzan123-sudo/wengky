<?php 

$this->load->view('layout/header');
$this->load->view('layout/menu');
$this->load->view('layout/header_content');

?>
<div class="container-fluid">
	<div class="row bg-white mt-3 rounded overflow-hidden">
		<div class="col p-0">
			<div class="row ">
				<div class="col">
					<button type="button" class="btn-success btn rounded-0 float-right">+ Tambah</button>
				</div>
			</div>
			<div class="row m-2">
				<div class="col p-4">
					<div class="scroll-view">
						<table class="table mt-4 p-4">
							
							<thead>
								<tr>
									<th>No</th>
									<th>Nama</th>
									<th>Tempat Tanggal Lahir</th>
									<th>Email</th>
									<th>Telepon</th>
									<th>Username</th>
									<th>Foto</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>1</td>
									<td>Fathur</td>
									<td>Jl. Ahmad Yani 01 Wajak</td>
									<td>CEO</td>
									<td>Fathur</td>
									<td>Jl. Ahmad Yani 01 Wajak</td>
									<td>CEO</td>
								</tr>
							</tbody>
						
						</table>
					</div>
				</div>
			</div>
			
		</div>
	</div>




</div>


<?php 

$this->load->view('layout/footer');

?>
<script type="text/javascript">
	$('table').DataTable();
	$('button').click(function () {




		Swal.fire(
		  'Data Karyawan',
		  'Berhasil Tersimpan',
		  'success'
		);
	})
</script>