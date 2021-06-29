<?php 

$this->load->view('layout/header');
$data['data_link'] = $active_link;
$this->load->view('layout/menu',$data);
$this->load->view('layout/header_content');
// var_dump($pegawai);
// die();
$tglLhr = time_indo_convert($pegawai->tgl_lahir);
?>
<div class="container-fluid mb-4">
	<?php $data['bc'] = $breadcump; $this->load->view('layout/breadcump',$data); ?>
	<div class="card border-0 border-1 mx-2">
		<div class="card-body">
			<table class="border-0 w-100 table	table-borderless">
				<tbody>
					<tr>
						<td>NIP</td>
						<td class="text-right font-weight-bold"><?= $pegawai->nip ?></td>
					</tr>
					<tr>
						<td>Nama</td>
						<td class="text-right font-weight-bold"><?= $pegawai->nama ?></td>
					</tr>
					<tr>
						<td>Tempat Lahir</td>
						<td class="text-right font-weight-bold"><?= $pegawai->tempat_lahir ?></td>
					</tr>
				
					<tr>
						<td>Tanggal Lahir</td>
						<td class="text-right font-weight-bold"><?= $tglLhr[0] ?></td>
					</tr>
					<tr>
						<td>Alamat</td>
						<td class="text-right font-weight-bold"><?= $pegawai->alamat ?></td>
					</tr>
					<tr>
						<td>Email</td>
						<td class="text-right font-weight-bold"><?= $pegawai->email ?></td>
					</tr>
					<tr>
						<td>No Telp</td>
						<td class="text-right font-weight-bold"><?= $pegawai->no_tlp ?></td>
					</tr>
					<tr>
						<td>Jabatan</td>
						<td class="text-right font-weight-bold"><?= $pegawai->jabatan ?></td>
					</tr>
					
					
				</tbody>
					
			</table>
		</div>
	</div>


</div>



<?php
$this->load->view('layout/footer');
?>