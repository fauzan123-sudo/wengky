<?php

function tanggal_indo(){
	$hari = date('l');
	$hari_t = date('d');
	$bulan = date('m');
	$tahun = date('Y');
    $hari_indo = array('Sunday' => 'Minggu', 'Monday' => 'Senin', 'Tuesday' => 'Selasa', 'Wednesday' => 'Rabu', 'Thursday'=> 'Kamis', 'Friday' => 'Jumat', 'Saturday' => 'Sabtu' );
    $bulan_indo = array("01" => 'Januari',
			"02" => 'February',
			"03" => 'Maret',
			"04" => 'April',
			"05" => 'Mei',
			"06" => 'Juni',
			"07" => 'Juli',
			"08" => 'Agustus',
			"09" => 'September',
			"10" => 'Oktober',
			"11" => 'November',
			"12" => 'Desember');
    $hari_indo_fix = $hari_indo[$hari];
    $bulan_indo_fix = $bulan_indo[$bulan];
    return $hari_indo_fix.", ".$hari_t." ".$bulan_indo_fix." ".$tahun;
}

function time_indo_convert($time){
	
	date_default_timezone_set("Asia/Jakarta");
	$hari = date('l',strtotime($time));
	$hari_t = date('d',strtotime($time));
	$bulan = date('m',strtotime($time));
	$tahun = date('Y',strtotime($time));
	$waktu = date('G:i:s',strtotime($time));
    $hari_indo = array('Sunday' => 'Minggu', 'Monday' => 'Senin', 'Tuesday' => 'Selasa', 'Wednesday' => 'Rabu', 'Thursday'=> 'Kamis', 'Friday' => 'Jumat', 'Saturday' => 'Sabtu' );
    $bulan_indo = array("01" => 'Januari',
			"02" => 'February',
			"03" => 'Maret',
			"04" => 'April',
			"05" => 'Mei',
			"06" => 'Juni',
			"07" => 'Juli',
			"08" => 'Agustus',
			"09" => 'September',
			"10" => 'Oktober',
			"11" => 'November',
			"12" => 'Desember');
    $hari_indo_fix = $hari_indo[$hari];
    $bulan_indo_fix = $bulan_indo[$bulan];
   	$timefix[] = $hari_indo_fix.", ".$hari_t." ".$bulan_indo_fix." ".$tahun;
   	$timefix[] = $waktu;
    return $timefix;
}

function random_string($length){
	$caracter = "1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
	$caracterlENGTH = strlen($caracter);
	$randomString ='';
	for ($i=0; $i < $length ; $i++) { 
		$randomString .= $caracter[rand(0,$caracterlENGTH - 1)];
	}
	return $randomString;
}