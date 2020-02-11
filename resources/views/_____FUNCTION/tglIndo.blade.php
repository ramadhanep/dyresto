<?php
function tgl_indo($tanggal){
	$bulan = array (
		1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$pecahkan = explode('-', $tanggal);

	// variabel pecahkan 0 = tanggal
	// variabel pecahkan 1 = bulan
	// variabel pecahkan 2 = tahun

	return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}
function bulan_indo($data){
	$bulan = array (
		1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	return $bulan[$data];
}
function hari_ini($hari){

	switch($hari){
		case 'Sun':
			$hari_ini = "Minggu";
		break;

		case 'Mon':
			$hari_ini = "Senin";
		break;

		case 'Tue':
			$hari_ini = "Selasa";
		break;

		case 'Wed':
			$hari_ini = "Rabu";
		break;

		case 'Thu':
			$hari_ini = "Kamis";
		break;

		case 'Fri':
			$hari_ini = "Jumat";
		break;

		case 'Sat':
			$hari_ini = "Sabtu";
		break;

		default:
			$hari_ini = "Tidak di ketahui";
		break;
	}

	return $hari_ini;

}
?>
