<?php 

$this->load->view('layout/header');
$data['data_link'] = $active_link;
$this->load->view('layout/menu',$data);

$this->load->view('layout/header_content');

?>

<div class="container-fluid">
	<div class="row bg-white mt-3 rounded overflow-hidden">
		<div class="col p-0">
			<div class="row ">
				<div class="col">
					<?php $data['bc'] = $breadcump; $this->load->view('layout/breadcump',$data); ?>
					<button id="back" type="button" class="btn-danger btn rounded-0 float-right"><i class="fa fa-arraw-left"></i> Kembali</button>
					<button id="Refresh" type="button" class="btn-primary btn rounded-0 float-right"><i class="fa fa-retweet"></i> Refresh</button>
				</div>
			</div>
			<div class="row m-2">
				<div class="col p-4">
					<label><?= tanggal_indo();?></label>
					<div class="scroll-view">
					<table class="table w-100 table-striped" id="datatable">
						<thead class="bg-blue-1 text-white text-center">
							<th>No</th>
							<th>Nama Karyawan</th>
							<th>NIP</th>
							<th>Jam</th>
						</thead>
						<tbody id="target-data">
							
							
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
	
	$(document).ready(function () {
	read_data();
	function read_data() {

		var html = ' ';
		var i;
		$.ajax({
			type : "ajax",
			dataType : "json",
			url : "<?= base_url() ?>index.php/admin/read_data_ra",
			async : false,
			success : function (data) {
				console.log(data);
				console.log("tes");
				var no = 1;
				for ( i =0; i < data.length; i++) {
					
					html += "<tr>"+
						"<td>"+ no +"</td>"+
						"<td>"+ data[i].nama +"</td>"+
						"<td>"+ data[i].nip +"</td>"+
						"<td>"+ data[i].jam +"</td>"+
						"</tr>";
						no++;
				}
				$("#target-data").html(html);
			}
		})
	}
	$('#datatable').DataTable({
			 "paging":   false,
			 "prosessing" : true
		});
	$('#Refresh').click(function () {
		
		read_data()
	})
	$('#back').click(function () {
		
		window.history.back();
	})
	});
</script>