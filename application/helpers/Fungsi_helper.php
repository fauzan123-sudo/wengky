<?php 

function ci_encode($str_to_encode) {
    $CI = get_instance();

    if (!empty($str_to_encode)) {
        return bin2hex($CI->encryption->encrypt($str_to_encode));
    }
    return $str_to_encode;
}

function ci_decode($str_to_decode) {
    $CI = get_instance();
    return $CI->encryption->decrypt(pack('H*', $str_to_decode));
}

function countDayIsMount(){
	$kalender = CAL_GREGORIAN;
	$bulan = date('m');
	$tahun = date('Y');

	$hari =  cal_days_in_month($kalender, $bulan, $tahun);
	return $hari;
}
function setBulan($value){
    $arrNamaBulan = array(
        '01'=>'Januari', 
        '02'=>'Februari', 
        '03'=>'Maret', 
        '04'=>'April', 
        '05'=>'Mei', 
        '06'=>'Juni', 
        '07'=>'Juli', 
        '08'=>'Agustus', 
        '09'=>'September', 
        '10'=>'Oktober', 
        '11'=>'November', 
        '12'=>'Desember',
    );

    return $arrNamaBulan[$value];
}