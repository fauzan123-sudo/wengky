<?php 

$this->load->view('layout/header');

$data['data_link'] = $active_link;
$this->load->view('layout/menu',$data);
$this->load->view('layout/header_content');

?>
<div class="container-fluid">
	<div class="row bg-white mt-3 rounded overflow-hidden pl shadow-tin">
		<div class="col p-0">
			<div class="row ">
				<div class="col">
					<?php $data['bc'] = $breadcump; $this->load->view('layout/breadcump',$data); ?>
					<button type="button" class="btn-danger btn rounded-0 float-right btn-refresh-a"><i class="fa fa-retweet"></i> Refresh</button>
					<a href="<?= base_url() ?>index.php/absensi/absenCommit" class="btn-success btn rounded-0 float-right"><i class="fa fa-history"></i> Commit</a>
					<a href="<?= base_url() ?>index.php/admin/riwayat_absensi" class="btn-primary btn rounded-0 float-right"><i class="fa fa-history"></i> Riwayat</a>
				</div>
			</div>
			<div class="row m-2">
				<div class="col p-4">
					<label><?= tanggal_indo();?></label>
					
					<table class="table w-100" id="data">
						<thead>
							<tr>
								<th>Jam</th>
								<th>Tanggal</th>
								<th>NIP</th>
								<th>Nama</th>
								<th>Lokasi</th>
							</tr>
						</thead>
						
					</table>
					
				</div>
			</div>
			
		</div>
	</div>




</div>


<?php 

$this->load->view('layout/footer');

?>
<script type="text/javascript">
	$(document).ready(function(){
		$("#data").DataTable({
		    	'processing': true,
	          	'serverSide': true,
	          	'serverMethod': 'post',
	          	'ajax': {
	            	'url':'<?php echo site_url('Absensi/read_absen')?>'
	          	},
        		responsive: true,
	          	columns: [
		            { data: 'jam'},
		            { data: 'tanggal'},
		            { data: 'nip' },
		            { data: 'nama' },
		            { data: 'lokasi' },
		       
	          	],
		});
	})
</script>